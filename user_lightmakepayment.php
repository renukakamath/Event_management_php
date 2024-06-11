<?php include 'userheader.php';
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);

	echo$q="insert into otherpayment values(null,'$bid','$amo',curdate(),'light and sound')";
	insert($q);
	echo$Q="update lightsound_request set is_status='Paid' where srequest_id='$bid'";
	update($Q);
	alert('successfully');
	return redirect('user_lightandsoundrequest.php');
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
	<h1>Make Payment</h1>
	<form  method="post">
<table class="table" style="width: 500px;color: white">
			
				<th> Card number</th>
				<td style=""><input type="number" required="" maxlength="16" style="color: white" class="form-control" name="tit"></td>
			</tr>
			<tr>
				<th> Amount</th>
				<td style=""><input type="number"  value="<?php echo $amount ?>" required="" style="color: white" class="form-control" name="amo"></td>
			</tr>
			<tr>
				<th>C v v</th>
				<td><input type="number" required="" maxlength="3" style="color: white" class="form-control" name="place"></td>
			</tr>
			

			<tr>
				<th> Expired date</th>
				<td style=""><input type="date" required="" style="color: white" class="form-control" name="date"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="payment" value="submit" class="btn btn-success"></th>
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
<?php include 'footer.php' ?>