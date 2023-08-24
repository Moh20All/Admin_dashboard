<!DOCTYPE html>
<html lang="en">
<?php 
require "function.php";
$server="localhost";
$user="root";
$dbname="store";
$pass="";//connection
    $conn= new mysqli($server,$user,$pass,$dbname);
    if($conn->connect_error){//check conncetion
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        // Now you have the ID from the previous page
    }
    
    // Fetch categories from the database
    $category = "SELECT category_id, category_name FROM category";
    $result_category = $conn->query($category);
    if ($result_category === false) {
        echo "Query execution failed: " . $conn->error;
        // Print the query for debugging
    }
    $product = "SELECT * FROM product WHERE product_id='$id'";
    $result_product = $conn->query($product);
    if ($result_product === false) {
        echo "Query execution failed: " . $conn->error;
        // Print the query for debugging
    }
    $row1 = $result_product->fetch_assoc();
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
           <form action="" method="POST" class="mt-10" enctype="multipart/form-data">
            <label for="">Ref:</label><br>
            <input type="text" readonly value="<?php echo $id; ?>" name="productId"><br>
            <label for="">Product Name:</label><br>
            <input type="text" name="pname" value="<?php echo $row1["product_name"];?>"><br>
            <div class="styled-select m-10">
            <select name="category" class="p-10 fs-14">
            <?php while ($row = $result_category->fetch_assoc()) { ?>
                 <option value="<?php echo $row['category_id']; ?>" class="p-10 fs-14" <?php if($row1["category_id"]==$row['category_id']){echo "selected";}?>><?php echo $row['category_name']; ?></option>
             <?php } ?>
             </select><br>
            </div>
            <label for="">Description:</label><br>
            <textarea id="" cols="30" rows="10" name="description" value=""><?php echo $row1['description']; ?></textarea><br>
            <label for="">Quantity:</label><br>
            <input type="number"name="quantity" value="<?php echo $row1['quantity']; ?>"><br>
            <label for="">Price:</label><br>
            <input type="number" name="price" value="<?php echo $row1['price']; ?>"><br>
            <label for="">Image:</label><br>
            <input type="file" name="imag[]" multiple><br>
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
$img = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (isset($_POST['submit'])) {
                $uploaded = FALSE;
                $ID= $_POST["productId"];
                $p_name=$_POST["pname"];
                $descriptio = $_POST["description"];
                $selectedCategoryId = $_POST["category"];
                // Split the text into lines
                $lines = explode("\n", $descriptio);
                
                // Trim whitespace from each line
                $lines = array_map('trim', $lines);
                

                $quantity = $_POST["quantity"];// Quantity
                $price = $_POST["price"];// Price
                $date = date("Y-m-d");//Date
                if(isset($_FILES['imag']) && $_FILES['imag']['error'] !== UPLOAD_ERR_NO_FILE){
                $uploaded = TRUE;
                $img=image();
                }
        
            if($uploaded){
                $insertquery = "UPDATE `product` SET `product_name` = '$p_name', `description` = '$descriptio', `category_id` = '$selectedCategoryId', `quantity` = '$quantity', `price` = '$price' WHERE `product`.`product_id` = '$id';";
            }else{    
                $insertquery = "UPDATE `product` SET `product_name` = '$p_name', `description` = '$descriptio', `category_id` = '$selectedCategoryId', `quantity` = '$quantity', `price` = '$price' WHERE `product`.`product_id` = '$id';";
            }
                if ($conn->query($insertquery) === TRUE) {
                    echo "New Edit successfully";
                    header("location:http://localhost/Store/pages/inventory.php");
                    exit;
                }
    }
}
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
