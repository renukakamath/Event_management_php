<?php include 'userheader.php';
 $uid=$_SESSION['customer_id'];
 extract($_GET);

if (isset($_POST['feedback'])) {
	extract($_POST);

	$q="insert into feedback values(null,'$uid','$fee',curdate())";
	insert($q);
	alert('successfully');
	return redirect('user_sendfeedback.php');
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
	<h1>Send Feedback</h1>
	<form  method="post">
<table class="table" style="width: 500px;color: white">
			
				<th>Feedback</th>
				<td style=""><input type="text" required="" maxlength="16" style="color: white" class="form-control" name="fee"></td>
			</tr>
			
			<tr>
				<th align="center" colspan="2"><input type="submit" name="feedback" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	
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
	<h1>View Feedback</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Feedback</th>
			<th>Date</th>
		</tr>
		<?php 
         $q="select * from feedback where customer_id='$uid'";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['feedback'] ?></td>
         		<td><?php echo $row['feedback_date'] ?></td>
         	
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>