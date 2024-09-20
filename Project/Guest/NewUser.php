<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	
	$Place=$_POST["sel_place"];
	$Name=$_POST["txt_name"];
	$Gender=$_POST["radio"];
	$Address=$_POST["txt_address"];
	$Contact=$_POST["txt_contact"];
	$Email=$_POST["txt_email"];
	$Password=$_POST["txt_password"];
	$Photo=$_FILES["file_photo"]['name'];
	$temp=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($temp,'../Assets/Files/User/Photo/'.$Photo);
	$insqry="insert into tbl_newuser(place_id,user_name,user_gender,user_address,user_contact,user_email,user_password,user_photo,user_dateofjoin)values('".$Place."','".$Name."','".$Gender."','".$Address."','".$Contact."','".$Email."','".$Password."','".$Photo."',curdate())";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('inserted');
		window.location="NewUser.php";
        </script>
        <?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewUser</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td><div align="center">District</div></td>
      <td><label for="sel_dist"></label>
        <div align="center">
          <select name="sel_dist" id="sel_dist" onChange="getPlace(this.value)">
          <option>--Select--</option>
            <?php
				$sel="select * from tbl_district";
				$row=$con->query($sel);
				while($data=$row->fetch_assoc())
					{
		?>
            
            <option value="<?php echo $data['district_id']?>"><?php echo $data['district_name']?></option>
            
            <?php
					}
		
		?>
          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Place</div></td>
      <td><label for="sel_place"></label>
        <div align="center">
          <select name="sel_place" id="sel_place">
           
		<option>--Select--</option>
		
          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Name</div></td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td><div align="center">Gender</div></td>
      <td><div align="center">
        <input type="radio" name="radio" id="rd_male" value="male" />
           Male 
           <input type="radio" name="radio" id="rd_female" value="female" />
           Female
           <label for="rd_female"></label>
      </div></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><div align="center">Contact</div></td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td><div align="center">Email</div></td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td><div align="center">Password</div></td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td><div align="center">Confirm Password</div></td>
      <td><label for="txt_confirmpassword"></label>
      <input type="password" name="txt_confirmpassword" id="txt_confirmpassword" /></td>
    </tr>
    <tr>
      <td><div align="center">Photo</div></td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>

 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

</script>