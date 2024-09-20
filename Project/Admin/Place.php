<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$place=$_POST["txt_place"];
	$id=$_POST['txtid'];
	$pincode=$_POST['txt_pincode'];
	$district=$_POST["sel_district"];
	if($id=='')
	{
	$insqry="insert into tbl_place(place_name,place_pincode,district_id)values('".$_POST["txt_place"]."','".$_POST["txt_pincode"]."','".$_POST["sel_district"]."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('Inserted');
		window.location="Place.php";
        </script>
        <?php
	}
	}
	else
	{
		$upqry="update tbl_place set place_name='".$place."',place_pincode='".$pincode."',district_id='".$district."' where place_id='".$id."'";
		if($con->query($upqry))
		{
			?>
            <script>
			alert('Updated');
			window.location="Place.php";
			</script>
            <?php
		}
	}
}


if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert('Deleted');
		window.location="Place.php";
        </script>
        <?php
	}
}
$did=$dis=$dir="";
if(isset($_GET['eid']))
{
	$selQry="Select * from tbl_place where place_id='".$_GET['eid']."'";
	$datadis=$con->query($selQry);
	$rowdis=$datadis->fetch_assoc();
	$dis=$rowdis['place_name'];
	$did=$rowdis['place_id'];
	$dir=$rowdis['place_pincode'];
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
      <td height="31">District</td>
      <td><label for="sel_district"></label>
      
      
        <div align="center">
          <select name="sel_district" id="sel_district">
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
        </div>
      
      
      </td>
    </tr>
    <tr>
      <td width="170" height="31"><div align="center">Place Name</div></td>
      <td width="140"><p>
        <label for="txt_dist"></label>
        <label for="txt_dist3"></label>
        <input type="text" name="txt_place" id="txt_place"  value="<?php echo $dis ?>" />
        <input type="hidden" name="txtid" value="<?php echo $did ?>">
      </p></td>
    </tr>
    <tr>
      <td width="170" height="31"><div align="center">Pincode</div></td>
      <td width="140"><p>
        <label for="txt_dist"></label>
        <label for="txt_dist3"></label>
        <input type="text" name="txt_pincode" id="txt_pincode"  value="<?php echo $dir ?>" />
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
      <td width="80"><div align="center">Place</div></td>
      <td width="80"><div align="center">Pincode</div></td>
      <td width="84"><div align="center">Action</div></td>
    </tr>
    <?php
	$i=0;
	$sel="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i?></td>
       <td> <?php echo $data['district_name']?></td>
      <td> <?php echo $data['place_name']?></td>
      <td> <?php echo $data['place_pincode']?></td>
      <td><a href="Place.php?delID=<?php echo $data['place_id']?>">Delete</a>
      <a href="Place.php?eid=<?php echo $data['place_id']?>">Edit</a></td>
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