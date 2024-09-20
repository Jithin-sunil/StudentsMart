<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
$selQry="Select * from tbl_seller where seller_id='".$_SESSION['sid']."'";
$row=$con->query($selQry);
$data=$row->fetch_assoc()
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<td><a href="HomePage.php">Home</a></td>
  <table width="200" border="1">
    <tr>
      <th colspan="2" scope="col"><img src="../Assets/Files/Seller/Photo/<?php echo $data['seller_photo'] ?>" width="150px" height="100px" /></th>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data['seller_name'] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['seller_email'] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['seller_address'] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['seller_contact'] ?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><a href="EditProfile.php">Edit Profile</a><br />
      <a href="ChangePassword.php">Change Password</a></div></td>

    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>