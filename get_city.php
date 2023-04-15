<?php
include("conn.php");


$data=$_GET['id'];

$fetch="select * from tbl_city where District_ID='$data'";


$q=@mysqli_query($conn,$fetch);
$c=@mysqli_num_rows($q);  
// echo'<select class="form-control  select2" name="city_id" id="city_id" placeholder="Select Your Choice " onchange="return area_data(this.value);" >';
if($c>0)
{
    echo "<option value=''>Select City</option>";
    while($r=@mysqli_fetch_array($q))
    {               
        echo '<option value="'.$r["City_ID"].'">'.$r["City_Name"].'</option>';
    }
}
else
{
    echo"<option value=''> No City..</option>";
}

// echo "</select>";

?>