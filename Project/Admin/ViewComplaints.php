<?php
include("../Assets/Connection/Connection.php");

include("Head.php");


if(isset($_GET["rcID"]))
{
	$upQry="update tbl_complaint set complaint_status='2' where complaint_id='".$_GET["rcID"]."'";
	if($con->query($upQry))
	{
		?>
		<script>
		alert('Replied');
		window.location="ViewComplaints.php";
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
<td><a href="HomePage.php">Home</a></td>

  <table width="200" border="1">
    <tr>
      <th scope="row"><div align="center">#</div></th>
      <td><div align="center">User</div></td>
      <td><div align="center">Title</div></td>
      <td><div align="center">Content</div></td>
      <td><div align="center">Date</div></td>
      <td><div align="center">Action</div></td>
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
      <td><a href="Reply.php?repID=<?php echo $data['complaint_id']?>">Reply</a><?php
      if($data['complaint_status']==1)
	  {
		 //echo "Complaint Unreplied";
	  }
	  else if($data['complaint_status']==2)
	  {
		 //echo "Complaint Replied";
		  ?>
         <a href="ViewComplaints.php?rcID=<?php echo $data['complaint_id']?>"></a>
         <?php
		 
	  }
	  ?></td>
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