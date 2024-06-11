<?php include 'catering_teamheader.php' ;

  




   $cid=$_SESSION['cater_id'];
   extract($_GET);



   if (isset($_GET['aid'])) {
   		extract($_GET);


   		$q="update cater_request set status='accept'  where request_id='$aid'";
   		update($q);
alert('accepted successfully');
   		return redirect('catering_viewrequest.php');
   }




      if (isset($_GET['rid'])) {
   		extract($_GET);


   		$q="update cater_request set status='reject'  where request_id='$rid'";
   		update($q);
   		alert('rejected successfully');

   		return redirect('catering_viewrequest.php');
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
	<h1 style="color: black"> View Catering Request</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			   <th>menu name</th>
			  
				<th>Catering name </th>
				<th>Date</th>
				<th>Amount</th>
				<th>Status </th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `cater_request`   INNER JOIN menu USING (menu_id)  INNER JOIN `food_category`  USING (food_id)INNER JOIN catering_team  USING  (cater_id) where cater_id='$cid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    			<td><?php echo $row['menu_name'] ?></td>
    		<td><?php echo $row['cater_name'] ?></td>


    		<td><?php echo $row['date'] ?></td>
    		<td><?php echo $row['price'] ?></td>
    		
    		
    		<td><?php echo $row['status'] ?></td>


    	<?php 

if ($row['status']=="requested") {
	?>

<td><a class="btn btn-success" href="?aid=<?php echo $row['request_id'] ?>">Accept</a></td>

<td><a class="btn btn-success" href="?rid=<?php echo $row['request_id'] ?>">Reject</a></td>
<?php  
}

    	 ?>




    	 <?php if ($row['status']=="Paid"){
    	  ?>


    	  <td><a class="btn btn-success" href="bill.php?reqid=<?php echo $row['request_id'] ?>">bill</a></td>
    	 	
    	 <?php
    	  }
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