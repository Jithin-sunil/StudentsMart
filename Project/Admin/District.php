<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$district=$_POST["txt_dist"];
	$id=$_POST['txtid'];
	if($id=='')
	{
	$insqry="insert into tbl_district(district_name)values('".$district."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('Inserted');
		window.location="District.php";
        </script>
        <?php
	}
	}
	else
	{
		$upqry="update tbl_district set district_name='".$district."' where district_id='".$id."'";
		if($con->query($upqry))
		{
			?>
            <script>
			alert('Updated');
			window.location="District.php";
			</script>
            <?php
		}
	}
}


if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_district where district_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert('Deleted');
		window.location="District.php";
        </script>
        <?php
	}
}
$did=$dis="";
if(isset($_GET['eid']))
{
	$selQry="Select * from tbl_district where district_id='".$_GET['eid']."'";
	$datadis=$con->query($selQry);
	$rowdis=$datadis->fetch_assoc();
	$dis=$rowdis['district_name'];
	$did=$rowdis['district_id'];
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
  <table width="326" border="1">
    <tr>
      <td width="170" height="31"><div align="center">District Name</div></td>
      <td width="140"><p>
        <label for="txt_dist"></label>
        <label for="txt_dist3"></label>
        <input type="text" name="txt_dist" id="txt_dist3" value="<?php echo $dis ?>" />
        <input type="hidden" name="txtid" value="<?php echo $did ?>">
      </p></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <table width="244" border="1">
    <tr>
      <td width="58"><div align="center">#</div></td>
      <td width="80"><div align="center">District</div></td>
      <td width="84"><div align="center">Action</div></td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_district";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i?></td>
      <td> <?php echo $data['district_name']?></td>
      <td><a href="District.php?delID=<?php echo $data['district_id']?>">Delete</a>
      <a href="District.php?eid=<?php echo $data['district_id']?>">Edit</a></td>
    </tr>
     <?php
	}
	?>
   
  </table>

</form>
</body>
</html>
<?php
include("Foot.php");
?>