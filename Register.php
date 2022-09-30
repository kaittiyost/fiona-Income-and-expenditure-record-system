<!DOCTYPE html>
<html lang="en">
<head>	<style type="text/css">
	*,h4,h5,label{
    font-family: 'Kanit', sans-serif;
    }
    
    .intro{font-family: 'Merriweather', serif;}
    
    .intro p{font-size:40px; color:#ff7920;}
	</style>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Register</title>

<?php include 'script.php';?>
</head>

<body>

 <div class="wrapper" >



 
<!--=================================
 register-->

<section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(include/images/newBG2.png);">
  <div class="container" >
     <div class="row no-gutters">
       <div class="col-lg-4 offset-lg-1 col-md-6 login-fancy-bg bg parallax" style="background-image: url(include/images/newBG.jpg);">
        
       </div>
       <div class="col-lg-4 col-md-6 bg-white">
        <div class="login-fancy pb-40 clearfix">
        <h3 class="mb-30">Member Register</h3>
         <div class="row">
             <div class="section-field mb-20 col-sm-6">
               <label class="mb-10" for="fname">Name* </label>
                 <input id="name" class="web form-control" type="text" placeholder="Name" name="fname">
              </div>
               <div class="section-field mb-20 col-sm-6">
               <label class="mb-10" for="lname">Surname* </label>
                 <input id="surname" class="web form-control" type="text" placeholder="Surname" name="lname">
              </div>
            </div>
            <div class="section-field mb-20">
                 <label class="mb-10" for="email">Username* </label>
                  <input type="text" placeholder="Username*" id="username" class="form-control" name="username">
             </div>
            <div class="section-field mb-20">
             <label class="mb-10" for="password">Password* </label>
               <input class="Password form-control" id="password" type="password" placeholder="Password" name="password">
            </div>
             <div class="section-field mb-20">
                 <label class="mb-10" for="email">Sex* </label>
                  <input type="text" placeholder="Sex*" id="sex" class="form-control" name="sex">
             </div>
              <a href="#" class="button" onclick = "Register()">
                <span>Signup</span>
                <i class="fa fa-check"></i>
             </a>
              <a href="Login.php" class="button black" >
                <span>Back</span>
                <i class="fa fa-chevron-left"></i>
             </a>

          </div>
        </div>
      </div>
  </div>
</section>

<!--=================================
 register-->

</div>

<script type="text/javascript">

			function Register(){
			var name = document.getElementById("name").value;
			var surname = document.getElementById("surname").value;
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var sex = document.getElementById("sex").value;
			
			console.log(name,surname,username,password,sex);
			console.log('eiei')
				  $.ajax({
		  			type: "POST",
		  			dataType:"json",
		  			url: "add_Register.php",
		  			data: "name="+name+"&surname="+surname+"&username="+username+"&password="+password+"&sex="+sex,
		  			timeout: 600000,
		  			success: function (rs){
		  			console.log("------------------------------------");
			  		console.log(rs.status);
			  		if(rs.status == 'ok'){
			  		console.log("Success");
			  		swal({
										title: "<h3>Register Success!!</h3>",
										text: "Message!",
										type: "success"
									}).then(function() {
										window.location = "Login.php";
									});
									
								}else{
									swal('<i class="fa fa-info-circle"></i>'+' <h3> Try Again !!</h3>');
								}
		 				}
		  			});
		  			
			}
</script>
 

</body>
</html>