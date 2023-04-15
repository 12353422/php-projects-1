<?php include("header.php"); 
?>

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Forgot Password</span></p>
				<h1 class="mb-3 bread">Forgot Password</h1>
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
	
	if(isset($_POST['u_email']) && !empty($_POST['u_email']))
	{


		$u_email=$_POST['u_email'];
		// $u_pass=$_POST['u_pass'];

		$select_user="SELECT * FROM `user_reg` WHERE `Email`='$u_email'" ;
		

		$result=@mysqli_query($conn,$select_user);
		$row_count=@mysqli_num_rows($result);

		if($row_count==1)
		{

			$data=@mysqli_fetch_array($result);
			session_start();
			$password=$data['Password'];
			
			// $_SESSION["user_id"]=$data['User_ID'];
			// $_SESSION["user_nm"]=$data['User_FName']." ".$data['User_LName'];
			// $_SESSION["user_email"]=$data['Email'];
			


			// header( "Location:profile.php");    	


		}
		else
		{

			echo'<center><strong>Error</strong> Your Email Id Wrong..</center>';
		}

	}
}

?>
<script type="text/javascript">
	function login_data()
	{
		
		var user_email = document.getElementById("u_email");
		// var user_password = document.getElementById("u_pass");


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

		// if(user_password.value=="" || user_password.value==null)
		// {
		// 	user_password.placeholder="Enter Password";
		// 	user_password.focus();
		// 	return false;		
		// }

	}    
</script>

<section class="ftco-section contact-section bg-light">
	
	<div class="container">
		<div class="row block-9">

			<div class="col-md-6 offset-md-3 order-md-last d-flex">
				<?php 

					if (isset($password) && !empty($password)) {
					
					?>

					<div class="form-group">
					<?php 

						echo "Your Password is <b>".$password."</b>";
					 ?>
					</div>

					<?php 
				}else{


				 ?>
				<form  class="bg-white p-5 contact-form" onsubmit="return login_data();" method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="u_email" name="u_email"  placeholder="Your Email">
					</div>
					<!-- <div class="form-group">
						<input type="password" class="form-control" id="u_pass" name="u_pass"  placeholder="Password">
					</div> -->
					<div class="form-group">
						<input type="submit"  name="submit" value="Login" class="btn btn-primary py-3 px-5">
					</div>
				</form>
			<?php } ?>

			</div>

		</div>
	</div>
</section>


<?php include("footer.php"); ?>