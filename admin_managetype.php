<?php include 'adminheader.php' ;


if (isset($_POST['type'])) {
	extract($_POST);
	$r="select * from type where type_name='$pla'";
	$re=select($r);
	if (sizeof($re)>0) {
		alert('already exist');
	}else{
	$q="insert into type values(null,'$pla')";
	insert($q);
	alert('  Successfully');
  return redirect('admin_managetype.php');
}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from type where type_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('admin_managetype.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from type where type_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update type set type_name='$pla' where type_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('admin_managetype.php');

}



?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_5.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
<center>
	<h1>Manage Food type</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>type Name</th>
				<td style=""><input type="text" name="pla" required="" style="color: white" class="form-control" value="<?php echo $res[0]['type_name'] ?>"></td>
			</tr>
			<tr>
			
			<tr>
				<th align="center"colspan="2"><input type="submit" name="update"  class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			
			<tr>
				<th>type Name</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="pla"></td>
			</tr>
			
			<tr>
				<th align="center" colspan="2"><input type="submit" name="type" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>

						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

 
<br><br><br>
<center>
	<h1>View Food type</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>type Name</th>
			
		</tr>
		<?php 
         $q="select * from type";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['type_name'] ?></td>
         		
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['type_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['type_id'] ?>">delete</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>