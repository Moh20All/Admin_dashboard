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
    $category = "SELECT * FROM customer ";
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
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Customers</title>
</head>
<body>
    <div class="d-flex page">
		<div class="side-panel p-20 text-center">
			<h2>Welcome</h2>
			<ul>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="../index.php"><i class="fa-regular fa-user"></i><span> Profile</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href=""><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="customers.php"><i class="fa-regular fa-address-card"></i><span>Customers</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="inventory.php"><i class="fa-solid fa-dollar-sign"></i><span>inventory</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="Help.php"><i class="fa-solid fa-circle-question"></i>	</i><span>Help</span></a></li>
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
                <h1 class="p-relative black title">Customers</h1>
            
				
            <div class="Customers-table m-20 bg-white p-20 rad-6">
                <div class="d-flex p-10 justify-btw m-10">
                    <h2 class="m-0">Customers table</h2>
                    <a href="" class="btn-shape bg-blue fs-14">add <i class="fa-solid fa-plus"></i></a>
                </div>
                <table class="m-0 full-width">
                    <thead><tr class="p-10">
                        <th>id</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr></thead>
                    <tbody>
                    <?php while ($row = $result_category->fetch_assoc()){ ?><tr>
                        <td><?php echo $row["customer_id"];?></td>
                        <td><?php echo $row["name"];?></td>    
                        <td><?php echo $row["last_name"];?></td>    
                        <td><?php echo $row["email"];?></td>    
                        <td><?php echo $row["password"];?></td>    
                        <td><button class="btn-shape <?php echo ($row["banned"]==1)? "bg-red": ""; ?>"><?php echo ($row["banned"]==1)? "Banned": "active"; ?></button><button  class="btn-shape ml-10 <?php echo ($row["admin"]==1)? "bg-blue": "bg-red"; ?>"><?php echo ($row["admin"]==1)? "Admin": "Not Admin";?></button></td>    
                        <td><a href="../pages/process/edit.php" class="btn-shape">Edit</a><button data-id='<?php echo $row["customer_id"];?>'  class="delete-button btn-shape ml-10 bg-red">Delete</button data-id='<?php echo $row["customer_id"];?>'></td>  
                        <?php }?></tr>
                    </tbody>
                </table>
            </div>
        </div>
		</div>
	</div>
    <script src="https://kit.fontawesome.com/028a4ebdba.js" crossorigin="anonymous"></script>
    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                // Redirect to delete script passing the ID
                window.location.href = `../utiles/delete_script.php?id=${id}`;
                console.log(1)
            });
        });
    </script>
</body>
</html>