<?php include 'staff_header.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						
<center>
	<h1 style="color: black"> View Catering Request</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			 
			   <th>Customer</th>
				
			   <th>menu name</th>
			  
				<th>Catering name </th>
				<th>Date</th>
				<th>Amount</th>
				<th>Status </th>
				
				
			</tr>
			<?php 

     $q="SELECT * FROM `cater_request`   INNER JOIN menu USING (menu_id)  INNER JOIN `food_category`  USING (food_id)INNER JOIN catering_team  USING  (cater_id)  inner join customer using (customer_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    			<td><?php echo $row['menu_name'] ?></td>
    		<td><?php echo $row['cater_name'] ?></td>


    		<td><?php echo $row['date'] ?></td>
    		<td><?php echo $row['price'] ?></td>
    		
    		
    		<td><?php echo $row['status'] ?></td>
    	
    		
    			
    			<!-- <td><a class="btn btn-success" href="staff_viewcustomer.php?uid=<?php echo $row['customer_id'] ?>">Customer</a></td> -->
    			<td><a class="btn btn-success" href="staff_viewcateringpayment.php?bid=<?php echo $row['request_id'] ?>">Payment</a></td>
                  
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