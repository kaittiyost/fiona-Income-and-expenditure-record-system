<?php 
include 'check.php';
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
	<?php include 'script.php';?>
</head>
<body>
	<div class="wrapper">
		<?php include 'newTopBar.php';?>
		<div class="container-fluid">
			<div class="row">
				<?php include 'SideLeftBar.php';?>
				<div class="content-wrapper">

					<!----------------------------------------------------------------------User---------------------------------------------------------------------->
					<div class="">
						<div class="col-xl-20 mb-30">
							<div class="card card-statistics h-100">
								<div class="p-4 text-center bg-success text-white">
									<h3 class="mb-20 text-white">User : <?php  echo $_SESSION['name']?> - <?php  echo $_SESSION['surname']?></h3>
									<!-- action group -->
									<div class="btn-group info-drop">
										<button type="button" class="dropdown-toggle-split text-white"
											data-toggle="dropdown" aria-haspopup="true"
											aria-expanded="false">
											<i class="ti-more"></i>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"><i
												class="text-primary ti-files"></i> Add task</a> <a
												class="dropdown-item" href="#"><i
												class="text-dark ti-pencil-alt"></i> Edit Profile</a> <a
												class="dropdown-item" href="#"><i
												class="text-success ti-user"></i> View Profile</a> <a
												class="dropdown-item" href="#"><i
												class="text-secondary ti-info"></i> Contact Info</a>
										</div>
									</div>
									<img class="img-fluid w-25 rounded-circle "
										src="include/images/useruser.png" alt="">
									<h4 class="mt-20 text-white">Username : <?php  echo $_SESSION['username']?></h4>
									<h4 class="mt-20 text-white">Name : <?php  echo $_SESSION['name']?> - <?php  echo $_SESSION['surname']?></h1>
									<h4 class="mt-20 text-white">Sex : <?php  echo $_SESSION['sex']?></h4>

								</div>
								<div class="card-body text-center">
									<div class="row">
										<div class="col-6 col-sm-4 xs-mb-10 md-mt-0 mt-10">
											<b>Following</b>
											<h4 class="mt-10">9</h4>
										</div>
										<div class="col-6 col-sm-4 xs-mb-10 md-mt-0 mt-10">
											<b>Followers </b>
											<h4 class="mt-10">1,111</h4>
										</div>
										<div class="col-12 col-sm-4 md-mt-0 mt-10">
											<b>Post</b>
											<h4 class="mt-10">15</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
						
				
				
 <?php include 'Footer.php';?>
			</div>
			</div>
		</div>

</body>
</html>