<?php include 'adminheader.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_5.jpg);height: 200px" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
               <div class="display-t">
                  <div class="display-tc animate-box" data-animate-effect="fadeIn">

                  

<center>
	<h1 style="color: black">View Events</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			
			<th>Title</th>
			<th>Amount</th>
			<th>Place</th>
			<th>Date</th>
			<th>No Of persons</th>
         <th>Status</th>
		</tr>
		<?php 
         $q="SELECT * FROM `customerevent`  INNER JOIN `customer`  USING  (`customer_id`)";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['first_name'] ?></td>
         		<td><?php echo $row['customer_event_title'] ?></td>
         		<td><?php echo $row['budget_amount'] ?></td>
         		<td><?php echo $row['place'] ?></td>
         		<td><?php echo $row['customer_event_date'] ?></td>
         		<td><?php echo $row['no_of_persons'] ?></td>
               <td><?php echo $row['customer_event_status'] ?></td>



                 <?php 

               if ($row['customer_event_status']=="accept") {
                ?>

                <td><a class="btn btn-success" href="admin_Viewproposalpayment.php?eid=<?php echo $row['customer_event_id'] ?>">View Proposal Payment</a></td>
               
               <?php }

                ?>
               

              
               

               <?php 

               if ($row['customer_event_status']=="pending") {
                ?>

                <td><a class="btn btn-success" href="admin_sendproposal.php?eid=<?php echo $row['customer_event_id'] ?>">Send Proposal</a></td>
               
               <?php }

                ?>
         		
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>


</div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <?php include 'footer.php' ?>
