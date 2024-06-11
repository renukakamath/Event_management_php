
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

<center>
	<h1  style="color: black">View Proposal</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Slno</th>
			<th>Customer Event</th>
			<th>Proposal Date</th>
			<th>Amount</th>
			<th>Status</th>
			
		</tr>
		<?php 

         $q="SELECT * FROM `proposal`  INNER JOIN `customerevent`  USING (`customer_event_id`) where customer_event_id='$eid'";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {?>
         <tr>
			<td><?php echo $slno++ ?></td>
			<td><?php echo $row['customer_event_title'] ?></td>
			<td><?php echo $row['proposal_date'] ?></td>
			<td><?php echo $row['proposal_amount'] ?></td>

			<td><?php echo $row['proposal_status'] ?></td>


			<?php 

				if ($row['proposal_status']=="pending") {
				?>

<td><a  class="btn btn-success" href="user_proposalpayment.php?pid=<?php echo $row['proposal_id'] ?>&amount=<?php echo $row['proposal_amount'] ?>">Make Payment</a></td>

				<?php }
			 ?>

			
			
		</tr>
         <?php }


		 ?>
		
	</table>
</center>
<?php include 'footer.php' ?>