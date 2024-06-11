<?php include 'light_sound_header.php';


  $lid=$_SESSION['light_sound_id'];
extract($_GET);





 	 $q="select * from lightandsound where light_sound_id='$lid'";
 	$res=select($q);



 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update lightandsound set light_sound_name='$fname' ,place='$place',phone='$num',email='$email' where light_sound_id='$lid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('light_soundprofileupdate.php');

 }




 ?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_5.jpg); height: 1200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<br><br><br><br><br>
<center>
<h1 style="font-size: 100px">Profile light sound </h1>
<form method="post">
	<?php  if (sizeof($res)>0) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>light sound name</th>
			<td><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res[0]['light_sound_name'] ?>" name="fname"></td>
		</tr>
		

		<tr>
			<th>Place</th>
			<td><input type="text" required=""  style="color: white" class="form-control" value="<?php echo $res[0]['place'] ?>" name="place"></td>
		</tr>

		
		
		<tr>
			<th>Phone</th>
			<td><input type="text" required=""  style="color: white" pattern="[0-9]{10}" value="<?php echo $res[0]['phone'] ?>" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" required=""  style="color: white" value="<?php echo $res[0]['email'] ?>" class="form-control" name="email"></td>
		</tr>
		
		

		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>

</form>

<?php } ?>
</center>

						</div>
					</div>
				</div>
			</div>
		</div>
	</header>



<?php include 'footer.php' ?>