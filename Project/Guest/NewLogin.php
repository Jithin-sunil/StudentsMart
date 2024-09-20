<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_login"]))
{
	$Email=$_POST["txt_email"];
	$Password=$_POST["txt_password"];
	
	
	$selQry="Select * from tbl_newuser where user_email='".$Email."' and user_password='".$Password."'";
	$row=$con->query($selQry);
	
	$selQry1="Select * from tbl_admin where admin_email='".$Email."' and admin_password='".$Password."'";
	$row1=$con->query($selQry1);
	
	$selQry2="Select * from tbl_seller where seller_email='".$Email."' and seller_password='".$Password."'";
	$row2=$con->query($selQry2);
	
	if($data=$row->fetch_assoc())
	{
		$_SESSION['uid']=$data['user_id'];
		$_SESSION['uname']=$data['user_name'];
		header("location:../User/HomePage.php");
	}
	else if($data1=$row1->fetch_assoc())
	{
		$_SESSION['aid']=$data1['admin_id'];
		$_SESSION['aname']=$data1['admin_name'];
		header("location:../Admin/HomePage.php");
	}
	else if($data2=$row2->fetch_assoc())
	{
		$_SESSION['sid']=$data2['seller_id'];
		$_SESSION['sname']=$data2['seller_name'];
		header("location:../Seller/HomePage.php");
	}
	else
	{
		echo "Invalid Login";
	}
}
?>	


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Assets/Template/Admin/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../Assets/Template/Admin/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../Assets/Template/Admin/template/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form id="form1" name="form1" method="post" action="">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" name="txt_email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text"  name="txt_password" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="btn_login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <!-- <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> -->
                  <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../Assets/Template/Admin/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../Assets/Template/Admin/template/assets/js/off-canvas.js"></script>
    <script src="../Assets/Template/Admin/template/assets/js/hoverable-collapse.js"></script>
    <script src="../Assets/Template/Admin/template/assets/js/misc.js"></script>
    <script src="../Assets/Template/Admin/template/assets/js/settings.js"></script>
    <script src="../Assets/Template/Admin/template/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>