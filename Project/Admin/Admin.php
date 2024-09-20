<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$admin_name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	$id=$_POST['txtid'];
	if($id=='')
	{
	$insqry="insert into tbl_admin(admin_name,admin_email,admin_password)values('".$admin_name."','".$email."','".$password."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('Registered');
		window.location="Admin.php";
        </script>
        <?php
		}
	}
	else
	{
		$upqry="update tbl_admin set admin_name='".$admin_name."',admin_email='".$email."',admin_password='".$password."' where admin_id='".$id."'";
		if($con->query($upqry))
		{
			?>
            <script>
			alert('Updated');
			window.location="Admin.php";
			</script>
            <?php
		}
	}
}
if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_admin where admin_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert('Deleted');
		window.location="Admin.php";
        </script>
        <?php
	}
}
$did=$dis=$dir=$dij="";
if(isset($_GET['eid']))
{
	$selQry="Select * from tbl_admin where admin_id='".$_GET['eid']."'";
	$datadis=$con->query($selQry);
	$rowdis=$datadis->fetch_assoc();
	$dis=$rowdis['admin_name'];
	$dir=$rowdis['admin_email'];
	$dij=$rowdis['admin_password'];
	$did=$rowdis['admin_id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<td><a href="HomePage.php">Home</a></td>
<form id="form1" name="form1" method="post" action="">

  <div align="center">
    <table width="296" border="1">  
      <tr>
        <td width="140"><p align="center">Name</p></td>
        <td width="140"><label for="txt_name"></label>
          <input type="text" name="txt_name" id="txt_name" value="<?php echo $dis ?>" />
         <input type="hidden" name="txtid" value="<?php echo $did ?>"></td>
      </tr>
      <tr>
        <td><div align="center">Email</div></td>
        <td><label for="txt_email"></label>
          <input type="text" name="txt_email" id="txt_email" value="<?php echo $dir ?>" />
        </td>
      </tr>
      <tr>
        <td><div align="center">Password</div></td>
        <td><label for="txt_password"></label>
          <input type="password" name="txt_password" id="txt_password" value="<?php echo $dij ?>" />
        </td>
      </tr>
      <tr>
        <td align='center' colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btncancel" id="btncancel" value="cancel" /></td>
      </tr>
    </table>
  </div>
  <table width="416" border="1">
    <tr>
      <td width="37" height="25"><div align="center">#</div></td>
      <td width="68"><div align="center">Name</div></td>
      <td width="77"><div align="center">Email</div></td>
      <td width="106"><div align="center">Password</div></td>
      <td width="94"><div align="center">Action</div></td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_admin";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
       
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data ['admin_name']?></td>
      <td><?php echo $data ['admin_email']?></td>
      <td><?php echo $data ['admin_password']?></td>
      <td><a href="Admin.php?delID=<?php echo $data['admin_id']?>">Delete</a>
      <a href="Admin.php?eid=<?php echo $data['admin_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>