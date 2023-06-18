<?php

namespace Ti\Cardfraudsm\App\Controllers\Admin;

use Rubix\ML\Pipeline;
use Ti\Cardfraudsm\Request;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Loggers\Screen;
use Rubix\ML\PersistentModel;

use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Tokenizers\NGram;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\NeuralNet\Layers\Dense;
use Rubix\ML\NeuralNet\Layers\PReLU;
use Rubix\ML\NeuralNet\Layers\BatchNorm;
use Rubix\ML\NeuralNet\Layers\Activation;
use Rubix\ML\NeuralNet\Optimizers\AdaMax;
use Rubix\ML\Transformers\TextNormalizer;
use Rubix\ML\Transformers\TfIdfTransformer;
use Rubix\ML\Classifiers\LogisticRegression;
use Rubix\ML\NeuralNet\Optimizers\StepDecay;
use Rubix\ML\Transformers\ZScaleStandardizer;
use Rubix\ML\Classifiers\MultilayerPerceptron;
use Rubix\ML\Transformers\WordCountVectorizer;

use Ti\Cardfraudsm\App\Controllers\Controller;
use Ti\Cardfraudsm\Middleware\AdministratorMiddleware;
use Ti\Cardfraudsm\App\Models\Transaction;


class AnalysisController extends Controller{

    public function __construct(){
		(new AdministratorMiddleware())->redirectIfNotAuthenticated();
	}

    public function exportTransactioncsv(){
        $transactions = Transaction::orderByDesc('created_at')->get();
        // $config = require __DIR__ . '/../../../Helpers/Config.php';
        // $baseUrl = $config['BASEURL'];
        $csv_file = "transactionhistry_".date('Ymd') . ".csv";			
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"$csv_file\"");	
        $headerscolum = array('customer', 'accountnumber', 'creditname','creditnumber','amount','country','city','ipaddress');
        $fh = fopen( 'php://output', 'w' );
        fputcsv($fh, $headerscolum);
        $data=array();
        if($transactions !=null) {
        foreach($transactions as $transact) {
            $data["customer"]=$transact->customer->name." ".$transact->customer->surname;
            $data["accountnumber"]=$transact->account->accountnumber;
            $data["creditname"]=$transact->creditcard->name;
            $data["creditnumber"]=$transact->creditcard->ac_number;
            $data["amount"]=$transact->amount;
            $data["country"]=$transact->country;
            $data["city"]=$transact->city;
            $data["ipaddress"]=$transact->ipaddress;	
            fputcsv($fh, array( $data["customer"],$data["accountnumber"],$data["creditname"],$data["creditnumber"],$data["amount"],$data["country"],$data["city"], $data["ipaddress"]));
        }
        fclose($fh);
        }
        exit; 
    }
   



}