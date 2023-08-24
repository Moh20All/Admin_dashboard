<!DOCTYPE html>
<html lang="en">
<?php 
$server="localhost";
$user="root";
$dbname="store";
$pass="";//connection
    $conn= new mysqli($server,$user,$pass,$dbname);
    if($conn->connect_error){//check conncetion
        die("Connection failed: " . $conn->connect_error);
    }
    $id_exist=TRUE;
    //Generating Random String as id
    function generateCustomID($length = 5) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomID = '';
        
        // Generate a random string
        for ($i = 0; $i < $length; $i++) {
            $randomID .= $characters[rand(0, $charactersLength - 1)];
        }
        
        // Combine with a timestamp to ensure uniqueness
        $timestamp = time();
        $customID = $randomID;
    
        return $customID;
    }
    
    // Usage
    // checking if the id exists in Table
    while($id_exist){
        $newCustomID = generateCustomID();//call function
        $searchQuery = "SELECT * FROM product WHERE product_id = '$newCustomID'";//The check queiry
        $searchResult = $conn->query($searchQuery);
        if ($searchResult === false) {
        // Query failed, handle the error
        echo "Error: " . $conn->error;

    }else if ($searchResult->num_rows > 0) { // if there is same id
        $id_exist=TRUE;
        $newCustomID = generateCustomID();//Generate new one
    }else{
        $id_exist=FALSE;//Change loop var
    }
    }
    // Fetch categories from the database
    $category = "SELECT category_id, category_name FROM category";
    $result_category = $conn->query($category);
    if ($result_category === false) {
        echo "Query execution failed: " . $conn->error;
    // Print the query for debugging
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../framework.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../styles/popup.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="main-content product-page page justify-center align-center">
        <div class="product-add p-20 bg-white rad-6 align-center">
            <div>
           <h1>Add Product</h1>
           <a href="../pages/inventory.php"><h1 class="">Back</h1></a> 
           <form action="" method="POST" class="mt-10" enctype="multipart/form-data">
            <label for="">Ref:</label><br>
            <input type="text" readonly value="<?php echo $newCustomID; ?>" name="productId"><br>
            <label for="">Product Name:</label><br>
            <input type="text" name="pname" required><br>
            <div class="styled-select m-10">
            <select name="category" class="p-10 fs-14">
            <?php while ($row = $result_category->fetch_assoc()) { //show the option categories?>
                 <option value="<?php echo $row['category_id']; ?>" class="p-10 fs-14"><?php echo $row['category_name']; ?></option>
             <?php } ?>
             </select><br>
            </div>
            <label for="">Description:</label><br>
            <textarea id="" cols="30" rows="10" name="description"></textarea><br>
            <label for="">Quantity:</label><br>
            <input type="number"name="quantity" required><br>
            <label for="">Price:</label><br>
            <input type="number" name="price" required><br>
            <label for="">Image:</label><br>
            <input type="file" name="imag[]" multiple required><br>
            <input type="submit" value="Submit" name="submit" onclick="open_p()">
            <div class="popup" id="tab-p">
            <img src="img/mark.png" alt="">
            <h1>Thank you</h1>
            <p>Your detailes has been submitted. Thanks !</p>
            <button type="button" onclick="close_p()">Ok</button>
        </div>
           </form></div>
           <img src="../img/side.avif" alt="" height="642px">
        </div>
    </div>
<?php 
require "function.php";
$img = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $ID= $_POST["productId"];//product ID
            $p_name=$_POST["pname"];//product Name
            $descriptio = $_POST["description"];//product Description
        $selectedCategoryId = $_POST["category"]; //Selected category
            // Split the text into lines
            $lines = explode("\n", $descriptio);
            
            // Trim whitespace from each line
            $lines = array_map('trim', $lines);
            
            // Print the lines
            foreach ($lines as $line) {
                
            }

            $quantity = $_POST["quantity"];// Quantity
            $price = $_POST["price"];// Price

            $date = date("Y-m-d");
                 #########################
            $product_folder=dirname(__DIR__)."/pages/products/".$ID;
           
            if(mkdir($product_folder,0777))
                echo "";
            else
                echo "Folder unsseccessfully";

            $response= "";
            
            if(isset($_FILES["imag"])){
                $response = upload($_FILES,($product_folder."/"));
            }
            if($response==="success")
            echo "<h1>Uploaded</h1>";
            $totalImages = count($_FILES['imag']['name']);
        for ($i=0; $i < $totalImages; $i++) { 
            if($i!=0)
            $image_tag = $image_tag.",".$_FILES["imag"]["name"][$i];
            else
            $image_tag = $_FILES["imag"]["name"][$i];

            echo "<br>".$_FILES["imag"]["name"][$i]."     $totalImages <br>";
        }

            $insertquery="INSERT INTO product (product_id,product_name,description,image,category_id,quantity,date,price) values('$ID','$p_name','$line','$image_tag',$selectedCategoryId,'$quantity','$date','$price')";
            if ($conn->query($insertquery) === TRUE) {
                echo "New record created successfully";
                header("location:http://localhost/Store/pages/inventory.php");
                exit;
            }
        }else{
            echo "U didnt submit";
        }
    }else
?>
<script >.
let myElement=document.getElementById("tab-p");
console.log(myElement)
        function open_p(){
            myElement.classList.add("pop-trans");
        }
        function close_p(){
            myElement.classList.remove("pop-trans");
        }</script>
</body>
</html>
