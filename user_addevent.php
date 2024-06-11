<?php include 'userheader.php' ;
    $uid=$_SESSION['customer_id'];
 extract($_GET);




if (isset($_POST['Event'])) {
	extract($_POST);

	$q="insert into customerevent values(null,'$uid','$tit','$amo','$place','$person','$date','pending')";
	insert($q);
	alert('  Successfully');
  return redirect('user_addevent.php');

}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from customerevent where customer_event_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('user_addevent.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from customerevent  where customer_event_id='$uid'";
	$res1=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update customerevent set customer_event_title='$tit',budget_amount='$amo',place='$place',no_of_persons='$person',customer_event_date='$date' where customer_event_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('user_addevent.php');

}



?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
<center>
	<h1>Manage Events</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
		
			<tr>
				<th> Title</th>
				<td style=""><input type="text" required="" class="form-control" style="color: white" value="<?php echo $res1[0]['customer_event_title'] ?>" name="tit"></td>
			</tr>
			<tr>
				<th> Amount</th>
				<td style=""><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res1[0]['budget_amount'] ?>"  name="amo"></td>
			</tr>
			<tr>
				<th>Place</th>
				<td><input type="text" required="" class="form-control"  style="color: white" value="<?php echo $res1[0]['place'] ?>" name="place"></td>
			</tr>
			<tr>
				<th>No Of Persons</th>
				<td><input type="number" required="" name="person"  style="color: white" value="<?php echo $res1[0]['no_of_persons'] ?>" class="form-control"></td>
			</tr>

			<tr>
				<th> Event date</th>
				<td style=""><input type="date" required="" class="form-control" value="<?php echo $res1[0]['customer_event_date'] ?>" name="date"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			
				<th> Title</th>
				<td style=""><input type="text" required=""  style="color: white" class="form-control" name="tit"></td>
			</tr>
			<tr>
				<th> Amount</th>
				<td style=""><input type="text" required=""  style="color: white" class="form-control" name="amo"></td>
			</tr>
			<tr>
				<th>Place</th>
				<td><input type="text" required=""  style="color: white" class="form-control" name="place"></td>
			</tr>
			<tr>
				<th>No Of Persons</th>
				<td><input type="number" required=""  style="color: white" name="person" class="form-control"></td>
			</tr>

			<tr>
				<th> Event date</th>
				<td style=""><input type="date"  style="color: white" required="" class="form-control" name="date"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="Event" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>


						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<br><br><br>
<center>
	<h1>View Events</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			
			<th>Title</th>
			<th>Amount</th>
			<th>Place</th>
			<th>Date</th>
			<th>No Of persons</th>
		</tr>
		<?php 
         $q="select * from customerevent  where customer_id='$uid'";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		
         		<td><?php echo $row['customer_event_title'] ?></td>
         		<td><?php echo $row['budget_amount'] ?></td>
         		<td><?php echo $row['place'] ?></td>
         		<td><?php echo $row['customer_event_date'] ?></td>
         		<td><?php echo $row['no_of_persons'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['customer_event_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['customer_event_id'] ?>">delete</a></td>

         		<td><a  class="btn btn-success" href="user_viewproposal.php?eid=<?php echo $row['customer_event_id'] ?>">View Proposal</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
