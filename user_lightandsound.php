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


<center>
	<h1  style="color: black">view light and sound</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				
			
				<th>Place</th>
				
				<th>Phone</th>
					<th>Email</th>
			
			

				
			</tr>
			<?php 

     $q="select * from lightandsound inner join login using (login_id)  ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['light_sound_name'] ?></td>
    		
    	
    		<td><?php echo $row['place'] ?></td>
    		
    		<td><?php echo $row['phone'] ?></td>
    			<td><?php echo $row['email'] ?></td>
              
    		   <td><a class="btn btn-success" href="user_sound.php?lid=<?php echo $row['light_sound_id'] ?>">lightsound details</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>

<?php include 'footer.php' ?>