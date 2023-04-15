<?php
include("conn.php");

$data=$_GET['id'];

$fetch="select * from tbl_district where State_ID='$data'";
$q=@mysqli_query($conn,$fetch);
$c=@mysqli_num_rows($q);  
// echo'<select class="form-control  select2" name="district_id" id="district_id" placeholder="Select Your Choice " onchange="return city_data(this.value);" >';
if($c>0)
{
	echo "<option value=''>Select District</option>";
	while($r=@mysqli_fetch_array($q))
	{               
		echo '<option value="'.$r["District_ID"].'">'.$r["District_Name"].'</option>';
	}
}
else
{
	echo"<option value=''> No District..</option>";
}

// echo "</select>";

?>