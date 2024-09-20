<?php
include("../Assets/Connection/Connection.php");
include('Head.php');

if(isset($_POST["btn_submit"]))
{
	$Title=$_POST["txt_title"];
	$Content=$_POST["txt_content"];
	
	 $insqry="insert into tbl_complaint(complaint_title,complaint_content,user_id,complaint_date,product_id)values('".$Title."','".$Content."','".$_SESSION['uid']."',curdate(), '".$_GET["cid"]."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('Complained');
		window.location="MyComplaints.php";
        </script>
        <?php
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
      <th scope="row"><div align="center">Title</div></th>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title"></td>
    </tr>
    <tr>
      <th scope="row"><div align="center">Content</div></th>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></th>
    </tr>
  </table>
 
</form>
</body>
</html>
<?php
include('Foot.php');
?>