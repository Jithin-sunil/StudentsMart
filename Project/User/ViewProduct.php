<?php
include("../Assets/Connection/Connection.php");

session_start();


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="392" border="1">
    <tr>
      <th width="17" scope="row"><div align="center">#</div></th>
      <td width="48"><div align="center">Product</div></td>
      <td width="31"><div align="center">Price</div></td>
      <td width="36"><div align="center">Photo</div></td>
      <td width="56"><div align="center">Category</div></td>
      <td width="76"><div align="center">Subcategory</div></td>
      <td width="82"><div align="center">Action</div></td>
    </tr>
    <?php
	$i=0;
	$selQry="Select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on  c.category_id=s.category_id" ;
$row=$con->query($selQry);

	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $data['product_name']?></td>
      <td><?php echo $data['product_price']?></td>
      <td><img src="../Assets/Files/Seller/Product/<?php echo $data['product_photo']?>" width="75" height="75" /></td>
      <td><?php echo $data['category_name']?></td>
      <td><?php echo $data['subcategory_name']?></td>
      <td><a href="MYCart.php">Add to Cart</a></td>
    </tr>
      <?php
	}
	?>
  </table>
</form>
</body>
</html>