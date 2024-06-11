<?php include 'userheader.php' ;
extract($_GET);




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
	<h1  style="color: black">View food</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Food Type</th>
			
		</tr>
		<?php 
         $q="select * from food_category  where cater_id='$cater_id' ";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		
         		<td><?php echo $row['food_category'] ?></td>
         		
         	<!-- 	<td><a class="btn btn-success" href="?uid=<?php echo $row['food_category_id'] ?>">update</a></td>-->
         		<td><a class="btn btn-success" href="user_viewmenu.php?food_id=<?php echo $row['food_id'] ?>">View menu</a></td> 
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>