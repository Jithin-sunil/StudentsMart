<?php

include("../Assets/Connection/Connection.php");

include("Head.php");

if(isset($_POST['btn_save']))
{
	$subcategory=$_POST["txt_sub"];
	$category=$_POST["sel_category"];
	$id=$_POST['txtid'];
	if($id=='')
	{
	$insqry="insert into tbl_subcategory(subcategory_name,category_id)values('".$_POST["txt_sub"]."','".$_POST["sel_category"]."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('Inserted');
		window.location="Subcategory.php";
        </script>
        <?php
	}
	}
	else
	{
		$upqry="update tbl_subcategory set subcategory_name='".$subcategory."',category_id='".$category."' where subcategory_id='".$id."'";
		if($con->query($upqry))
		{
			?>
            <script>
			alert('Updated');
			window.location="Subcategory.php";
			</script>
            <?php
		}
	}
}

if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_subcategory where subcategory_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert('Deleted');
		window.location="Subcategory.php";
        </script>
        <?php
	}
}

$did=$dis="";
if(isset($_GET['eid']))
{
	$selQry="Select * from tbl_subcategory where subcategory_id='".$_GET['eid']."'";
	$datadis=$con->query($selQry);
	$rowdis=$datadis->fetch_assoc();
	$dis=$rowdis['subcategory_name'];
	$did=$rowdis['subcategory_id'];
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
  <table width="318" border="1">
    <tr>
      <td width="162"><div align="center">Category</div></td>
      <td width="144"><label for="sel_category"></label>
        <select name="sel_category" id="sel_category">
        <option>--Select--</option>
          <?php
				$sel="select * from tbl_category";
				$row=$con->query($sel);
				while($data=$row->fetch_assoc())
					{
		?>
      
        <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?></option>
        
        <?php
					}
		
		?>
      </select>
      </td>
    </tr>
    <tr>
      <td><div align="center">Subcategory</div></td>
      <td><label for="txt_sub"></label>
      <input type="text" name="txt_sub" id="txt_sub"  value="<?php echo $dis ?>" />
        <input type="hidden" name="txtid" value="<?php echo $did ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <table width="329" border="1">
    <tr>
      <td width="29"><div align="center">SNo</div></td>
      <td width="61"><div align="center">Category</div></td>
      <td width="93"><div align="center">Subcategory</div></td>
      <td width="118"><div align="center">Action</div></td>
    </tr>
        <?php
	$i=0;
	$sel="select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>

    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['category_name']?></td>
      <td><?php echo $data['subcategory_name']?></td>
      <td><a href="Subcategory.php?delID=<?php echo $data['subcategory_id']?>">Delete</a>
       <a href="Subcategory.php?eid=<?php echo $data['subcategory_id']?>">Edit</a></td></td>
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