		<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Kanit|Merriweather" rel="stylesheet">
	<style type="text/css">
	*,h4,h5{
    font-family: 'Kanit', sans-serif;
    }
    
    .intro{font-family: 'Merriweather', serif;}
    
    .intro p{font-size:40px; color:#ff7920;}
	</style>
<!--=================================
 header start-->
<nav class="admin-header header-dark navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

  <!-- logo -->
  <div class="text-left navbar-brand-wrapper">
    <a class="navbar-brand brand-logo" href="Dashboard.php"><img src="include/images/logo-web-pig.png" alt=""></a>
    <a class="navbar-brand brand-logo-mini" href="Dashboard.php"><img src="include/images/piggy-bank.png" alt=""></a>
  </div>
  <!-- Top bar left -->
  <ul class="nav navbar-nav mr-auto">
    <li class="nav-item">
      <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
    </li>

  </ul>
  <!-- top bar right -->
  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item fullscreen">
      <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
    </li>
    
    <li class="nav-item dropdown mr-30">
      <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="include/images/useruser.png" alt="avatar">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">
          <div class="media">
            <div class="media-body">
              <h5 class="mt-0 mb-0"><?php  echo $_SESSION['name']?> - <?php  echo $_SESSION['surname']?> </h5>
              <span>michael-bean@mail.com</span>
            </div>
          </div>
        </div>
        <div class="dropdown-divider"></div>
 
        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
        <a class="dropdown-item" href="logout.php"><i class="text-danger ti-unlock"></i>Logout</a>
      </div>
    </li>
  </ul>
</nav>

<!--=================================
 header End-->


