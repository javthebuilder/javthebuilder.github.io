<!DOCTYPE HTML>

<html>
<head>
		<title>CTS Builders</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
        <header id="header">
				<a class="logo" href="index.php">File Manager</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="index.php">Home</a></li>
					<li><a href="elements.html">Elements</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="group.php">Group</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<!-- <div id="heading"  >
				<h1> <?php echo 'Register';?></h1>
			</div> -->

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<h3>Group</h3>
							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-12">
										<input type="text" name="name" id="name" value="" placeholder="Name" />
									</div>											
									<div class="col-6 col-12-small">
										<input type="checkbox" id="checkbox-one" name="checkbox">
										<label for="checkbox-one">View</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="checkbox-two" name="checkbox">
										<label for="checkbox-two">Add</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="checkbox-three" name="checkbox">
										<label for="checkbox-three">Update</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="checkbox-four" name="checkbox">
										<label for="checkbox-four">Remove</label>
									</div>
									
									
									<!-- Break -->
									<div class="col-12">
										<textarea name="textarea" id="textarea" placeholder="Notes" rows="6"></textarea>
									</div>
									<!-- Break -->
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" value="Create Group" class="primary" /></li>
											<li><input type="reset" value="Clear" /></li>
										</ul>
									</div>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</section>

		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>