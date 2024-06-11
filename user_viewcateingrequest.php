<?php include 'userheader.php';




 $uid=$_SESSION['customer_id'];
extract($_GET);

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

     $q="SELECT * FROM `cater_request`   INNER JOIN menu USING (menu_id)  INNER JOIN `food_category`  USING (food_id)INNER JOIN catering_team  USING  (cater_id) where customer_id='$uid'";
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

if ($row['status']=="accept") {
	?>

<td><a class="btn btn-success" href="usercateringmakepayment.php?rid=<?php echo $row['request_id'] ?>&amo=<?php echo $row['price'] ?>">Payment</a></td>


<?php  
}

    	 ?>


<?php  

if ($row['status']=="Paid") {
	?>

<td><a class="btn btn-success" href="user_addrating.php?cid=<?php echo $row['cater_id'] ?>&amo=<?php echo $row['price'] ?>">Rating</a></td>


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