<?php include("header.php"); 
?>

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Login</span></p>
				<h1 class="mb-3 bread">Login</h1>
			</div>
		</div>
	</div>
</div>
<?php 

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]))
{
	unset($_SESSION["user_id"]);
	unset($_SESSION["user_nm"]);
	unset($_SESSION["user_email"]);

	header( "Location:login.php");    	
}
if (isset($_POST['submit'])&&$_POST['submit']=='Login') {
	
	if(isset($_POST['u_email']) && isset($_POST['u_pass']) && !empty($_POST['u_email']) &&!empty($_POST['u_pass']))
	{


		$u_email=$_POST['u_email'];
		$u_pass=$_POST['u_pass'];

		$select_user="SELECT * FROM `user_reg` WHERE `Email`='$u_email' AND `Password` ='$u_pass'" ;
		

		$result=@mysqli_query($conn,$select_user);
		$row_count=@mysqli_num_rows($result);

		if($row_count==1)
		{

			$data=@mysqli_fetch_array($result);
			session_start();
			$_SESSION["user_id"]=$data['User_ID'];
			$_SESSION["user_nm"]=$data['User_FName']." ".$data['User_LName'];
			$_SESSION["user_email"]=$data['Email'];
			


			header( "Location:profile.php");    	


		}
		else
		{

			echo'
			<center><strong>Error</strong> Your Id or Password Wrong..</center>
			';
		}

	}
}

?>
<script type="text/javascript">
	function login_data()
	{
		
		var user_email = document.getElementById("u_email");
		var user_password = document.getElementById("u_pass");


		if(user_email.value=="" || user_email.value== null)
		{
			user_email.placeholder="Enter Email Id";
			user_email.focus();
			return false;	
		}


		if(user_email.value!='')
		{
			var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter1.test(user_email.value))
			{
				user_email.value='';
				user_email.placeholder="Enter Valid Email ID";
				user_email.focus();
				return false;
			}
		}

		if(user_password.value=="" || user_password.value==null)
		{
			user_password.placeholder="Enter Password";
			user_password.focus();
			return false;		
		}

	}    
</script>

<section class="ftco-section contact-section bg-light">
	
	<div class="container">
		<div class="row block-9">

			<div class="col-md-6 offset-md-3 order-md-last d-flex">
				<form  class="bg-white p-5 contact-form" onsubmit="return login_data();" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="u_email" name="u_email"  placeholder="Your Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="u_pass" name="u_pass"  placeholder="Password">
					</div>
					<div class="form-group">
						<input type="submit"  name="submit" value="Login" class="btn btn-primary py-3 px-5">
						<a href="forgot-password.php">Forgot Password</a>
					</div>
				</form>

			</div>

		</div>
	</div>
</section>

<section class="ftco-section-parallax">
	<!--<div class="parallax-img d-flex align-items-center">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2>Subcribe to our Newsletter</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
					<div class="row d-flex justify-content-center mt-5">
						<div class="col-md-8">
							<form action="#" class="subscribe-form">
								<div class="form-group d-flex">
									<input type="text" class="form-control" placeholder="Enter email address">
									<input type="submit" value="Subscribe" class="submit px-3">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>!-->
</section>
<?php include("footer.php"); ?>