<?php include("header.php"); 
?>

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <!--<span>Contact Us</span></p>!-->
				<h2 class="mb-3 bread">Contact Us</h2>
			</div>
		</div>
	</div>
</div>

		 




<?php 


if (isset($_POST['submit']) && !empty(isset($_POST['submit']))) {


	$query="INSERT INTO `contect_us`(`name`, `email`, `mobile`, `messages`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['mobile']."','".$_POST['messages']."')";
	$result=@mysqli_query($conn,$query);

	if($result)
	{
		
	echo "Done";
	
	// header( "Location:profile.php");    	
		// die();

	}
	else
	{
		// header( "Location:register.php?m=1");  
		// die();
	}	
}




?>
<script type="text/javascript">
	function login_data()
	{
		
		var user_email = document.getElementById("u_email");
		


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

		

	}    
</script>

<section class="ftco-section contact-section bg-light">
<center>
<section class="ftco-section contact-section bg-light">
	<div class="container">
	<h3><p>Contact</p></h3>
		<div class="row block-2">
			<div class="col-md-6 offset-md-3 order-md-last d-flex">
				<form  class="bg-white p-1 contact-form" method="post" onsubmit="return login_data();">
					<div class="form-group">
					
						
						<input type="text" name="name" id="name" class="form-control" onkeypress="return onlychar(event);" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" name="email" id="u_email" class="form-control" placeholder="Email ID">
					</div>
						<div class="form-group">
						<input type="text" name="mobile" id="mobile" maxlength="12" class="form-control" onkeypress="return isNumber(event);" placeholder="Mobile">
					</div>
					<div class="form-group">
						<textarea type="text" name="messages" id="messages" class="form-control" placeholder="Messages"></textarea>
					</div>
					
					<div class="form-group">
						<input type="submit" value="Submit" name="submit" class="btn btn-primary py-3 px-5">
					</div>
				</form>

			</div>

		</div>
	</div>
</section>
<section class="ftco-section contact-section bg-light">
      <div class="container">
	  <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
		  <center>
            <h2 class="h3">Contact Information</h2>
			</center>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
                 </div>
		            <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone No:</span> <a href="">Satyam:9558396400</a></p>
				<p><span>Phone No:</span> <a href="">Divyang:9638694233</a></p>
				<p><span>Phone No:</span> <a href="">Virendra:9016560233</a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	           <p><span>Email Id:</span> <a href="">satyamdharia19986@gmail.com</a></p>
				<p><span>Email Id:</span> <a href="">divyangbaria7771@gmail.com</a></p>
				<p><span>Email Id:</span> <a href="">rajyaguruviru18@gmail.com</a></p>
	          </div>
			  
			  <div class="col-md-6 d-flex">
			  <div class="info bg-white p-4">
	            <p><span>Addrss:</span> <a href="">Rayanvadi Socity Ajanta Apartment Bamroli Road Godhra Flat No:-13</a></p>
				</div>
	          </div>
          </div>
		  </section>
	
</h3>
	</center>
	
	</div>
</section>


<?php include("footer.php"); ?>
