<?php include 'userheader.php' ;

 $uid=$_SESSION['customer_id'];
 extract($_GET);




if (isset($_POST['Event'])) {
	extract($_POST);

	$q="insert into booking values(null,'$packageid','$uid','$date','$time','$place','$person','pending','booking')";
	insert($q);
	alert('  Successfully');
  return redirect('user_bookevent.php');

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
	<h1>Book  Events</h1>
	<form  method="post">
		
	
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th> Event date</th>
				<td style=""><input type="date" required=""  style="color: white" class="form-control" name="date"></td>
			</tr>
				<th> Time</th>
				<td style=""><input type="time" required=""  style="color: white" class="form-control" name="time"></td>
			</tr>
			<tr>
				<th>Place</th>
				<td><input type="text" required=""  style="color: white" class="form-control" name="place"></td>
			</tr>
			<tr>
				<th>No Of Persons</th>
				<td><input type="number" required=""  style="color: white" name="person" class="form-control"></td>
			</tr>

			
			<tr>
				<th align="center" colspan="2"><input type="submit" name="Event" value="submit" class="btn btn-success"></th>
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
	<h1>View Events</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			
			<th>Package</th>
			<th>Booking Date</th>
			<th>Time</th>
			<th>Place</th>
			<th>No Of persons</th>
			<th>Status</th>
			<th>Amount</th>
		</tr>
		<?php 
         $q="SELECT * FROM `booking`  INNER JOIN `eventpackages` ON `eventpackages`.`package_id`=`booking`.`event_id` INNER JOIN `customer`  USING (`customer_id`)  where customer_id='$uid' and booking_status='pending' or booking_status='Paid' ";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		
         		<td><?php echo $row['package_title'] ?></td>
         		<td><?php echo $row['booking_date'] ?></td>
         			<td><?php echo $row['booking_time'] ?></td>
         		<td><?php echo $row['booking_venue'] ?></td>
         	
         		<td><?php echo $row['no_of_persons'] ?></td>
         		<td><?php echo $row['booking_status'] ?></td>
         		<td><?php echo $row['package_amount'] ?></td>
         		<?php 

              if ($row['booking_status']=="pending") {?>
              <td><a class="btn btn-success" href="user_makepayment.php?boid=<?php echo $row['booking_id'] ?>&package_amount=<?php echo $row['package_amount'] ?>">Make Payment</a></td>
             <?php  }

         		 ?>
         		
         		
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
