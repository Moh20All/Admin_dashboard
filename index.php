<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="framework.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<title>Framework</title>
</head>
<body>
	<div class="d-flex page">
		<div class="side-panel p-20 text-center">
			<h2>Welcome</h2>
			<ul>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="index.php"><i class="fa-regular fa-user"></i><span> Profile</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href=""><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="pages/Customers.php"><i class="fa-regular fa-address-card"></i><span>Customers</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="pages/inventory.php"><i class="fa-solid fa-dollar-sign"></i><span>Inventory</span></a></li>
				<li ><a class="align-center p-10 align-center rad-6 trans fs-14 fw-500" href="pages/Help.php"><i class="fa-solid fa-circle-question"></i>	</i><span>Help</span></a></li>
			</ul>
		</div>
		<div class="main-content">
			
			<div class="d-flex justify-btw align-center p-10 head">
				<input class="p-10 search" type="search" placeholder="Type A Keyword">
				<div class="icons notification align-center d-flex justify-btw">
					<i class="fa-regular fa-bell fs-25 pointer "></i>
					<img src="img/avatar.jpg" alt="" class="pointer">
				</div>
			</div>
			<div class="page m-20">
			<h1 class="p-relative black title">Profile</h1>
				<div class="overview bg-white p-20 align-center ">
			<div class="avatar-box m-10 p-10 rad-6 text-center">
				<img src="img/avatar.jpg" alt="" class="rad-50 mb-10">
				<h2 class="m-0">Tech dz</h2>
				<p class="grey mt-10">Level 20</p>
				<div class="level rad-6 bg-eee p-relative">
					<span style="width: 70%"></span>
				</div>
				<div class="rating mt-10">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
				</div>
				<div class="mt-10 grey">
					<p class="fs-14 ">550 Rating</p>
				</div>
			</div>
			<div class="info-box full-width">
				<div class="box align-center flex-wrap p-20">
					<h3 class="full-width grey w-500">General info</h3>
					<div class="fs-14">
						<span class="grey">Name:</span>
						<span>Mohamed</span>
					</div>
					<div class="fs-14">
						<span class="grey">Last Name:</span>
						<span>Allali</span>
					</div>
					<div class="fs-14">
						<span class="grey">Gender</span>
						<span>Male</span>
					</div>
				</div>
				<div class="box align-center flex-wrap p-20">
					<h3 class="full-width grey w-500">Personal info</h3>
					<div class="fs-14">
						<span class="grey">email:</span>
						<span>@moh.com</span>
					</div>
					<div class="fs-14">
						<span class="grey">Phone:</span>
						<span>+213671222227</span>
					</div>
					<div class="fs-14">
						<span class="grey">Date of birth</span>
						<span>12/03/2004</span>
					</div>
				</div>
			</div>
		</div>
		</div>	
		</div>
	</div>
	<script src="https://kit.fontawesome.com/028a4ebdba.js" crossorigin="anonymous"></script>
</body>
</html>
