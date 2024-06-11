<?php include 'adminheader.php';
extract($_GET);

if (isset($_POST['send'])) {
	extract($_POST);

	$q="update complaint set reply='$rep' where complaint_id='$cid'";
	update($q);
	alert('successfully');
	return redirect('admin_viewcomplaints.php');
}

 ?>

 <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg); height: 700px" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">

<h1> Send Reply</h1>						
<center>
	<form method="post">
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Reply</th>
				<td><input type="text" required=""  style="color: white" class="form-control" name="rep"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="send" ></td>
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