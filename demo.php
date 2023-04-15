<?php include("header.php");
// Merchant key here as provided by Payu
$MERCHANT_KEY = "rjQUPktU";

// Merchant Salt as provided by Payu
$SALT = "e5iIg1jwi8";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 

  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence

$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
    empty($posted['key'])
    || empty($posted['txnid'])
    || empty($posted['amount'])
    || empty($posted['firstname'])
    || empty($posted['email'])
    || empty($posted['phone'])
    || empty($posted['productinfo'])
    || empty($posted['surl'])
    || empty($posted['furl'])
    || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
   $hashVarsSeq = explode('|', $hashSequence);
   $hash_string = '';	
   foreach($hashVarsSeq as $hash_var) {
    $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
    $hash_string .= '|';
  }

  $hash_string .= $SALT;


  $hash = strtolower(hash('sha512', $hash_string));
  $action = $PAYU_BASE_URL . '/_payment';
}
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<script src="js/validation-service.js" ></script>
<script>
  var hash = '<?php echo $hash ?>';
  function submitPayuForm() {
    if(hash == '') {
      return;
    }
    var payuForm = document.forms.payuForm;
    payuForm.submit();
  }
</script>
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
<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-6 offset-md-3 order-md-last d-flex">
        <body onload="submitPayuForm()">
          <?php if($formError) { ?>
            <span style="color:red">Please fill all mandatory fields.</span>
            <br/>
            <br/>
          <?php } ?>
          <form class="bg-white p-5 contact-form" action="<?php echo $action; ?>" method="post" name="payuForm" onsubmit="return required_data();" >
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
            <div class="form-group">
              <input type="text" name="firstname" id="User_FName" class="form-control" placeholder="First Name" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>">
            </div>
            <div class="form-group">
              <input type="text" name="lastname" id="User_LName" class="form-control" placeholder="Last Name" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>">
            </div>
            <div class="form-group">
              Male <input type="radio" name="udf2" value="Male" checked=""> Female <input type="radio" name="udf2" value="Female" <?php echo (empty($posted['udf2'])) ? '' : ($posted['udf2']=='Female'?'checked':''); ?>>
            </div>

            <div class="form-group">
              <input type="text" name="email" id="Email" class="form-control" placeholder="Email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>">
              <input type="hidden" name="surl" value="http://localhost/liveworkstudent/service-provider.php?s=1" />
              <input type="hidden" name="furl" value="http://localhost/liveworkstudent/service-provider.php?s=0" />
              <input type="hidden" name="curl" value="http://localhost/liveworkstudent/service-provider.php?s=2" />
              <input type="hidden" name="service_provider" value="payu_paisa" size="64" />

              <input type="hidden" name="udf1" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf2" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf3" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf4" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf5" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf6" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf7" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf8" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf9" id="Password" class="form-control" placeholder="Password" value="1">
              <input type="hidden" name="udf10" id="Password" class="form-control" placeholder="Password" value="1">
            </div>
            <div class="form-group">
              <input type="password" name="udf3" id="Password" class="form-control" placeholder="Password" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>">
            </div>
            <div class="form-group">
              <input type="text" name="phone" id="Mobile" class="form-control" placeholder="Mobile Number" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" >
            </div>
            <div class="form-group">
              <select name="udf4" id="Service_ID" class="form-control">
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
              <select name="udf5" id="State_ID" class="form-control" onchange="return dist_data(this.value);">
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
              <select name="udf6" id="District_ID" class="form-control" onchange="return city_data(this.value);" >
                <option value="">Select District</option>
              </select>
            </div>
            <div class="form-group">
              <select name="udf7" id="City_ID" class="form-control" onchange="return area_data(this.value);" >
                <option value="">Select City</option>
              </select>
            </div>
            <div class="form-group">
              <select name="udf8" id="Area_ID" class="form-control" >
                <option value="">Select Area</option>
              </select>
            </div>
            <div class="form-group">
              <textarea name="address1" id="Address" class="form-control" placeholder="Address"></textarea>
            </div>

            <div class="form-group">
              <select name="udf1" id="Package_ID" class="form-control" onchange="return package_data(this.value);">
                <option value="">Select Package</option>
                <?php
                $select_waste_types="select * from tbl_package";
                $result_user = @mysqli_query($conn, $select_waste_types);
                while($fh_user= @mysqli_fetch_array($result_user))
                { 
                  echo "<option value='".$fh_user['Package_ID']."'  >". $fh_user['Package_Name']."</option>";
                } ?>
              </select>
              <input name="amount" type="hidden" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
              <input name="productinfo" type="hidden" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" />
            </div>
            <div class="form-group" id="Package_data">

            </div>
            <?php if(!$hash) { ?>
              <input type="submit" value="Register" name="submit" class="btn btn-primary py-3 px-5" />
            <?php } ?>

          </form>
        </body>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2>Subcribe to our Newsletter</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
              <form action="#" class="subscribe-form">
                <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
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
  function package_data(val)
  {
    $.ajax({
      type:"GET",
      url:"get_package.php",
      data:{id:val},
      success:function(result){
        $("#Package_data").html(result);
      }

    });
  }
</script>