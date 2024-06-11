<?php include 'adminheader.php' ;




if (isset($_POST['category'])) {
	extract($_POST);

	$q="insert into eventpackages values(null,'$cat','$food','$tit','$amo','$dis')";
	insert($q);
	alert('  Successfully');
  return redirect('admin_managepackages.php');

}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from eventpackages where package_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('admin_managepackages.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from eventpackages inner join eventcategory using (category_id) inner join food_category using (food_id) where package_id='$uid'";
	$res1=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update eventpackages set category_id='$cat',food_id='$food',package_title='$tit',package_amount='$amo',package_description='$dis' where package_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('admin_managepackages.php');

}



?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
<center>
	<h1>Manage Packages</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
		<tr>
				<th>category Name</th>
				<td ><select name="cat" class="form-control"  style="color: black">
					<option value="<?php echo $res1[0]['category_id'] ?>"><?php echo $res1[0]['category_name'] ?></option>
					<option>Select</option>
					<?php 
                    $q="select * from eventcategory";
                    $res=select($q);
                    foreach ($res as $row) {?>
                    	<option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                   <?php  }



					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Food</th>
				<td>
					<select name="food" class="form-control"  style="color: black">
							<option value="<?php echo $res1[0]['food_id'] ?>"><?php echo $res1[0]['food_category'] ?></option>
						<option>Select</option>
						<?php 
                      $q="select * from food_category";
                       $res=select($q);
                       foreach ($res as $key) {?>
                       <option value="<?php echo $key['food_id'] ?>"><?php echo $key['food_category'] ?></option>
                      <?php 
                       }



						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<th> Title</th>
				<td style=""><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res1[0]['package_title'] ?>" name="tit"></td>
			</tr>
			<tr>
				<th> Amount</th>
				<td style=""><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res1[0]['package_amount'] ?>"  name="amo"></td>
			</tr>
			<tr>
				<th> Description</th>
				<td style=""><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res1[0]['package_description'] ?>"  name="dis"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>category Name</th>
				<td style=""><select name="cat" class="form-control"  style="color: black">
					<option>Select</option>
					<?php 
                    $q="select * from eventcategory";
                    $res=select($q);
                    foreach ($res as $row) {?>
                    	<option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                   <?php  }



					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Food</th>
				<td>
					<select name="food"  class="form-control"  style="color: black">
						<option>Select</option>
						<?php 
                      $q="select * from food_category";
                       $res=select($q);
                       foreach ($res as $key) {?>
                       <option value="<?php echo $key['food_id'] ?>"><?php echo $key['food_category'] ?></option>
                      <?php 
                       }



						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<th> Title</th>
				<td style=""><input type="text" required=""  style="color: white" class="form-control" name="tit"></td>
			</tr>
			<tr>
				<th> Amount</th>
				<td style=""><input type="text" required=""  style="color: white" class="form-control" name="amo"></td>
			</tr>
			<tr>
				<th> Description</th>
				<td style=""><input type="text" required=""  style="color: white" class="form-control" name="dis"></td>
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
	<h1>View Packages</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>category Name</th>
			<th>Food</th>
		
			<th>Title</th>
			<th>Amount</th>
			<th>Description</th>
		</tr>
		<?php 
         $q="select * from eventpackages inner join eventcategory using (category_id) inner join food_category using (food_id)";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['category_name'] ?></td>
         		<td><?php echo $row['food_category'] ?></td>
         		
         		<td><?php echo $row['package_title'] ?></td>
         		<td><?php echo $row['package_amount'] ?></td>
         		<td><?php echo $row['package_description'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['package_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['package_id'] ?>">delete</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
