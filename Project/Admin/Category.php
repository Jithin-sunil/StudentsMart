<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$category=$_POST["txt_cat"];
	$id=$_POST['txtid'];
	if($id=='')
	{
	$insqry="insert into tbl_category(category_name)values('".$category."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('Inserted');
		window.location="Category.php";
        </script>
        <?php
	}
	}
	else
	{
		$upqry="update tbl_category set category_name='".$category."' where category_id='".$id."'";
		if($con->query($upqry))
		{
			?>
            <script>
			alert('Updated');
			window.location="Category.php";
			</script>
            <?php
		}
	}
}

if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_category where category_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert('Deleted');
		window.location="Category.php";
        </script>
        <?php
	}
}
$did=$dis="";
if(isset($_GET['eid']))
{
	$selQry="Select * from tbl_category where category_id='".$_GET['eid']."'";
	$datadis=$con->query($selQry);
	$rowdis=$datadis->fetch_assoc();
	$dis=$rowdis['category_name'];
	$did=$rowdis['category_id'];
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
  <table width="230" border="1">
    <tr>
      <td width="103"><div align="center">Category</div></td>
      <td width="111"><label for="txt_cat"></label>
      <input type="text" name="txt_cat" id="txt_cat"  value="<?php echo $dis ?>" />
        <input type="hidden" name="txtid" value="<?php echo $did ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <table width="231" border="1">
    <tr>
      <td width="53"><div align="center">#</div></td>
      <td width="85"><div align="center">Category</div></td>
      <td width="71"><div align="center">Action</div></td>
    </tr>
	<?php
	$i=0;
	$sel="select * from tbl_category";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
  
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['category_name'] ?></td>
      <td><a href="Category.php?delID=<?php echo $data['category_id']?>">Delete</a>
       <a href="Category.php?eid=<?php echo $data['category_id']?>">Edit</a></td>
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