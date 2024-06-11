<?php include 'catering_teamheader.php' ;

  




   $cid=$_SESSION['cater_id'];
   extract($_GET);




 ?>

<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);height: 200px" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">

<?php 


$q="select * from review inner join customer using (customer_id)  where cater_id='$cid'";
$res=select($q);
foreach ($res as $row) {

    ?>

 <center>
  
<h1  style="color: black">View Review</h1>
 <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img">
                            <img class="img-responsive" src="/{{row['image']}}" alt="">
                        </div>
                        <div class="team-info">

                              <span><b>Customer:</b><?php echo $row['first_name'] ?></span><br>
                            
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