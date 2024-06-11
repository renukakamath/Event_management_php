<?php include 'userheader.php';




 $uid=$_SESSION['customer_id'];
extract($_GET);

if (isset($_POST['rating'])) {
   extract($_POST);


   $q="insert into review values(null,'$uid','$cid','$rates','$review',curdate())";
   insert($q);
   alert('user_addrating.php');
   return redirect('user_addrating.php');
}

?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">

<style type="text/css">
	
	*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>
<center>
	<h1> Rate</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
			<th>rate</th>
			<td>
<div class="rate">
    <input type="radio" id="star5" name="rates" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rates" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rates" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rates" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rates" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>


			</td>
		</tr>
        <tr>
            <th>Review</th>
            <td ><input type="text"  style="color: white"  class="form-control" name="review"></td>
        </tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="rating"></td>
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


   
<?php 


$q="select * from review";
$res=select($q);
foreach ($res as $row) {

    ?>

 <center>
  
<h1>View Review</h1>
 <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="/{{row['image']}}" alt="">
                        </div>
                        <div class="team-info">
                            
                            <span><b>rating:</b><?php echo $row['rating'] ?></span>
                        </div>
                        <p><b>review:</b> <?php echo $row['review'] ?></p>
                        <p><b>date: </b><?php echo $row['date'] ?></p>
                        
                      
                       
   
                    </div>
                     </div>
<?php            
}

 ?>

</center>
<?php include 'footer.php' ?>