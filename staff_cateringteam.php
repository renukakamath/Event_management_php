
<?php include 'staff_header.php';

$sid=$_SESSION['staff_id'];


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from login where username='$uname' ";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    echo$q="insert into login values(null,'$uname','$pwd','cateringteam')";
     $id=insert($q);
  echo$q1="insert into catering_team values(null,'$id','$sid','$fname','$num','$place','$email') ";
   insert($q1);
   alert('sucessfully');
   return redirect('staff_cateringteam.php');
}
}

 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from catering_team where cater_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update catering_team set cater_name='$fname' ,place='$place',phone='$num',email='$email' where cater_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('staff_cateringteam.php');

 }
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from catering_team where cater_id='$did'";
	delete($q);
	alert('sucessfully');
   return redirect('staff_cateringteam.php');
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
<h1 style="font-size: 100px">Manage catering team </h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>catering team name</th>
			<td><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res[0]['cater_name'] ?>" name="fname"></td>
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
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>catering team name</th>
			<td><input type="text" required=""  style="color: white" class="form-control" name="fname"></td>
		</tr>
		

		<tr>
			<th>Place</th>
			<td><input type="text" required=""  style="color: white" class="form-control"  name="place"></td>
		</tr>

		
		<tr>
			<th>Phone</th>
			<td><input type="text" required=""  style="color: white" pattern="[0-9]{10}"  class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" required=""  style="color: white"  class="form-control" name="email"></td>
		</tr>
		
		<tr>
			<th>User Name</th>
			<td><input type="text" required=""  style="color: white" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required=""  style="color: white" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="staffreg" value="submit" class="btn btn-success"></td>
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

<center>
	<h1>view catering team</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				
			
				<th>Place</th>
				
				<th>Phone</th>
					<th>Email</th>
			
			

				
			</tr>
			<?php 

     $q="select * from catering_team inner join login using (login_id)   where staff_id='$sid' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['cater_name'] ?></td>
    		
    	
    		<td><?php echo $row['place'] ?></td>
    		
    		<td><?php echo $row['phone'] ?></td>
    			<td><?php echo $row['email'] ?></td>
                    <td><a  class="btn btn-success" href="?did=<?php echo $row['cater_id'] ?>">Delete</a></td>
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['cater_id'] ?>">Update</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>

<?php include 'footer.php' ?>