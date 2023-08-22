<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Assuming you have a database connection established
    $server="localhost";
    $user="root";
    $dbname="store";
    $pass="";//connection
    $mysqli= new mysqli($server,$user,$pass,$dbname);
        if($mysqli->connect_error){//check conncetion
            die("Connection failed: " . $conn->connect_error);
        } 
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        // Now you have the ID from the previous page
    }
    // Sanitize the ID to prevent SQL injection
    $id = $mysqli->real_escape_string($id);

    // Delete query
    $query = "DELETE FROM customer WHERE customer_id = '$id'";
    $result = $mysqli->query($query);

    if ($result) {
        echo "Record with ID $id deleted successfully.";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    // Close the database connection
    header("Location:http://localhost/Store/pages/customers.php");
    exit;
} else {
    echo "No ID provided for deletion.";
}
?>
