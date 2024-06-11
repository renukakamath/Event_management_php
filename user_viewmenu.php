<?php include 'userheader.php' ;

 $uid=$_SESSION['customer_id'];
extract($_GET);



if (isset($_GET['mid'])) {
   extract($_GET);

   $q="insert into cater_request  values(null,'$uid','$mid','catering request',curdate(),'requested')";
   insert($q);
   alert('requested successfully');
   return  redirect('user_viewcatering_team.php');

}




?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);height: 200px" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
               <div class="display-t">
                  <div class="display-tc animate-box" data-animate-effect="fadeIn">

                 
<br><br><br>
<center>
	<h1  style="color: black">View Menu</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Menu Name</th>
         <th>Description</th>
         <!-- <th>Quantity</th> -->
         <th>Price</th>
         <th></th>
			
		</tr>
		<?php 
         $q="select * from menu  where food_id='$food_id' ";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		
         		<td><?php echo $row['menu_name'] ?></td>
               <td><?php echo $row['description'] ?></td>
               <!-- <td><?php echo $row['quantity'] ?></td> -->
               <td><?php echo $row['price'] ?></td>
               <td><img src="<?php echo $row['image'] ?>"  width="100" height="100"></td>
      
         		<td><a class="btn btn-success" href="?mid=<?php echo $row['menu_id'] ?>">Send request</a></td> 
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>