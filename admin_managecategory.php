<?php include 'adminheader.php' ;




if (isset($_POST['category'])) {
	extract($_POST);
	$r="select * from eventcategory where category_name='$pla'";
	$re=select($r);
	if (sizeof($re)>0) {
		alert('already exist');
	}else{
	$q="insert into eventcategory values(null,'$pla')";
	insert($q);
	alert('  Successfully');
  return redirect('admin_managecategory.php');
}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from eventcategory where category_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('admin_managecategory.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from eventcategory where category_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update eventcategory set category_name='$pla' where category_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('admin_managecategory.php');

}



?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
<center>
	<h1 >Manage category</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>category Name</th>
				<td style="color: black"><input type="text" name="pla" required="" style="color: white" class="form-control" value="<?php echo $res[0]['category_name'] ?>"></td>
			</tr>
			<tr>
				<th align="center"colspan="2"><input type="submit" name="update"  class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>category Name</th>
				<td style="color: black"><input type="text" required="" style="color: white" class="form-control" name="pla"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="category" value="submit" class="btn btn-success"></th>
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
	<h1>View category</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>category Name</th>
		</tr>
		<?php 
         $q="select * from eventcategory";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['category_name'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['category_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['category_id'] ?>">delete</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
