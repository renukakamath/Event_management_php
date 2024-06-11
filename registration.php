<?php include 'publicheader.php';

if (isset($_POST['cusreg'])) {
	extract($_POST);
	$q1="select * from login where username='$uname' ";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    echo$q="insert into login values(null,'$uname','$pwd','Users')";
     $id=insert($q);
 echo $q1="insert into customer values(null,'$id','$fname','$lname','$gen','$hno','$place','$pin','$email','$num') ";
   insert($q1);
   alert('sucessfully');
   return redirect('registration.php');
}
}






 ?>

 
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg); height: 1200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<br><br><br><br><br>
<center>
<h1 style="font-size: 100px"> Registration</h1>
<form method="post" style="" class="ppp">
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" style="color: white" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" style="color: white" name="lname"></td>
		</tr>

		<tr>
			<th>Gender</th>
			<td><input type="radio" required=""  style="color: white"  class="btn btn-success" name="gen" value="female">Female
			<input type="radio" required=""   style="color: white"class="btn btn-success" name="gen" value="male">male
			<input type="radio" required=""   style="color: white" class="btn btn-success" name="gen" value="other">Others</td>
		</tr>


		

		<tr>
			<th>Address:</th>
			<td><textarea name="hno" required="" style="color: white" class="form-control"></textarea></td>
		</tr>
		<tr>
			<th>Place</th>
			<td><input type="text" required="" style="color: white" class="form-control" name="place"></td>
		</tr>
		
<tr>
			<th>Pincode</th>
			<td><input type="text" required="" style="color: white" pattern="[0-9]{6}" class="form-control" name="pin"></td>
		</tr>

		<tr>
			<th>Phone</th>
			<td><input type="text" required="" style="color: white" pattern="[0-9]{10}" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>email</th>
			<td><input type="email" required="" style="color: white" class="form-control" name="email"></td>
		</tr>

		<tr>
			<th>User Name</th>
			<td><input type="text" required="" style="color: white" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" style="color: white" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="cusreg" value="submit" class="btn btn-success"></td>
	</table>
</form>
</center>


						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

 
<?php include 'footer.php' ?>