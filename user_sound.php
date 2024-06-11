<?php include 'userheader.php';




 $uid=$_SESSION['customer_id'];
extract($_GET);



if (isset($_GET['sid'])) {
	extract($_GET);


	$q="insert into lightsound_request values(null,'$uid',curdate(),'requested','$sid')";
	insert($q);
	alert('send request successfully');

	return redirect('user_lightandsound.php');
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


<center>
	<h1  style="color: black">view lightsound Details</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>light sound</th>
				
			
				<th>Description</th>
				
				<th>Amount</th>
					
			
			

				
			</tr>
			<?php 

     $q="select * from lightsound where light_sound_id='$lid'  ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['lightsound'] ?></td>
    		
    	
    		<td><?php echo $row['description'] ?></td>
    		
    		<td><?php echo $row['amount'] ?></td>
    			
              
    		   <td><a class="btn btn-success" href="?sid=<?php echo $row['lightsound_id'] ?>&amount=<?php echo $row['amount'] ?>">Send Request</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>

<?php include 'footer.php' ?>