<?php include 'staff_header.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						
<center>
	<h1 style="color: black"> View LightSound Request</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			
			   <th>Customer</th>
				 <th>Team Name</th>
			  
				<th>Light and Sound name </th>
				<th>Amount</th>
				<th>Date</th>
				<th>Status </th>
				
				
			</tr>
			<?php 

     $q="SELECT * FROM `lightsound_request` INNER JOIN `lightsound`  USING (`lightsound_id`) INNER JOIN `customer`  USING (`customer_id`)  inner join lightandsound using (light_sound_id)";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['light_sound_name'] ?></td>
    		
    		
    		<td><?php echo $row['lightsound'] ?></td>
    		<td><?php echo $row['amount'] ?></td>

    		<td><?php echo $row['date'] ?></td>
    		<td><?php echo $row['is_status'] ?></td>


    		<?php 

    		if ($row['is_status']=="Paid") {
    		?>
<td><a class="btn btn-success" href="staff_viewrequestpayment.php?bid=<?php echo $row['srequest_id'] ?>">Payment</a></td>

    		
    		<?php }

    		 ?>
    			
    			<!-- <td><a class="btn btn-success" href="staff_viewcustomer.php?uid=<?php echo $row['customer_id'] ?>">Customer</a></td> -->
    			
                  
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