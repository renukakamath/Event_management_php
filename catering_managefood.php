<?php include 'catering_teamheader.php' ;

  echo $cid=$_SESSION['cater_id'];


if (isset($_POST['food'])) {
	extract($_POST);
	$r="select * from food_category  where food_name='$pla'";
	$re=select($r);
	if (sizeof($re)>0) {
		alert('already exist');
	}else{
	$q="insert into food_category values(null,'$pla','$cid')";
	insert($q);
	alert('  Successfully');
  return redirect('catering_managefood.php');
}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete  from food_category  where food_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('catering_managefood.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select *  from food_category  where food_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	echo$q="update food_category set food_category='$pla' where food_id='$uid'";
	update($q);

	alert('  Successfully');
  return redirect('catering_managefood.php');

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
	<h1>Manage food</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			
			<tr>
				<th>food Name</th>
				<td style=""><input type="text" name="pla" required="" style="color: white" class="form-control" value="<?php echo $res[0]['food_category'] ?>"></td>
			</tr>
			
			<tr>
				<th align="center"colspan="2"><input type="submit" name="update"  class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			
			<tr>
				<th>food Name</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="pla"></td>
			</tr>
			
			<tr>
				<th align="center" colspan="2"><input type="submit" name="food" value="submit" class="btn btn-success"></th>
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
	<h1>View food</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Food Type</th>
			
		</tr>
		<?php 
         $q="select * from food_category  where cater_id='$cid' ";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		
         		<td><?php echo $row['food_category'] ?></td>
         		
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['food_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['food_id'] ?>">delete</a></td>

         		<td><a class="btn btn-success" href="catering_managemenu.php?fid=<?php echo $row['food_id'] ?>">Manage menu</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
