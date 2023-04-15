<?php include("header.php");

if(!isset($_SESSION["user_id"]) && empty($_SESSION["user_id"]))
{
	
	header( "Location:login.php");    	
}

if (isset($_POST['submit']) ) {

	$State_ID=trim($_POST['State_ID']);
	$City_ID =trim($_POST['City_ID']);
	$Area_ID =trim($_POST['Area_ID']);
	$User_FName =trim($_POST['User_FName']);
	$District_ID =trim($_POST['District_ID']);

	$Address =trim($_POST['Address']);
	$User_LName =trim($_POST['User_LName']);
	$Email =trim($_POST['Email']);
	$Mobile =trim($_POST['Mobile']);
	$Password =trim($_POST['Password']);
	$Gender =trim($_POST['Gender']);

	if(isset($_POST['Password']) && !empty($_POST['Password'])){

		$insert="UPDATE `user_reg` SET `User_FName`='".$User_FName."',`User_LName`='".$User_LName."',`Gender`='".$Gender."',`Address`='".$Address."',`State_ID`='".$State_ID."',`District_ID`='".$District_ID."',`City_ID`='".$City_ID."',`Area_ID`='".$Area_ID."',`Email`='".$Email."',`Mobile`='".$Mobile."',`Password`='".$Password."' where user_id=".$_SESSION["user_id"];
	}else{

		$insert="UPDATE `user_reg` SET `User_FName`='".$User_FName."',`User_LName`='".$User_LName."',`Gender`='".$Gender."',`Address`='".$Address."',`State_ID`='".$State_ID."',`District_ID`='".$District_ID."',`City_ID`='".$City_ID."',`Area_ID`='".$Area_ID."',`Email`='".$Email."',`Mobile`='".$Mobile."' where user_id=".$_SESSION["user_id"];
	}

	$result=@mysqli_query($conn,$insert);

	echo '<div class="alert alert-success fade in">
	<button data-dismiss="alert" class="close close-sm" type="button">
	<i class="fa fa-times"></i>
	</button>
	<strong>Updated</strong> Your Profile 
	</div>';

}

$query="SELECT * FROM `user_reg` WHERE User_ID=".$_SESSION["user_id"];
$result=@mysqli_query($conn,$query);
$data=@mysqli_fetch_array($result);

$User_FName=$data['User_FName'];
$User_LName=$data['User_LName'];
$Gender=ucfirst($data['Gender']);
$Area_ID=$data['Area_ID'];
$City_ID=$data['City_ID'];


$District_ID=$data['District_ID'];

$State_ID=$data['State_ID'];





$Address =trim($data['Address']);

$Email =trim($data['Email']);
$Mobile =trim($data['Mobile']);

?>
<script type="text/javascript">
	function required_data()
	{

		var State_ID= document.getElementById("State_ID");
		var District_ID= document.getElementById("District_ID");
		var City_ID= document.getElementById("City_ID");
		var User_FName= document.getElementById("User_FName");
		var User_LName= document.getElementById("User_LName");
		var Area_ID= document.getElementById("Area_ID");
		var Address= document.getElementById("Address");

		var Email= document.getElementById("Email");
		var Password= document.getElementById("Password");
		var confirm_Password= document.getElementById("rep_Password");
		var Mobile= document.getElementById("Mobile");
		var package_id= document.getElementById("package_id");
		var status= document.getElementById("status");



		if(User_FName.value=="" || User_FName.value==null)
		{
			User_FName.placeholder="Enter Your First Name";
			User_FName.focus();
			return false;
		}
		if(User_LName.value=="" || User_LName.value==null)
		{
			User_LName.placeholder="Enter Your Last Name";
			User_LName.focus();
			return false;
		}

		if(Email.value=="" || Email.value==null)
		{
			Email.placeholder="Enter Email";
			Email.focus();
			return false;
		}


		if(Email.value!='')
		{
			var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter1.test(Email.value))
			{
				Email.value='';
				Email.placeholder="Enter Valid Email Address";
        //          Email.style.borderColor="red";
        Email.focus();
        return false;
    }
}

// if(Password.value=="" || Password.value==null)
// {
// 	Password.placeholder="Enter New Password";
// 	Password.style.borderColor= " ";
// 	Password.focus();
// 	return false;
// }
// if(confirm_Password.value=="" || confirm_Password.value==null)
// {
//  confirm_Password.placeholder="Enter Confirm New Password";
//  confirm_Password.style.borderColor= " ";
//  confirm_Password.focus();
//  return false;
// }

// if(confirm_Password.value!=Password.value)
// {
//     confirm_Password.value='';
//     confirm_Password.placeholder="Must Be Same As Password";
//     confirm_Password.style.borderColor= " ";
//     confirm_Password.focus();
//     return false;
// }


if(Mobile.value=="" || Mobile.value==null)
{
	Mobile.placeholder="Enter Mobile Number";
	Mobile.focus();
	return false;
}
if(State_ID.value=="" || State_ID.value==null)
{
	alert("Select  State");
	State_ID.focus();
	return false;
}
if(District_ID.value=="" || District_ID.value==null)
{
	alert("Select District ");
	District_ID.focus();
	return false;
}
if(City_ID.value=="" || City_ID.value==null)
{
	alert("Select City ");
	City_ID.focus();
	return false;
}

if(Area_ID.value=="" || Area_ID.value==null)
{
	alert("Select Area");
	Area_ID.focus();
	return false;
}

if(Address.value=="" || Address.value==null)
{
	Address.placeholder="Enter Address";
	Address.focus();
	return false;
}


}

</script>
<section class="ftco-section contact-section bg-light">
	<div class="container">
		<div class="row">

			<div class="col-md-6 order-md-last d-flex">

				<form  class="bg-white p-5 contact-form" method="post" onsubmit="return required_data();">
					<div class="form-group">
						<input type="text" name="User_FName" id="User_FName" onkeypress="return onlychar(event);" class="form-control" placeholder="First Name" value="<?php echo $User_FName; ?>">
					</div>
					<div class="form-group">
						<input type="text" name="User_LName" id="User_LName" onkeypress="return onlychar(event);" class="form-control" placeholder="Last Name" value="<?php echo $User_LName; ?>">
					</div>
					<div class="form-group">
						Male <input type="radio" name="Gender" value="Male" checked> Female <input type="radio" name="Gender" value="Female" <?php echo ($Gender=='Female'?'checked':''); ?>>
					</div>
					<div class="form-group">
						<input type="text" name="Email" id="Email" class="form-control" placeholder="Email" value="<?php echo $Email; ?>">
					</div>
					<div class="form-group">
						<input type="password" name="Password" id="Password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="text" name="Mobile" id="Mobile" class="form-control" placeholder="Mobile Number" value="<?php echo $Mobile; ?>">
					</div>
					<div class="form-group">
						<select name="State_ID" id="State_ID" class="form-control" onchange="return dist_data(this.value);">
							<option value="">Select State</option>
							<?php
							$select_waste_types="select * from tbl_state";
							$result_user = @mysqli_query($conn, $select_waste_types);
							while($fh_user= @mysqli_fetch_array($result_user))
							{ 
								echo "<option value='".$fh_user['State_ID']."' ".($State_ID==$fh_user['State_ID']?'selected':'')." >". $fh_user['State_Name']."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<select name="District_ID" id="District_ID" class="form-control" onchange="return city_data(this.value);" >
							<option value="">Select District</option>
							<?php
							$select_waste_types="select * from tbl_district";
							$result_user = @mysqli_query($conn, $select_waste_types);
							while($fh_user= @mysqli_fetch_array($result_user))
							{ 
								echo "<option value='".$fh_user['District_ID']."' ".($District_ID==$fh_user['District_ID']?'selected':'')." >". $fh_user['District_Name']."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<select name="City_ID" id="City_ID" class="form-control" onchange="return area_data(this.value);" >
							<option value="">Select City</option>
							<?php
							$select_waste_types="select * from tbl_city";
							$result_user = @mysqli_query($conn, $select_waste_types);
							while($fh_user= @mysqli_fetch_array($result_user))
							{ 
								echo "<option value='".$fh_user['City_ID']."' ".($City_ID==$fh_user['City_ID']?'selected':'')." >". $fh_user['City_Name']."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<select name="Area_ID" id="Area_ID" class="form-control" >
							<option value="">Select Area</option>
							<?php
							$select_waste_types="select * from tbl_area";
							$result_user = @mysqli_query($conn, $select_waste_types);
							while($fh_user= @mysqli_fetch_array($result_user))
							{ 
								echo "<option value='".$fh_user['Area_ID']."' ".($Area_ID==$fh_user['Area_ID']?'selected':'')." >". $fh_user['Area_Name']."</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<textarea name="Address" id="Address" class="form-control" placeholder="Address"><?php echo $Address; ?></textarea>
					</div>

					<div class="form-group">
						<input type="submit" value="Update" name="submit" class="btn btn-primary py-3 px-5">
						
					</div>
				</form>

			</div>
			<div class="col-md-6 order-md-last d-flex">
				<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					<tr><th colspan="4"><center>Property List</center></th></tr>
					<tr>
						<th>Sr No.</th>
						<th>Property Name</th>
						<th>Response</th>
						<th>Actions</th>
					</tr>
					<?php 

					$fetch="select * FROM tbl_property_response pr inner join tbl_property p on pr.Property_ID=p.Property_ID  where pr.User_ID=".$_SESSION['user_id'];


					$result_user=@mysqli_query($conn,$fetch);
					$i=1;
					while($fh_user= @mysqli_fetch_array($result_user))
					{
						?>

						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $fh_user['Title']; ?></td>
							<td><?php echo $fh_user['RP_Response']; ?></td>
							<td><a href="property-single.php?p=<?php echo $fh_user['Property_ID'];?>">View</a></td>
						</tr>

						<?php
						$i++;
					}

					?>

				</table>
				

			</div>

		</div>

		<div class="row" style="margin-top:20px; ">
			<div class="col-md-6 order-md-last d-flex">
				<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					<tr><th colspan="4"><center>Tiffin List</center></th></tr>
					<tr>
						<th>Sr No.</th>
						<th>Name</th>
						<th>Response</th>
						<th>Actions</th>
					</tr>
					<?php 

					$fetch="select * FROM tbl_service_response pr inner join tbl_service_provider p on pr.Service_provider_ID=p.Service_provider_ID  where Service_ID=1 AND pr.User_ID=".$_SESSION['user_id'];


					$result_user=@mysqli_query($conn,$fetch);
					$i=1;
					while($fh_user= @mysqli_fetch_array($result_user))
					{
						?>

						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $fh_user['Service_title']; ?></td>
							<td><?php echo $fh_user['Service_RP_Response']; ?></td>
							<td><a href="service-data.php?p=<?php echo $fh_user['Service_provider_ID'];?>">View</a></td>
						</tr>

						<?php
						$i++;
					}

					?>

				</table>
			</div>
			<div class="col-md-6 order-md-last d-flex">
				<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					<tr><th colspan="4"><center>Laundry List</center></th></tr>
					<tr>
						<th>Sr No.</th>
						<th>Name</th>
						<th>Response</th>
						<th>Actions</th>
					</tr>
					<?php 

					$fetch="select * FROM tbl_service_response pr inner join tbl_service_provider p on pr.Service_provider_ID=p.Service_provider_ID  where Service_ID=3 AND pr.User_ID=".$_SESSION['user_id'];


					$result_user=@mysqli_query($conn,$fetch);
					$i=1;
					while($fh_user= @mysqli_fetch_array($result_user))
					{
						?>

						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $fh_user['Service_title']; ?></td>
							<td><?php echo $fh_user['Service_RP_Response']; ?></td>
							<td><a href="service-data.php?p=<?php echo $fh_user['Service_provider_ID'];?>">View</a></td>
						</tr>

						<?php
						$i++;
					}

					?>

				</table>
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