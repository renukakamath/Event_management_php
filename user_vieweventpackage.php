
<?php include 'userheader.php' ?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

						<center>
								<form method="post">
									<table>
								<tr>
									<td style="color: white"><input type="text" placeholder="enter food name or type name" class="form-control" name="food"></td>
									<td><input type="submit" class="btn btn-success" name="search"></td>
								</tr>
							</table>

								</form>
						</center>
<br><br><br>
<center>
	<h1 style="color: black">View Packages</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>category Name</th>
			<th>Food</th>
		
			<th>Title</th>
			<th>Amount</th>
			<th>Description</th>
		</tr>
		<?php 

		if (isset($_POST['search'])) {
			extract($_POST);

			$q="select * from eventpackages inner join eventcategory using (category_id) inner join food_category using (food_id) where food_category like '%$food%'";

		}else{

		
         $q="select * from eventpackages inner join eventcategory using (category_id) inner join food_category using (food_id)";}
         $res=select($q);
     
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		
         	<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['category_name'] ?></td>
         		<td><?php echo $row['food_category'] ?></td>
         		
         		<td><?php echo $row['package_title'] ?></td>
         		<td><?php echo $row['package_amount'] ?></td>
         		<td><?php echo $row['package_description'] ?></td>
         		<td><a class="btn btn-success" href="user_bookevent.php?packageid=<?php echo $row['package_id'] ?>">Book Now</a></td>
   
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