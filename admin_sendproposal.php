<?php include 'adminheader.php';
extract($_GET);



if (isset($_POST['sendproposal'])) {
	extract($_POST);
	$q="insert into proposal values(null,'$eid','$date','$amt','pending')";
	insert($q);
	 alert('successfully');
	// return redirect("admin_sendproposal.php?eid=$eid");
}




 ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
<center>
	<form method="post">
		<h1>Send proposal</h1>
		<table class="table" style="width: 500px;color: white">
		
		<tr>
			<th>Date</th>
			<td ><input type="date" required=""   style="color: white" class="form-control" name="date" ></td>
		</tr>
		<tr>
			<th>Amount</th> 
			<td><input type="text" required=""  style="color: white"  class="form-control" name="amt"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="btn btn-success"  name="sendproposal"></td>
		</tr>
	</table>
	</form>
</center>


						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


<center>
	<h1>View Proposal</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Slno</th>
			<th>Customer Event</th>
			<th>Proposal Date</th>
			<th>Amount</th>
			
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
			
		</tr>
         <?php }


		 ?>
		
	</table>
</center>
<?php include 'footer.php' ?>