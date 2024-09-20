fr<?php
include("../Assets/Connection/Connection.php");

include("Head.php");




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
      <th scope="row"><div align="center">#</div></th>
      <td><div align="center">User</div></td>
      <td><div align="center">Title</div></td>
      <td><div align="center">Content</div></td>
      <td><div align="center">Date</div></td>
      <td><div align="center">Reply</div></td>
    </tr>
    <?php
	$i=0;
	$selQry="Select * from tbl_complaint c inner join tbl_newuser u on c.user_id=u.user_id" ;
$row=$con->query($selQry);

	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $data['user_name']?></td>
      <td><?php echo $data['complaint_title']?></td>
      <td><?php echo $data['complaint_content']?></td>
      <td><?php echo $data['complaint_date']?></td>
      <td><?php echo $data['complaint_reply']?></td>
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