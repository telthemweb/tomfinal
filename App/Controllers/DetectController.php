<?php

namespace Ti\Cardfraudsm\App\Controllers;
use Rubix\ML\Loggers\Screen;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Transformers\NumericStringConverter;
use Rubix\ML\Transformers\OneHotEncoder;
use Rubix\ML\Transformers\ZScaleStandardizer;
use Rubix\ML\Classifiers\LogisticRegression;
use Rubix\ML\NeuralNet\Optimizers\StepDecay;
use Rubix\ML\CrossValidation\Reports\AggregateReport;
use Rubix\ML\CrossValidation\Reports\ConfusionMatrix;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;
use Rubix\ML\Persisters\Filesystem;

use Ti\Cardfraudsm\App\Models\Transaction;

class DetectController extends Controller
{

    public function DetectFraud()
    {

        ini_set('memory_limit', '-1');

        $logger = new Screen();
        
        $logger->info('Loading data into memory');
         
        $data=  $this->basurl().'training/transactionhistry_20230530.csv';
        
        $dataset = Labeled::fromIterator(new CSV($data, true))
            ->apply(new NumericStringConverter())
            ->apply(new OneHotEncoder())
            ->apply(new ZScaleStandardizer());
        
        [$training, $testing] = $dataset->stratifiedSplit(0.8);
        
        $estimator = new LogisticRegression(128, new StepDecay(0.01, 100));
        
        $estimator->setLogger($logger);
        
        $estimator->train($training);
        
        $extractor = new CSV('progress.csv', true);
        
        $extractor->export($estimator->steps());
        
        $logger->info('Progress saved to progress.csv');
        
        $report = new AggregateReport([
            new MulticlassBreakdown(),
            new ConfusionMatrix(),
        ]);
        
        $logger->info('Making predictions');
        
        $predictions = $estimator->predict($testing);
        
        $results = $report->generate($predictions, $testing->labels());
        
        echo $results;
        
        $results->toJSON()->saveTo(new Filesystem('report.json'));
        
        $logger->info('Report saved to report.json');


    //     $transactions =  Transaction::where('customer_Id', $_SESSION['customer_id'])
    //         ->orderByDesc('created_at')->get()->toArray();
    //         $config = require __DIR__ . '/../../Helpers/Config.php';
    //     $baseUrl = $config['BASEURL'];

    //     $transactionhistry_20230530= 'transactionhistry_20230530.csv';
    //     $data = array();
    //     $dataset = Labeled::fromIterator(new CSV($transactionhistry_20230530, true))
    // ->apply(new NumericStringConverter())
    // ->apply(new OneHotEncoder())
    // ->apply(new ZScaleStandardizer());
    // [$training, $testing] = $dataset->stratifiedSplit(0.8);
       

    //     $rf = new RandomForest();
    //     $rf->train($training);
    //     $prediction = $rf->predict($training);
    //     // $accuracy = $correct / $total;
    //     echo "Accuracy: " . json_encode($prediction);

        // foreach ($transactions as $trans) {
        //     $feat = array($trans->amount, $trans->customer_Id, $trans->city);
        //     $label = $trans['is_fraudulent'];
        //     array_push($X, $feat);
        //     array_push($y, $label);
        // }
        // $rf = new \Rubix\ML\Classifiers\RandomForest();
        // $rf->train($feat);
        // $new_transaction = array(100.0, 3, 'New York');
        // $prediction = $rf->predict($feat)[0];
        // echo json_encode($prediction);
    }
}
