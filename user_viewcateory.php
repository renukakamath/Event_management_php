<?php include 'userheader.php' ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);height: 200px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

<br><br><br>
<center>
	<h1 style="color: black"> Categorys</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>category Name</th>
		</tr>
		<?php 
         $q="select * from eventcategory";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['category_name'] ?></td>
         		
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
	</header>

<?php include 'footer.php' ?>