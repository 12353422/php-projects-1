<?php include("header.php");?>
<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> </p>
				<h1 class="mb-3 bread">Paying Guest Service</h1>
			</div>
		</div>
	</div>
</div>
<section class="ftco-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12 search-wrap">
				<h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span> Search Property</h2>
				<form action="property.php" method="post" class="search-property">
					<div class="row">
						<div class="col-md align-items-end">
							<div class="form-group">
								<label for="#">Property Category</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="Property_Type_ID" id="Property_Type_ID"    class="form-control">
											<option value="">Property Type</option>
											<?php 
											$select_district="select * from tbl_property_type";
											$result_user = @mysqli_query($conn, $select_district);

											while($fh_user= @mysqli_fetch_array($result_user))
											{ 

												echo "<option value='".$fh_user['Property_Type_ID']."'>". $fh_user['Property_Type_Name']."</option>";

											}
											?>  
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md align-items-end">
							<div class="form-group">
								<label for="#"> Rooms Type</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select  name="Property_Room_ID" id="Property_Room_ID"  class="form-control">
											<option value="">Type</option>
											<?php 
											$select_district="select * from  tbl_property_rooms";
											$result_user = @mysqli_query($conn, $select_district);

											while($fh_user= @mysqli_fetch_array($result_user))
											{ 

												echo "<option value='".$fh_user['Property_Room_ID']."' ".($Property_Room==$fh_user['Property_Room_ID']?'selected':'')." >". $fh_user['Property_Room_Name']."</option>";

											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-md align-items-end">
							<div class="form-group">
								<label for="#">State</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
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
								</div>
							</div>
						</div>
						<div class="col-md align-items-end">
							<div class="form-group">
								<label for="#">District</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="District_ID" id="District_ID" class="form-control" onchange="return city_data(this.value);" >
											<option value="">Select District</option>
										</select>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md align-items-end">
							<div class="form-group">
								<label for="#">City</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="City_ID" id="City_ID" class="form-control" onchange="return area_data(this.value);" >
											<option value="">Select City</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md align-items-end">
							<div class="form-group">
								<label for="#">Area</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="Area_ID" id="Area_ID" class="form-control" >
											<option value="">Select Area</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="col-md align-self-end">
							<div class="form-group">
								<div class="form-field">
									<input type="submit" name="search" value="Search" class="form-control btn btn-primary">
									
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<?php

			$query="";

			if (isset($_POST['Property_Type_ID']) && !empty($_POST['Property_Type_ID'])) {
				$query.=" AND p.Property_Type=".$_POST['Property_Type_ID'];
			}

			if (isset($_POST['Property_Room_ID']) && !empty($_POST['Property_Room_ID'])) {
				$query.=" AND p.Property_Rooms=".$_POST['Property_Room_ID'];
			}
			if (isset($_POST['State_ID']) && !empty($_POST['State_ID'])) {
				$query.=" AND p.State_ID=".$_POST['State_ID'];
			}
			if (isset($_POST['City_ID']) && !empty($_POST['City_ID'])) {
				$query.=" AND p.City_ID=".$_POST['City_ID'];
			}
			if (isset($_POST['District_ID']) && !empty($_POST['District_ID'])) {
				$query.=" AND p.District_ID=".$_POST['District_ID'];
			}
			if (isset($_POST['Area_ID']) && !empty($_POST['Area_ID'])) {
				$query.=" AND p.Area_ID=".$_POST['Area_ID'];
			}

			if (isset($_POST['Area_ID']) && !empty($_POST['Area_ID'])) {
				$query.=" AND p.Area_ID=".$_POST['Area_ID'];
			}
			//if (isset($_POST['Address']) && !empty($_POST['Address'])) {
				//$query.=" AND p.Address LIKE '%".$_POST['Address']."%'";
			//}

			

			$select_service_req_advt="SELECT p.*,u.User_FName,u.User_LName,tbl_state.State_Name,tbl_district.District_Name,tbl_city.City_Name,tbl_area.Area_Name,tbl_property_type.Property_Type_Name,tbl_property_rooms.Property_Room_Name FROM tbl_property p inner join user1_reg u on p.User_id=u.User_id LEFT JOIN tbl_state ON p.State_ID=tbl_state.State_ID LEFT JOIN tbl_district ON p.District_ID=tbl_district.District_ID LEFT JOIN tbl_city ON p.City_ID=tbl_city.City_ID LEFT JOIN tbl_area ON p.Area_ID=tbl_area.Area_ID LEFT join tbl_property_type on p.Property_Type=tbl_property_type.Property_Type_ID LEFT join tbl_property_rooms on p.Property_Rooms=tbl_property_rooms.Property_Room_ID  WHERE p.Status='Active' ".$query;	
			

			
			$result_user = @mysqli_query($conn, $select_service_req_advt);
			

			while($fh_user= @mysqli_fetch_array($result_user))
			{ 
				
				?>
				<div class="col-md-4 ftco-animate">
					<div class="properties">
						<a href="property-single.php?p=<?php echo $fh_user['Property_ID'];?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'no-image-icon.png'; ?>);">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="icon-search2"></span>
							</div>
						</a>
						<div class="text p-3">
							<!-- <span class="status sale">Sale</span> -->
							<div class="d-flex">
								<div class="one">
									<h3><a href="property-single.php?p=<?php echo $fh_user['Property_ID'];?>"><?php echo $fh_user['Title']; ?></a></h3>
									<p><?php echo $fh_user['Property_Type_Name']; ?></p>
								</div>
								<div class="two">
									<span class="price">Rs.<?php echo $fh_user['Rent']; ?></span>
								</div>
							</div>
							
							<hr>
							<p class="bottom-area d-flex">
								<!-- <span><i class="flaticon-selection"></i> 250sqft</span> -->
								<!-- <span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span> -->
								<span><i class="flaticon-bed"></i> <?php echo $fh_user['Property_Room_Name']; ?></span>
							</p>
						</div>
					</div>
				</div>
			<?php }?>

		</div>
		<!-- <div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li><a href="#">&lt;</a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&gt;</a></li>
					</ul>
				</div>
			</div>
		</div> -->
	</div>
</section>


</section>
<?php include("footer.php");?>
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