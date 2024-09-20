<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$stock=$_POST["txt_stockquantity"];
	$Product=$_GET["asID"];
	
	$insqry="insert into tbl_stock(stock_quantity,stock_date,product_id)values('".$stock."',curdate(),'".$Product."')";
	if($con->query($insqry))
	{
		?>
		<script>
		alert('inserted');
		//window.location="Stock.php";
        </script>
        <?php
	}
}
	if(isset($_GET["delID"]))
{
	$delQry="delete from tbl_stock where stock_id='".$_GET["delID"]."'";
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <th scope="row"><div align="center">Stock Quantity</div></th>
      <td><label for="txt_stockquantity"></label>
      <input type="text" name="txt_stockquantity" id="txt_stockquantity" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></th>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <th scope="row"><div align="center">#</div></th>
      <td><div align="center">Quantity</div></td>
      <td><div align="center">Date</div></td>
      <td><div align="center">Action</div></td>
    </tr>
     <?php
	$i=0;
	$sel="select * from tbl_stock where product_id=".$_GET["asID"];
	$row=$con->query($sel);
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $data['stock_quantity']?></td>
      <td><?php echo $data['stock_date']?></td>
      <td><a href="Stock.php?delID=<?php echo $data['stock_id']?>">Delete</a>  </td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>