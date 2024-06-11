<?php include 'userheader.php';
 $uid=$_SESSION['customer_id'];
 extract($_GET);

if (isset($_POST['complaint'])) {
	extract($_POST);

	$q="insert into complaint values(null,'$uid','$fee','pending',curdate())";
	insert($q);
	alert('successfully');
	return redirect('user_sendcomplaint.php');
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
	<h1>Send complaint</h1>
	<form  method="post">
<table class="table" style="width: 500px;color: white">
			
				<th>complaint</th>
				<td style=""><input type="text" required="" style="color: white" class="form-control" name="fee"></td>
			</tr>
			
			<tr>
				<th align="center" colspan="2"><input type="submit" name="complaint" value="submit" class="btn btn-success"></th>
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


<br><br><br>

						
<center>
	<h1 style="color: black">view Complaints</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			

			   <th>Complaints</th>
			  
				<th> date</th>
				<th>Reply</th>
				
			</tr>
			<?php 

     $q="select * from complaint  where customer_id='$uid'";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['complaint'] ?></td>
    	
    		
    		<td><?php echo $row['complaint_date'] ?></td>
          
    		<td><?php echo $row['reply'] ?></td>
    		
                  
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>