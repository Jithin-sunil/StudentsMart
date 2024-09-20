<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
session_start();
$selQry="Select * from tbl_newuser where user_id='".$_SESSION['uid']."'";
	$row=$con->query($selQry);
	$data=$row->fetch_assoc();
	$data_dbpassword=$data['user_password'];
if(isset($_POST["btn_changepassword"]))
{
	$OldPassword=$_POST['txt_oldpassword'];
	$NewPassword=$_POST['txt_newpassword'];
	$RetypePassword=$_POST['txt_retypepassword'];
	if($data_dbpassword==$OldPassword)
	{
		$upqry="update tbl_newuser set user_password='".$NewPassword."' where user_id='".$_SESSION['uid']."'";
		if($NewPassword==$RetypePassword)
		if($con->query($upqry))
		{
			?>
            <script>
			alert('Updated');
			window.location="ChangePassword.php";
			</script>
            <?php
		}
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_oldpassword"></label>
      <input type="text" name="txt_oldpassword" id="txt_oldpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Re-Type Password</td>
      <td><label for="txt_retypepassword"></label>
      <input type="text" name="txt_retypepassword" id="txt_retypepassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_changepassword" id="btn_changepassword" value="Change Password" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>