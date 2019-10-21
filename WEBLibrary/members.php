<!-- members.php -->

<!-- Search Member -->                  <!-- Add Member -->                   <!-- Update Member -->                    <!-- Delete Member -->
<!-- 1 selectMember.php -->             <!-- 1 addMember.php -->              <!-- 1 updateformM.php -->                <!-- 1 deleteM.php -->
                                                                              <!-- 2 updatedM.php -->                   <!-- 2 deleteMember.php -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebLibrary - Members</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">                                         
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="site-logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<nav class="main-menu">
						<ul>
							<li><a href="index.html">Home</a></li>
              <li><a href="books.html">Books</a></li>
							<li><a href="categories.html">Categories</a></li>
							<li><a href="members.php">Members</a></li>
              <li><a href="rentals.html">Rentals</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Members</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search Member</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<!-- search form -->
						<form class="course-search-form" method="post" action="selectMember.php">
							<input type="text" placeholder="Member Name" name="mname">
							<button class="site-btn btn-dark">Search</button>
              
						</form>
					</div>
				</div>                         
			</div>
		</div>
	</section><br><br>
	<!-- search section end -->

    <!-- Add Member section -->
	<section class="signup-section spad">
		<div class="signup-bg set-bg" data-setbg="img/signup-bg2.jpg"></div>        <!-- Image taken from google images -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="signup-warp">
						<div class="section-title text-white text-left">
							<h2>Add New Member</h2>
							<p>*All fields must be entered*</p>
						</div>
						<!-- signup form -->
						<form class="signup-form" action="addMember.php" method="post">       
                Name: <input type="text" name="mname" 
                        value = "<?PHP if (isset($mname)) {echo $mname;} ?>"><br>
                Address: <input type="text" name="maddress" ><br>
                DOB: <input type="date" name="mdob" ><br><br>
                Phone: <input type="text" name="mphone" ><br>
                <input type="submit" name="submitdetails" value="Add" >
                <input type="reset" name="submitdetails" value="Clear" >
          </form>   
					</div>
				</div>
			</div>
		</div>                                       
	</section><br><br>
	<!-- Add Member section end -->
    
    <!-- update section -->
	<section class="search-section">
		<div class="container">                                  
			<div class="search-warp">
				<div class="section-title text-white">
					<h2>Update Member</h2>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<!-- search form -->
						<form class="course-search-form" action="updateformM.php" method="post">
							<input type="text" placeholder="Mem Id" name="memId" value = "">
							<button class="site-btn">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- update section end -->
                                                                     
  <!-- delete section -->
	<section class="search-section">
		<div class="container">                                  
			<div class="search-warp">
				<div class="section-title text-white">
					<h2>Delete Member</h2>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<!-- search form -->
						<form class="course-search-form" action="deleteM.php" method="post">
							<input type="text" placeholder="Mem Id" name="mid" value = "">
							<button class="site-btn" type="submit" name="submitdetails">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- delete section end -->
    
    <!-- footer section -->
		<div class="footer-bottom">
			<div class="footer-warp">
				<ul class="footer-menu">
					<li><a href="#">Terms & Conditions</a></li>
					<li><a href="#">Register</a></li>
					<li><a href="#">Privacy</a></li>
				</ul>
				<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
			</div>
		</div>
	</footer> 
	<!-- footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>