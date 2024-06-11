<?php include 'staff_header.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						
<center>
	<h1 style="color: black"> event Booking</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			   <th>Event</th>
			   <th>Customer</th>
				<th>Booking date</th>
				<th>Booking Time</th>
				<th>Booking Venue</th>
				<th>No Of Persons</th>
				<th>Booking Status</th>
				<th>Booking Type</th>
			</tr>
			<?php 

     $q="SELECT * FROM `booking`  INNER JOIN `eventpackages` ON `eventpackages`.`package_id`=`booking`.`event_id` INNER JOIN `customer`  USING (`customer_id`)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		
    		<td><?php echo $row['booking_date'] ?></td>
    		<td><?php echo $row['booking_time'] ?></td>
    	
    		<td><?php echo $row['booking_venue'] ?></td>
    		<td><?php echo $row['no_of_persons'] ?></td>
    		<td><?php echo $row['booking_status'] ?></td>
    			<td><?php echo $row['booking_type'] ?></td>
    			
    			<td><a class="btn btn-success" href="staff_viewcustomer.php?uid=<?php echo $row['customer_id'] ?>">Customer</a></td>
    			<td><a class="btn btn-success" href="staff_viewpayment.php?bid=<?php echo $row['customer_id'] ?>">Payment</a></td>
                  
    	</tr>
    <?php }




			 ?>
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