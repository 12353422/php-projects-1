<?php include("header.php");

if (isset($_POST['sendrequest']) && !empty($_POST['sendrequest'])) {
	

	if(!isset($_SESSION["user_id"]) && empty($_SESSION["user_id"]))
	{

		header( "Location:login.php");    	
	}else{

		$query="INSERT INTO `tbl_property_response`(`Property_ID`, `User_ID`, `User_Response`) VALUES ('".$_POST['Property_ID']."','".$_SESSION['user_id']."','Request')";

		$data=@mysqli_query($conn, $query);	
	}
	
}

if(isset($_GET['p']) && !empty($_GET['p'])){
	?>
	<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span><span>Paying Guest Service</span></p>
					<h1 class="mb-3 bread">Paying Guest Service</h1>
				</div>
			</div>
		</div>
	</div>
	<?php
	$select_service_req_advt="SELECT p.*,u.User_FName,u.User_LName,tbl_state.State_Name,tbl_district.District_Name,tbl_city.City_Name,tbl_area.Area_Name,tbl_property_type.Property_Type_Name,tbl_property_rooms.Property_Room_Name FROM tbl_property p inner join user1_reg u on p.User_id=u.User_id LEFT JOIN tbl_state ON p.State_ID=tbl_state.State_ID LEFT JOIN tbl_district ON p.District_ID=tbl_district.District_ID LEFT JOIN tbl_city ON p.City_ID=tbl_city.City_ID LEFT JOIN tbl_area ON p.Area_ID=tbl_area.Area_ID LEFT join tbl_property_type on p.Property_Type=tbl_property_type.Property_Type_ID LEFT join tbl_property_rooms on p.Property_Rooms=tbl_property_rooms.Property_Room_ID  WHERE p.Status='Active' AND p.Property_ID=".$_GET['p'];
	$result_user = @mysqli_query($conn, $select_service_req_advt);

	if($fh_user= @mysqli_fetch_array($result_user))
	{ 
		?>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-10">
						<div class="row">
							<div class="col-md-12 ftco-animate">
								<div class="single-slider owl-carousel">
									<div class="item">
										<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'no-image-icon.png'; ?>);"></div>
									</div>
									<div class="item">
										<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'no-image-icon.png'; ?>);"></div>
									</div>
									<div class="item">
										<div class="properties-img" style="background-image: url(images/property/<?php echo !empty($fh_user['Image'])?$fh_user['Image']:'no-image-icon.png'; ?>);"></div>
									</div>
								</div>
							</div>
							<div class="col-md-12 Properties-single mt-4 mb-5 ftco-animate">
								<h2><?php echo $fh_user['Title']; ?></h2>
								<p class="rate mb-4">
									<span class="loc"><a href="#"><i class="icon-map"></i><?php echo $fh_user['State_Name'].",".$fh_user['District_Name'].",".$fh_user['City_Name'].",".$fh_user['Area_Name'].",".$fh_user['Address']; ?></a></span>
								</p>
								<p><?php echo $fh_user['Description']; ?></p>
								<div class="two">
									<span class="price">₹.<?php echo $fh_user['Rent']; ?></span>
								</div>
								<div class="d-md-flex mt-5 mb-5">
									<ul>
										<li><span>Property Type : </span><?php echo $fh_user['Property_Type_Name']; ?></li>
										<li><span>Property Room: </span> <?php echo $fh_user['Property_Room_Name']; ?></li>
<li><h6><span><p>Good P.G  provide Lift,self Locker and parking</span></h6></li>										
<li><h6><p>Many Other services like Tiffin And Laundry</h6></li></p>						
			</ul>
									<!-- <ul class="ml-md-5">
										<li><span>Floor Area: </span> 1,300 SQ FT</li>
										<li><span>Year Build:: </span> 2018</li>
										<li><span>Stories: </span> 1</li>
										<li><span>Roofing: </span> New</li>
									</ul> -->
								</div>

								<?php 

								$fetch="select * FROM tbl_property_response where Property_ID=".$_GET['p']." AND User_ID=".$_SESSION['user_id'];


								$q=@mysqli_query($conn,$fetch);
								$c=@mysqli_num_rows($q); 
								
								if($c==0)
								{


									?>
									<form action="property-single.php?p=<?php echo $_GET['p'];?>" class="bg-white p-5 contact-form" method="post">
										<input type="hidden" name="Property_ID" value="<?php echo $_GET['p'];?>">
										<div class="form-group">
											<input type="submit" name="sendrequest" value="Send Request" class="btn btn-primary py-3 px-5">
										</div>
									</form>
								<?php }else{?>

									<label class="btn-primary py-3 px-5" style="background: #ff8f56 !important" >Requested</label>
									
									<!--<label class="btn-primary py-3 px-5" style="background: #ff8f56 !important" >Conform</label>!-->

								<?php } ?>


							</div>
						<!-- <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
							<h3 class="mb-4">Take A Tour</h3>
							<div class="block-16">
								<figure>
									<img src="images/properties-6.jpg" alt="Image placeholder" class="img-fluid">
									<a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span class="icon-play"></span></a>
								</figure>
							</div>
						</div> -->

						<!-- <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
							<h4 class="mb-4">Review &amp; Ratings</h4>
							<div class="row">
								<div class="col-md-6">
									<form method="post" class="star-rating">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">
												<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i> 100 Ratings</span></p>
											</label>
										</div>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">
												<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i> 30 Ratings</span></p>
											</label>
										</div>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">
												<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 5 Ratings</span></p>
											</label>
										</div>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">
												<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
											</label>
										</div>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">
												<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span></p>
											</label>
										</div>
									</form>
								</div>
							</div>
						</div> -->
						<!-- <div class="col-md-12 properties-single ftco-animate mb-5 mt-5">
							<h4 class="mb-4">Related Properties</h4>
							<div class="row">
								<div class="col-md-6 ftco-animate">
									<div class="properties">
										<a href="property-single.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/properties-1.jpg);">
											<div class="icon d-flex justify-content-center align-items-center">
												<span class="icon-search2"></span>
											</div>
										</a>
										<div class="text p-3">
											<span class="status sale">Sale</span>
											<div class="d-flex">
												<div class="one">
													<h3><a href="property-single.html">North Parchmore Street</a></h3>
													<p>Apartment</p>
												</div>
												<div class="two">
													<span class="price">$20,000</span>
												</div>
											</div>
											<p>Far far away, behind the word mountains, far from the countries</p>
											<hr>
											<p class="bottom-area d-flex">
												<span><i class="flaticon-selection"></i> 250sqft</span>
												<span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>
												<span><i class="flaticon-bed"></i> 4</span>
											</p>
										</div>
									</div>
								</div>
								<div class="col-md-6 ftco-animate">
									<div class="properties">
										<a href="property-single.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/properties-2.jpg);">
											<div class="icon d-flex justify-content-center align-items-center">
												<span class="icon-search2"></span>
											</div>
										</a>
										<div class="text p-3">
											<span class="status sale">Sale</span>
											<div class="d-flex">
												<div class="one">
													<h3><a href="property-single.html">North Parchmore Street</a></h3>
													<p>Apartment</p>
												</div>
												<div class="two">
													<span class="price">$20,000</span>
												</div>
											</div>
											<p>Far far away, behind the word mountains, far from the countries</p>
											<hr>
											<p class="bottom-area d-flex">
												<span><i class="flaticon-selection"></i> 250sqft</span>
												<span class="ml-auto"><i class="flaticon-bathtub"></i> 3</span>
												<span><i class="flaticon-bed"></i> 4</span>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div> -->

					</div>
				</div> <!-- .col-md-8 -->
				<!-- <div class="col-lg-4 sidebar ftco-animate">
					<div class="sidebar-box">
						<form action="#" class="search-form">
							<div class="form-group">
								<span class="icon fa fa-search"></span>
								<input type="text" class="form-control" placeholder="Type a keyword and hit enter">
							</div>
						</form>
					</div>
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Categories</h3>
							<li><a href="#">Properties <span>(12)</span></a></li>
							<li><a href="#">Home <span>(22)</span></a></li>
							<li><a href="#">House <span>(37)</span></a></li>
							<li><a href="#">Villa <span>(42)</span></a></li>
							<li><a href="#">Apartment <span>(14)</span></a></li>
							<li><a href="#">Condominium <span>(140)</span></a></li>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3>Recent Blog</h3>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3>Tag Cloud</h3>
						<div class="tagcloud">
							<a href="#" class="tag-cloud-link">dish</a>
							<a href="#" class="tag-cloud-link">menu</a>
							<a href="#" class="tag-cloud-link">food</a>
							<a href="#" class="tag-cloud-link">sweet</a>
							<a href="#" class="tag-cloud-link">tasty</a>
							<a href="#" class="tag-cloud-link">delicious</a>
							<a href="#" class="tag-cloud-link">desserts</a>
							<a href="#" class="tag-cloud-link">drinks</a>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3>Paragraph</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
					</div>
				</div> -->
			</div>
		</div>
	</section> <!-- .section -->

<?php }else{

	echo "No Property Details";
} ?>


<?php 
}else{
	header( "Location:property.php"); 
}
include("footer.php");?>
