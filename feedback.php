<?php include("header.php"); 
?>

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">

	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> 
				<h1 class="mb-3 bread">Feedback</h1>
			</div>
		</div>
	</div>
</div>
<?php 


if (isset($_POST['submit']) && !empty(isset($_POST['submit']))) {


	$query="INSERT INTO `feedback`(`experience`, `comments`, `name`, `email`) VALUES ('".$_POST['experience']."','".$_POST['comments']."','".$_POST['name']."','".$_POST['email']."')";
	$result=@mysqli_query($conn,$query);

	if($result)
	{
		
	echo "Done";
	
		header( "Location:feedback.php");  
		die();

	}
	else
	{
		header( "Location:register.php?m=1");  
		die();
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
		     <div class="col-md-12 col-md-offset-3 form-container" align="center" >
              
                    <p> Please provide your feedback below: </p>
                  
 <form  class="bg-white p-5 contact-form" method="post" onsubmit="return login_data();">
 	<div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" onkeypress="return onlychar(event);" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="user_email" name="email" required>
                            </div>
                        </div>
				    
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                    <div class="form-group">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad"  >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" checked>
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-sm-12 form-group">
                           <button type="submit" class="btn btn-lg btn-warning btn-block" value="Submit" name="submit" class="btn btn-primary py-3 px-5">Post </button>
				                          
						  </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>



	</div>
</section>

<section class="ftco-section-parallax">
	
	
	
	
	
	
</section>
<?php include("footer.php"); ?>
