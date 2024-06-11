
<?php include 'adminheader.php';


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    echo$q="insert into login values(null,'$uname','$pwd','Staff')";
     $id=insert($q);
  echo$q1="insert into staffevent_manager values(null,'$id','$fname','$lname','$gen','$hno','$place','$pin','$email','$num') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managestaff.php');
}
}

 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from staffevent_manager where staff_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update staffevent_manager set first_name='$fname' ,last_name='$lname',gender='$gen',house_name='$hno',place='$place',pincode='$pin',phone='$num',email='$email' where staff_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managestaff.php');

 }
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from staffevent_manager where staff_id='$did'";
	delete($q);
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
<h1 style="font-size: 100px">Manage Staff</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res[0]['first_name'] ?>" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res[0]['last_name'] ?>" name="lname"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" required=""  style="color: white"  class="btn btn-success" name="gen" value="female">Female
			<input type="radio" required=""  style="color: white" class="btn btn-success" name="gen" value="male">male
			<input type="radio" required=""   style="color: white" class="btn btn-success" name="gen" value="other">Others</td>
		</tr>

		
		
		<tr>
			<th>House Name</th>
			<td><textarea name="hno" required=""  style="color: white" class="form-control"><?php echo $res[0]['house_name'] ?></textarea></td>
		</tr>


		<tr>
			<th>Place</th>
			<td><input type="text" required=""  style="color: white" class="form-control" value="<?php echo $res[0]['place'] ?>" name="place"></td>
		</tr>

		
		<tr>
			<th>Pincode</th>
			<td><input type="text" required=""  style="color: white" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['pincode'] ?>" name="pin"></td>
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
			<th>First Name</th>
			<td><input type="text" required=""  style="color: white" class="form-control" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required=""  style="color: white" class="form-control" name="lname"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" required=""   style="color: white" class="btn btn-success" name="gen" value="female">Female
			<input type="radio" required=""  style="color: white" class="btn btn-success" name="gen" value="male">male
			<input type="radio" required="" style="color: white"  class="btn btn-success" name="gen" value="other">Others</td>
		</tr>

		
		
	<tr>
			<th>House Name</th>
			<td><textarea name="hno" required=""  style="color: white" class="form-control"></textarea></td>
		</tr>


		<tr>
			<th>Place</th>
			<td><input type="text" required=""  style="color: white" class="form-control"  name="place"></td>
		</tr>

		
		<tr>
			<th>Pincode</th>
			<td><input type="text" required=""  style="color: white" pattern="[0-9]{6}" class="form-control"  name="pin"></td>
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
	<h1>view Staff</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
			    
			   <th>House Name</th>
				<th>Place</th>
				<th>Pincode</th>
				<th>Phone</th>
					<th>Email</th>
			
			

				
			</tr>
			<?php 

     $q="select * from staffevent_manager inner join login using (login_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['last_name'] ?></td>
    		
    		<td><?php echo $row['gender'] ?></td>
    		<td><?php echo $row['house_name'] ?></td>
    	
    		<td><?php echo $row['place'] ?></td>
    		<td><?php echo $row['pincode'] ?></td>
    		<td><?php echo $row['phone'] ?></td>
    			<td><?php echo $row['email'] ?></td>
                    <td><a  class="btn btn-success" href="?did=<?php echo $row['staff_id'] ?>">Delete</a></td>
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['staff_id'] ?>">Update</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>

<?php include 'footer.php' ?>