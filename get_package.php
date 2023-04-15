<?php
include("conn.php");

$data=$_GET['id'];

$fetch="select * from tbl_package where Package_ID='$data'";
$q=@mysqli_query($conn,$fetch);
$c=@mysqli_num_rows($q);  

if($r=@mysqli_fetch_array($q))
{               
	echo '<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
	<tr>
	<th colspan="3"><center>
	<h2>'.$r["Package_Name"].'</h2></center>
	</th>
	</tr>
	<tr>
	<th>Price</th>
	<th>Validity</th>
	<th>Description</th>
	</tr>
	<tr>
	<td>'.$r["Price"].'
	<input type="hidden" id="amount" name="amount" value="'.$r["Price"].'" />
	</td>
	<td>'.$r["Validity"].' Month</td>
	<td>'.$r["Description"].'
	<input type="hidden" id="productinfo" name="productinfo"  value="Package Name'.$r["Package_Name"].' : '.$r["Description"].'" />
	</td>
	</tr>
	</table>';
}else{
	echo "No Package Data";
}


?>