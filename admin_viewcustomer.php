<?php include 'adminheader.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						
<center>
	<h1 style="color: black">view Customer</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
			    
			   <th>House Name</th>
				<th>Place</th>
				<th>Pincode</th>
				<th>Phone</th>
					<th>Email</th>
			
			

				
			</tr>
			<?php 

     $q="select * from customer inner join login using (login_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['last_name'] ?></td>
    		
    		<td><?php echo $row['gender'] ?></td>
    		<td><?php echo $row['house_name'] ?></td>
    	
    		<td><?php echo $row['place'] ?></td>
    		<td><?php echo $row['pincode'] ?></td>
    		<td><?php echo $row['phone'] ?></td>
    			<td><?php echo $row['email'] ?></td>
                  
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