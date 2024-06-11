<?php include 'adminheader.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_5.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						
<center>
	<h1 style="color: black">view Payments</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
				<th>Booking Date time </th>
				<th>Booking Venue</th>
				<th>user</th>

			   <th>Amount</th>
				<th>date</th>
				
			

				
			</tr>
		<?php 

     $q="SELECT * FROM `payment`  INNER JOIN `booking`  USING (`booking_id`)  inner join customer USING (customer_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['booking_date'] ?> <?php echo $row['booking_time'] ?></td>
    		<td><?php echo $row['booking_venue'] ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		
    		<td><?php echo $row['amount'] ?></td>
    		<td><?php echo $row['payment_date'] ?></td>
    	
    		
                  
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