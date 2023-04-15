<?php include("header.php"); 
?>

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <!--<span>Login</span></p>!-->
				<h1 class="mb-3 bread">About Us</h1>
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

	

</br></br>
<center>
<h5> Our Service</h5><br>
</center>
<h5> P.G Services:</h5>   
<h5>"Our web Application “ SMART P.G ” Provide Good P.G Service And Other Stay Services  Like Flat,Room And Houses"  </h5>
<div class="item">
										<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'Dv.jpg'; ?>);"></div>
									</div></br></br>
<h5>Tiffin Service:</h5>    
<h5>"Our web Application “ SMART P.G ” Provide Good  Tiffin Service and Mess Services and etc"   </h5>
<div class="item">
										<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'download.jpg'; ?>);"></div>
									</div></br></br>
<h5>Laundry Service:</h5>    <h5>"Our web Application “ SMART P.G ” Provide Good  Laundry Services like Drycleaning and Iron service"    </h5>
<div class="item">
										<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'L1.jpg'; ?>);"></div>
									</div></br></br></br></br>
									<div class="item">
										
									
<h5>   This  web site “ SMART P.G ” Provide Entire PG facilitys Normally young students, 
fresher’s  take up these kind of opportunity In this time of life is college, studies, work etc.. 
and they are hardly expected to be in the room Some times they demand separate room or sometimes they demand PG, 
Staying is not only requirement of the student , they want more facility like Tifin Service, Laundry Services, Near by Hotel and also staying facility.
Our Web Application provide all facility regarding to helpful students. </h5>
	<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'1822.jpg'; ?>);"></div>
									</div></br></br>
	</div>
</section>

<?php include("footer.php"); ?>