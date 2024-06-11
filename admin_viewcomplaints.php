<?php include 'adminheader.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						
<center>
	<h1 style="color: black">view Complaints</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			   <th>Complaints</th>
			   <th>Customer</th>
				<th> date</th>
				<th>Reply</th>
				
			</tr>
			<?php 

     $q="select * from complaint INNER JOIN customer USING (customer_id)  ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['complaint'] ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		
    		<td><?php echo $row['complaint_date'] ?></td>

    		<?php 
           if ($row['reply']=="pending") {?>
           	<td><a class="btn btn-success" href="admin_reply.php?cid=<?php echo $row['complaint_id'] ?>">Send Reply</a></td>
          <?php  }else{
    		 ?>
          
    		<td><?php echo $row['reply'] ?></td>
    		
                  
    	</tr>
    <?php }


}

			 ?>
		</table>
	</form>
</center>





<center>
	<!-- <h1 style="color: black">view  LightSound Complaints</h1> -->
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			   <th>Complaints</th>
			   <th>LightSound</th>
				<th> date</th>
				<th>Reply</th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `complaint` INNER JOIN `lightandsound` ON `lightandsound`.`login_id`=`complaint`.`customer_id`";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['complaint'] ?></td>
    		<td><?php echo $row['light_sound_name'] ?></td>
    		
    		<td><?php echo $row['complaint_date'] ?></td>

    		<?php 
           if ($row['reply']=="pending") {?>
           	<td><a class="btn btn-success" href="admin_reply.php?cid=<?php echo $row['complaint_id'] ?>">Send Reply</a></td>
          <?php  }else{
    		 ?>
          
    		<td><?php echo $row['reply'] ?></td>
    		
                  
    	</tr>
    <?php }


}

			 ?>
		</table>
	</form>
</center>





<center>
<!-- 	<h1 style="color: black">view  Catering Complaints</h1> -->
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			   <th>Complaints</th>
			   <th>Catering</th>
				<th> date</th>
				<th>Reply</th>
				
			</tr>
			<?php 

     $q="SELECT * FROM `complaint` INNER JOIN `catering_team` ON `catering_team`.`login_id`=`complaint`.`customer_id` ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['complaint'] ?></td>
    		<td><?php echo $row['cater_name'] ?></td>
    		
    		<td><?php echo $row['complaint_date'] ?></td>

    		<?php 
           if ($row['reply']=="pending") {?>
           	<td><a class="btn btn-success" href="admin_reply.php?cid=<?php echo $row['complaint_id'] ?>">Send Reply</a></td>
          <?php  }else{
    		 ?>
          
    		<td><?php echo $row['reply'] ?></td>
    		
                  
    	</tr>
    <?php }


}

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