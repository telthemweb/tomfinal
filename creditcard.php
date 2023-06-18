<?php

$submitbutton= $_POST['submitbutton'];

$number= $_POST['number_entered'];



<?php

// Connect to MySQL database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Load transaction data from MySQL database
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

// Preprocess the data
// TODO: Clean and transform the data as needed

// Split the data into training and testing sets
$data_count = count($data);
$train_data = array_slice($data, 0, (int)($data_count * 0.8)); // 80% for training
$test_data = array_slice($data, (int)($data_count * 0.8)); // 20% for testing

// Train a random forest model using scikit-learn
require_once 'vendor/autoload.php'; // Make sure scikit-learn is installed via Composer

use Phpml\Classification\RandomForest;

$features = array('amount', 'location', 'timestamp', 'user_details');
$labels = array('fraudulent');

$clf = new RandomForest();
$clf->train($train_data, $labels, $features);

// Evaluate the model
$correct = 0;
$total = 0;
foreach ($test_data as $transaction) {
  $predicted = $clf->predict([$transaction['amount'], $transaction['location'], $transaction['timestamp'], $transaction['user_details']]);
  if ($predicted == $transaction['fraudulent']) {
    $correct++;
  }
  $total++;
}

$accuracy = $correct / $total;
echo "Accuracy: " . $accuracy;

// Close the MySQL connection
$conn->close();

?>


<?php
// Load the scikit-learn library
require_once 'vendor/autoload.php';

use Phpml\Classification\RandomForest;

// Define the database connection parameters
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'credit_card_transactions';

// Create a new database connection
$conn = new mysqli($host, $user, $password, $database);

// Check for errors in the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch the data from the database
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);

// Initialize arrays for storing the data and labels
$X = array();
$y = array();

// Iterate over each row in the result set
while ($row = $result->fetch_assoc()) {
    // Add the transaction details to the feature vector
    $feat = array($row['amount'], $row['merchant_id'], $row['location']);

    // Add the label (fraudulent or legitimate) to the label vector
    $label = $row['is_fraudulent'];

    // Add the feature vector and label to the training data arrays
    array_push($X, $feat);
    array_push($y, $label);
}

// Create a new Random Forest classifier with 10 trees
$rf = new RandomForest(10);

// Train the classifier on the data
$rf->train($X, $y);

// Define a new transaction to classify
$new_transaction = array(100.0, 12345, 'New York');

// Use the classifier to predict whether the transaction is fraudulent or legitimate
$prediction = $rf->predict([$new_transaction])[0];

// Print the prediction
echo 'Prediction: ' . $prediction;

// Close the database connection
$conn->close(); 
?>

<div class="container">
      <h1>String Length Tracker</h1>
      <div class="form-group">
        <label for="input-string">Enter a string:</label>
        <input type="text" class="form-control" id="input-string" onkeyup="trackStringLength()">
      </div>
      <p id="string-length"></p>
    </div>