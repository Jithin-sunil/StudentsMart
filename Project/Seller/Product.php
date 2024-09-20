<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$Name=$_POST["txt_name"];
	$Price=$_POST["txt_price"];
	$Photo=$_FILES["file_photo"]['name'];
	$Category=$_POST["sel_category"];
	$Subcategory=$_POST["sel_sub"];
	$temp=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($temp,'../Assets/Files/Seller/Product/'.$Photo);

	$insqry="insert into tbl_product(product_name,product_price,product_photo,subcategory_id,seller_id)values('".$Name."','".$Price."','".$Photo."','".$Subcategory."','".$_SESSION['sid']."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('inserted');
		window.location="Product.php";
        </script>
          <?php
		}
	}

if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_product where product_id='".$_GET["delID"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert('Deleted');
		window.location="Product.php";
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<td><a href="HomePage.php">Home</a></td>
  <table width="508" border="1">
    <tr>
      <td width="76">Name</td>
      <td width="418"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"  /></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price"  /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo"></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="sel_category"></label>
        <div align="center">
          <select name="sel_category" id="sel_category" onChange="getSubcategory(this.value)">
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
      </div></td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="sel_sub"></label>
        <div align="center">
          <select name="sel_sub" id="sel_sub">
          <option>--Select--</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <table width="357" border="1">
    <tr>
      <td width="17"><div align="center">#</div></td>
      <td width="37"><div align="center">Name</div></td>
      <td width="31"><div align="center">Price</div></td>
      <td width="36"><div align="center">Photo</div></td>
      <td width="56"><div align="center">Category</div></td>
      <td width="76"><div align="center">Subcategory</div></td>
      <td width="52"><div align="center">Action</div></td>
    </tr>
    
    <?php
	$i=0;
	$sel="select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on  c.category_id=s.category_id";
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['product_name']?></td>
      <td><?php echo $data['product_price']?></td>
      <td><img src="../Assets/Files/Seller/Product/<?php echo $data['product_photo']?>" width="75" height="75" /></td>
      <td><?php echo $data['category_name']?></td>
      <td><?php echo $data['subcategory_name']?></td>
      <td><a href="Product.php?delID=<?php echo $data['product_id']?>">Delete</a> <br /> <br />
      <a href="Stock.php?asID=<?php echo $data['product_id']?>">Add Stock</a>
      </td><td width="8"></td>
    </tr>
     <?php
	}
	?>
  </table>
</form>
</body>
</html>
 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubcategory(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubcategory.php?did=" + did,
      success: function (result) {

        $("#sel_sub").html(result);
      }
    });
  }

</script>
<?php
include('Foot.php');
?>