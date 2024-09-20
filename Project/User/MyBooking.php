<?php
include("../Assets/Connection/Connection.php");
include('Head.php');



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<td><a href="HomePage.php">Home</a></td>
  <table width="200" border="1">
    <tr>
      <th scope="row"><div align="center">#</div></th>
      <td><div align="center">Seller</div></td>
      <td><div align="center">Product</div></td>
      <td><div align="center">Price</div></td>
      <td><div align="center">Photo</div></td>
      <td><div align="center">Quantity</div></td>
     <!-- <td><div align="center">Total</div></td>-->
      <td><div align="center">Status</div></td>
    </tr>
     <?php
	$i=0;
	$selQry="select * from tbl_cart c inner join tbl_product p on c.product_id=p.product_id inner join tbl_seller s on  s.seller_id=p.seller_id inner join tbl_booking b on c.booking_id=b.booking_id where b.user_id='".$_SESSION['uid']."'" ;
$row=$con->query($selQry);

	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $data['seller_name']?></td>
      <td><?php echo $data['product_name']?></td>
      <td><?php echo $data['product_price']?></td>
      <td><img src="../Assets/Files/Seller/Product/<?php echo $data['product_photo']?>" width="75" height="75" /></td>
      <td><?php echo $data['cart_quantity']?></td>
      <!--<td><?php echo $data['booking_amount']?></td>-->
      <td>
      <?php
      if($data['booking_status']==1)
	  {
		 echo "Payment Incomplete";
	  }
	  else if($data['booking_status']==2)
	  {
		 echo "Payment Completed";
		 
		 
	  }
	  else if($data['booking_status']==3)
	  {
		 
		 echo "Packed";
		 
	  }
	  else if($data['booking_status']==4)
	  {
		 
		echo "Shipped";
		 
	  }
	  else if($data['booking_status']==5)
	  {
		 
		echo "Delivered";
		 
	  }
	  else if($data['booking_status']==6)
	  {
		 
		echo " Ordered Completed ";
		?>
          <a href="Rating.php?pid=<?php echo $data['product_id'] ?>">Rating</a> <br /> <br />
          <a href="Complaints.php?cid=<?php echo $data['product_id'] ?>">Complaints</a>
          <?php
		  
		 
	  }
	 
	  
	  ?> </td>
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