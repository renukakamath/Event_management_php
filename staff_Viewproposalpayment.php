<?php include 'staff_header.php' ?>

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
				<th>Proposal date </th>
				<th>payment type</th>
				

			   <th>Amount</th>
				
				
			

				
			</tr>
		<?php 

     $q="SELECT * FROM  `otherpayment`  INNER JOIN `proposal` ON  `otherpayment`.`payment_for_id`=`proposal`.`proposal_id`  WHERE `payment_type`='proposal' ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['proposal_date'] ?> </td>
    		<td><?php echo $row['payment_type'] ?></td>
    	
    		
    		<td><?php echo $row['amount'] ?></td>
    	
    		
                  
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