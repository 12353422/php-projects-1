<?php include("header.php");


if (isset($_POST['submit']) && !empty(isset($_POST['submit']))) {


	$query="INSERT INTO `user1_reg`(`Service_ID`,`User_FName`, `User_LName`, `Gender`, `Address`, `State_ID`, `District_ID`, `City_ID`,`Area_ID`, `Email`, `Mobile`, `Password`) VALUES ('".$_POST['Service_ID']."','".$_POST['User_FName']."','".$_POST['User_LName']."','".$_POST['Gender']."','".$_POST['Address']."','".$_POST['State_ID']."','".$_POST['District_ID']."','".$_POST['City_ID']."','".$_POST['Area_ID']."','".$_POST['Email']."','".$_POST['Mobile']."','".$_POST['Password']."')";


  //$query="INSERT INTO `user1_reg`(`Service_ID`,`User_FName`, `User_LName`, `Gender`, `Address`, `State_ID`, `District_ID`, `City_ID`,`Area_ID`, `Email`, `Mobile`, `Password`,`Package_ID`) VALUES ('".$_POST['Service_ID']."','".$_POST['User_FName']."','".$_POST['User_LName']."','".$_POST['Gender']."','".$_POST['Address']."','".$_POST['State_ID']."','".$_POST['District_ID']."','".$_POST['City_ID']."','".$_POST['Area_ID']."','".$_POST['Email']."','".$_POST['Mobile']."','".$_POST['Password']."','1')";



	$q=@mysqli_query($conn,$query);


	session_start();

	$_SESSION["property_user_id"]=@mysqli_insert_id($conn);
	$_SESSION["property_user_name"]=$_POST['User_FName'];
	$_SESSION["property_admin_type"]="";
	$_SESSION["property_admin_email"]=$_POST['Email'];
	$_SESSION["property_admin_Service_ID"]=$_POST['Service_ID'];
	$_SESSION['Package_ID']=1;


	header( "Location:service/dashboard/dashbord.php?m=4");    	    

	
}




?>
<script src="js/validation-service.js" ></script>
<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Registration</span></p>
		<h1 class="mb-3 bread">Service Provider Registration</h1>
		
			</div>
		</div>
	</div>
</div>
<h3 class="mb-3 bread">Welcome Service-Provider</h3>
<section class="ftco-section contact-section bg-light">
	<div class="container">
		<div class="row block-9">
			<div class="col-md-6 offset-md-3 order-md-last d-flex">
				<form  class="bg-white p-5 contact-form" method="post" onsubmit="return required_data();">
					<div class="form-group">
						<input type="text" name="User_FName" id="User_FName" onkeypress="return onlychar(event);" class="form-control" placeholder="First Name">
					</div>
					<div class="form-group">
						<input type="text" name="User_LName" id="User_LName" onkeypress="return onlychar(event);" class="form-control" placeholder="Last Name">
					</div>
					<div class="form-group">
						Male <input type="radio" name="Gender" value="Male" checked=""> Female <input type="radio" name="Gender" value="Female">
					</div>
					<div class="form-group">
						<input type="text" name="Email" id="Email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" name="Password" id="Password" maxlength="6" class="form-control"  placeholder="Password">
					</div>
					<div class="form-group">
						<input type="text" name="Mobile" id="Mobile" class="form-control" onkeypress="return isNumber(event);"maxlength="10" placeholder="Mobile Number">
					</div>
					<div class="form-group">
						<select name="Service_ID" id="Service_ID" class="form-control">
							<option value="">Select Service</option>
							<?php
							$select_service="select * from tbl_service";
							$result_service = @mysqli_query($conn, $select_service);
							while($fh_user= @mysqli_fetch_array($result_service))
							{ 
								echo "<option value='".$fh_user['Service_ID']."'  >". $fh_user['Service_Name']."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<select name="State_ID" id="State_ID" class="form-control" onchange="return dist_data(this.value);">
							<option value="">Select State</option>
							<?php
							$select_waste_types="select * from tbl_state";
							$result_user = @mysqli_query($conn, $select_waste_types);
							while($fh_user= @mysqli_fetch_array($result_user))
							{ 
								echo "<option value='".$fh_user['State_ID']."'  >". $fh_user['State_Name']."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<select name="District_ID" id="District_ID" class="form-control" onchange="return city_data(this.value);" >
							<option value="">Select District</option>
						</select>
					</div>
					<div class="form-group">
						<select name="City_ID" id="City_ID" class="form-control" onchange="return area_data(this.value);" >
							<option value="">Select City</option>
						</select>
					</div>
					<div class="form-group">
						<select name="Area_ID" id="Area_ID" class="form-control" >
							<option value="">Select Area</option>
						</select>
					</div>
					

					<div class="form-group">
						<input type="submit" value="Register" name="submit" class="btn btn-primary py-3 px-5">
					</div>
				</form>

			</div>

		</div>
	</div>
</section>


<?php include("footer.php"); ?>
<script type="text/javascript">
	function dist_data(val)
	{
		$.ajax({
			type:"GET",
			url:"get_district.php",
			data:{id:val},
			success:function(result){
				$("#District_ID").html(result);
			}

		});

		$("#City_ID").html("<option value=''>Select City</option>");
		$("#Area_ID").html("<option value=''>Select Area</option>");
	}
	function city_data(val)
	{
		$.ajax({
			type:"GET",
			url:"get_city.php",
			data:{id:val},
			success:function(result){
				$("#City_ID").html(result);
			}

		});
		$("#Area_ID").html("<option value=''>Select Area</option>");
	}
	function area_data(val)
	{
		$.ajax({
			type:"GET",
			url:"get_area.php",
			data:{id:val},
			success:function(result){
				$("#Area_ID").html(result);
			}

		});
	}
</script>