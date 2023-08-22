<!DOCTYPE html>
<html lang="en">
<?php $server="localhost";
$user="root";
$dbname="store";
$pass="";//connection
    $conn= new mysqli($server,$user,$pass,$dbname);
    if($conn->connect_error){//check conncetion
        die("Connection failed: " . $conn->connect_error);
    } 
	// Fetch categories from the database
    $category = "SELECT * FROM product";
    $result_category = $conn->query($category);
    if ($result_category === false) {
        echo "Query execution failed: " . $conn->error;
        // Print the query for debugging
    }
	// Fetch Stock from the database
	// high stock fetch
	$stock ="SELECT COUNT(*) AS product_count FROM product WHERE quantity >= 120";
	$result_stock = $conn->query($stock);
    if ($result_stock === false) {
        echo "Query execution failed: " . $conn->error;
        // Print the query for debugging
    }
	// Low Stock fetch
	$row = $result_stock->fetch_assoc();
	$highS = $row['product_count'];
	$stock ="SELECT COUNT(*) AS product_count FROM product WHERE quantity < 120 AND quantity > 0";
	$result_stock = $conn->query($stock);
    if ($result_stock === false) {
        echo "Query execution failed: " . $conn->error;
        // Print the query for debugging
    }
	$row = $result_stock->fetch_assoc();
	$lowS = $row['product_count'];
	// out of stock fetch
	$stock ="SELECT COUNT(*) AS product_count FROM product WHERE quantity = 0";
	$result_stock = $conn->query($stock);
    if ($result_stock === false) {
        echo "Query execution failed: " . $conn->error;
        // Print the query for debugging
    }
	$row = $result_stock->fetch_assoc();
	$outS = $row['product_count'];
	?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../framework.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Orders</title>
</head>
<body>
    <div class="d-flex page">
		<div class="side-panel p-20 text-center">
			<h2>Welcome</h2>
			<ul>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="../index.php"><i class="fa-regular fa-user"></i><span> Profile</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href=""><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="customers.php"><i class="fa-regular fa-address-card"></i><span>Customers</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="inventory.php"><i class="fa-solid fa-dollar-sign"></i><span>Inventory</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="Help.php"><i class="fa-solid fa-circle-question"></i></i><span>Help</span></a></li>
			</ul>
		</div>
		<div class="main-content">
			
			<div class="d-flex justify-btw align-center p-10 head">
				<input class="p-10 search" type="search" placeholder="Type A Keyword">
				<div class="icons notification align-center d-flex justify-btw">
					<i class="fa-regular fa-bell fs-25 pointer "></i>
					<img src="../img/avatar.jpg" alt="" class="pointer">
				</div>
			</div>
            <div class="page m-20">
                <h1 class="p-relative black title">Inventory</h1>
				<div class="inv-stat rad-6 d-flex p-20 m-10 white bg-white justify-evenly d-block-mobile">
					<div class="stat bg-yellow rad-6 mt-10 ">
						<div class="txt-container d-flex justify-btw align-center" >
							<h4 class="m-0">Low in stock</h4>
							<i class="fa-solid fa-exclamation fs-15"></i>
						</div>
						<div class="txt-container d-flex justify-btw align-center mt-10">							
						<h1 class="m-0 mt-10"><?php echo $lowS;?></h2>
						<a href=""><i class="fa-solid fa-arrow-right fs-25 white"></i></a>
						</div>
					</div>
					<div class="stat bg-red rad-6 mt-10">
						<div class="txt-container d-flex justify-btw align-center" >
							<h4 class="m-0">Out of stock</h4>
							<i class="fa-regular fa-circle-xmark fs-15"></i>
						</div>
							<div class="txt-container d-flex justify-btw align-center mt-10">
							<h1 class="m-0 mt-10"><?php echo $outS;?></h2>
							<a href=""><i class="fa-solid fa-arrow-right fs-25 white"></i></a>
							</div>
					</div>
					<div class="stat rad-6 mt-10">
						<div class="txt-container d-flex justify-btw align-center" >
							<h4 class="m-0">High in stock</h4>
							<i class="fa-solid fa-arrow-trend-up fs-15"></i>
						</div>
							<div class="txt-container d-flex justify-btw align-center mt-10">
							<h1 class=" m-0 "><?php echo $highS;?></h2>
							<a href=""><i class="fa-solid fa-arrow-right fs-25 white"></i></a>
							</div>
					</div>
				</div>
				<div class="stock bg-white p-20 m-10 rad-6">
					<div class="align-center justify-btw">
						<h2 class="black ">Products</h2>
						<div>
							<a href="../utiles/addProduct.php" class="btn-shape bg-blue fs-14">add product <i class="fa-solid fa-plus"></i></a>
						</div>
					</div>
					<div class="stock-table">
						<table class="m-0 full-width">
							<thead>
								<th>Product Code</th>
								<th style="width:350px;">Product</th>
								<th>Status</th>
								<th>Actions</th>
								<th>Date</th>
								<th>Quantity</th>
							</thead>
							<tbody>
								<?php while ($row = $result_category->fetch_assoc()){ ?><tr>
									<td class="fw-500"><?php echo $row["product_id"];?></td>
									<td class="product-container align-center">
											<img src="<?php echo $row["image"];?>" alt="">
											<span><?php echo $row["product_name"];?></span>
									</td>
									<td class="fw-500">
										<div class="align-center">
										<?php if($row["quantity"]>=120){//set quantity ---- if more than 120
											
											echo "<div class=\"green-dot\"></div>
											<span> High Stock</span></td></div>";
										}if($row["quantity"]<120&&$row["quantity"]>0){//set quantity ---- if btwn 120 AND 0
											echo "<div class=\"yellow-dot\"></div>
											<span> Low Stock</span></td></div>";}
										if($row["quantity"]==0){//set quantity ---- if equal to 0
											echo "<div class=\"red-dot\"></div>
											<span>Out of Stock</span></td></div>";}
											?>
										

									</td>
									<?php $id = $row["product_id"];?>
									

									<td><?php echo "<a href='../utiles/editProduct.php?id=$id' class='btn-shape bg-blue'>Edit</a>";?></td>
									<td class="fw-500"><?php echo $row["date"];?></td>
									<td class="fw-500"><?php echo $row["quantity"];?></td>
								</tr>
								<?php }?>
								
							</tbody>
						</table>
					</div>
				</div>
            
				
            
        </div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/028a4ebdba.js" crossorigin="anonymous"></script>

</body>
</html>