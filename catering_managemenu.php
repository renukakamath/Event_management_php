<?php include 'catering_teamheader.php' ;

   $cid=$_SESSION['cater_id'];
   extract($_GET);


if (isset($_POST['food'])) {
	extract($_POST);
	$r="select * from menu  where menu_name='$pla'";
	$re=select($r);
	if (sizeof($re)>0) {
		alert('already exist');
	}else{



$dir = "images/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 
	echo$q="insert into menu values(null,'$fid','$pla','$description','$quantity','$price','$target')";
	insert($q);
	alert('  Successfully');
  return redirect('catering_managefood.php');


 } else
		{
			echo "file uploading error occured";
		}


}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete  from menu  where menu_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('catering_managefood.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select *  from menu  where menu_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);


	$dir = "images/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
	echo$q="update menu set menu_name='$pla',description='$description',quantity='$quantity',image='$target' where menu_id='$uid'";
	update($q);





 } else
		{
			echo "file uploading error occured";
		}




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
	<h1>Manage Menu</h1>
	<form  method="post"   enctype="multipart/form-data">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			
			<tr>
				<th>Menu Name</th>
				<td style=""><input type="text" name="pla" required="" style="color: white" class="form-control" value="<?php echo $res[0]['menu_name'] ?>"></td>
			</tr>


			<tr>
				<th>description</th>
				<td style=""><input type="text" name="description" required="" style="color: white" class="form-control" value="<?php echo $res[0]['description'] ?>"></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td style=""><input type="text" name="quantity" required="" style="color: white" class="form-control" value="<?php echo $res[0]['quantity'] ?>"></td>
			</tr>
			<tr>
				<th>pricee</th>
				<td style=""><input type="text" name="price" required="" style="color: white" class="form-control" value="<?php echo $res[0]['menu_name'] ?>"></td>
			</tr>

			<tr>
				<th>Image</th>
				<td style=""><input type="file" required="" style="color: white" class="form-control" name="imgg"></td>
			</tr>
			
			<tr>
				<th align="center"colspan="2"><input type="submit" name="update"  class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			
			<tr>
				<th>Menu Name</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="pla"></td>
			</tr>

			<tr>
				<th>description</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="description"></td>
			</tr>
			<tr>
				<th>quantity</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="quantity"></td>
			</tr>
			<tr>
				<th>price</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="price"></td>
			</tr>


			<tr>
				<th>Image</th>
				<td style=""><input type="file" required="" style="color: white" class="form-control" name="imgg"></td>
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
	<h1>View Menu</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Menu Name</th>
			<th>description</th>
			<th>quantity</th>
			<th>price</th>
			<th></th>
			
		</tr>
		<?php 
         $q="select * from menu  where food_id='$fid' ";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		
         		<td><?php echo $row['menu_name'] ?></td>
         		<td><?php echo $row['description'] ?></td>
         		<td><?php echo $row['quantity'] ?></td>
         		<td><?php echo $row['price'] ?></td>
         		<td><img src="<?php echo $row['image'] ?>" width="100" height="100"></td>
         		
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['menu_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['menu_id'] ?>">delete</a></td>

         	
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
