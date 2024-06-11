<?php include 'adminheader.php';

if (isset($_GET['aid'])) {
	extract($_GET);


	$q="update booking set booking_status='Accept' where booking_id='$aid'";
	update($q);

}

if (isset($_GET['rid'])) {
	extract($_GET);

	$q1="update booking set booking_status='Reject' where booking_id='$rid'";
	update($q1);
}



 ?>

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
    		<td><?php echo $row['package_title'] ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		
    		<td><?php echo $row['booking_date'] ?></td>
    		<td><?php echo $row['booking_time'] ?></td>
    	
    		<td><?php echo $row['booking_venue'] ?></td>
    		<td><?php echo $row['no_of_persons'] ?></td>
    		<td><?php echo $row['booking_status'] ?></td>
    			<td><?php echo $row['booking_type'] ?></td>
    			<?php 

            if ($row['booking_status']=="pending") {?>


            	<td><a href="?aid=<?php echo $row['booking_id'] ?>">Accept</a></td>
            	
       
           	<td><a href="?rid=<?php echo $row['booking_id'] ?>">Reject</a></td>

         <?php  }
    			 ?>
    			
    			
                  
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