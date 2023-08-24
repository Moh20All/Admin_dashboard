<?php 
$server="localhost";
$user="root";
$dbname="store";
$pass="";//connection
    $mysqli= new mysqli($server,$user,$pass,$dbname);
    if($conn->connect_error){//check conncetion
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        // Now you have the ID from the previous page
    }
    

    // Delete query
    $query = "DELETE FROM product WHERE product_id = '$id'";
    $result = $mysqli->query($query);

    if ($result) {
        echo "Record with ID $id deleted successfully.";
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    // Close the database connection
    header("Location:http://localhost/Store/pages/inventory.php");
    exit;
    ?>