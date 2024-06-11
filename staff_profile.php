<?php include 'staff_header.php';
    $sid=$_SESSION['staff_id'];



   if(isset($_POST['btn'])){
    extract($_POST);

    $q="update staffevent_manager set first_name='$f', last_name='$l',$house_name='$hn', place='$pl',pincode='$p', email='$e', phone='$p' where staff_id='$profid'  ";
    update($q);
    $q="update login set username='$u' where login_id='$logid'";
    update($q);
    return redirect("staff_profile.php");
   }
?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <br><br><br><br>

<center>
<?php 
if(isset($_GET['profid'])){
?>

<h1>Update Profile</h1>
<?php 
            $q="select * from staffevent_manager inner join login using (login_id) where staff_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <form action="" method="post">
<table class="table" style="width: 500px;color: white">
    <tr>
        <th align="right">First Name :</th>
        <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['first_name']?> "  name="f" id=""></td>
        </tr>
        <tr>

            <th align="right">Last Name :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['last_name']?> " name="l" id=""></td>
</tr>

<tr>

            <th align="right">Address :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['house_name']?> " name="hn" id=""></td>
</tr>
        <tr>

            <th align="right">Place :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['place']?> " name="pl" id=""></td>
</tr>

 <tr>

            <th align="right">Pincode :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['pincode']?> " name="p" id=""></td>
</tr>

  <tr>

            <th align="right">Email :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['email']?> " name="e" id=""></td>
</tr>
        <tr>

            <th align="right">Phone :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['phone']?> " name="ph" id=""></td>
</tr>


      
        <tr>

            <th align="right">Username :</th>
            <td><input type="text" class="form-control" required="" style="color: white" value="<?php echo $row['username']?> " name="u" id=""></td>
</tr>
    
    </tr>
   
    <tr>
               
               
            
               
              
               
    </tr>
    <tr>
        <td><input type="submit" class="btn btn-success" value="update" name="btn" id=""></td>
    </tr>
</table>
</form>
<?php }?>


<?php }else{?>

<h1>My Profile</h1>
<?php 
            $q="select * from staffevent_manager inner join login using (login_id) where staff_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
<table class="table" style="width: 500px;color: white">
    <tr>
        <th align="right">First Name :</th>
        <td><?php echo $row['first_name']?> </td>
        </tr>
        <tr>

            <th align="right">Last Name :</th>
            <td><?php echo $row['last_name']?></td>
</tr>

 <tr>

            <th align="right">Address :</th>
            <td><?php echo $row['house_name']?></td>
</tr>
        <tr>

            <th align="right">Place :</th>
            <td><?php echo $row['place']?></td>
</tr>

<tr>

            <th align="right">Pincode :</th>
            <td><?php echo $row['pincode']?></td>
</tr>
       
        <tr>

            <th align="right">Email :</th>
            <td><?php echo $row['email']?></td>
</tr>

 <tr>

            <th align="right">Phone :</th>
            <td><?php echo $row['phone']?></td>
</tr>
        <tr>

            <th align="right">Username :</th>
            <td><?php echo $row['username']?></td>
</tr>
    
    </tr>
   
    <tr>
               
               
              <td><a class="btn btn-success" href="?profid=<?php echo $row['staff_id']?>&logid=<?php echo $row['login_id']?>">Update profile</a></td>
               
              
               
    </tr>
</table>
<?php }?>
<?php }?>

</center>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php include 'footer.php'?>