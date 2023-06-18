## MSU_FRAUD MIGRATION

## MSU_FRAUD MIGRATION

--migration
php migrations orm:schema-tool:update --force




<?php

// First, connect to the MySQL database
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabasename";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Next, query the data from the database
$sql = "SELECT age, income, purchased FROM customer_data";
$result = $conn->query($sql);

// Then, preprocess the data as needed
$data = array();
while($row = $result->fetch_assoc()) {
  $data[] = array($row["age"], $row["income"], $row["purchased"]);
}

// Scale the data for logistic regression analysis
foreach($data as &$row) {
  $row[0] = $row[0] / 100; // Scale age between 0 and 1
  $row[1] = $row[1] / 10000; // Scale income between 0 and 1
}

// Split the data into training and testing sets
shuffle($data); // Shuffle the data randomly
$training_data = array_slice($data, 0, count($data) * 0.8); // Use first 80% of data for training
$testing_data = array_slice($data, count($training_data)); // Use remaining 20% of data for testing

// Use a logistic regression library (such as PHP-ML or Caret PHP) to build a logistic regression model
use Phpml\Classification\LogisticRegression;

$classifier = new LogisticRegression();
$X = array_column($training_data, array(0, 1)); // Input features (age and income)
$y = array_column($training_data, 2); // Output labels (purchased or not)
$classifier->train($X, $y);

// Use the trained model to make predictions on new data
$correct_predictions = 0;
foreach ($testing_data as $row) {
    $age = $row[0];
    $income = $row[1];
    $predicted_label = $classifier->predict([$age, $income]);
    if ($predicted_label == $row[2]) {
        $correct_predictions++;
    }
}

$accuracy = $correct_predictions / count($testing_data);
echo "Accuracy: $accuracy";

// Finally, close the MySQL connection
$conn->close();
?>