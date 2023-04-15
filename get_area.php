<?php
include("conn.php");


$data=$_GET['id'];

$fetch="select * from tbl_area where City_ID='$data'";


$q=@mysqli_query($conn,$fetch);
$c=@mysqli_num_rows($q);  
        // echo'<select class="form-control  select2" name="area_id" id="area_id" placeholder="Select Your Choice " >';
if($c>0)
{
    echo "<option value=''>Select Area</option>";
    while($r=@mysqli_fetch_array($q))
    {               
        echo '<option value="'.$r["Area_ID"].'">'.$r["Area_Name"].'</option>';
    }
}
else
{
    echo"<option value=''> No Area..</option>";
}

// echo "</select>";

?>