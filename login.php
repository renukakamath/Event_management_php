<?php include 'publicheader.php';


if (isset($_POST['login'])) {
	extract($_POST);

	$q="select * from login where username='$uname' and password='$pwd'";
	$res=select($q);
	if (sizeof($res)>0) {

           $_SESSION['login_id']=$res[0]['login_id'];
           $lid=$_SESSION['login_id'];

 	   

		if ($res[0]['user_type']=="admin") {

			return redirect('admin_home.php');



		}elseif ($res[0]['user_type']=="cateringteam") {

		

 			$q2="select * from catering_team inner join login using (login_id) where login_id='$lid'";
 			$res2=select($q2);
 			if (sizeof($res2)>0) {

 				$_SESSION['login_id']=$res[0]['login_id'];

 				 $_SESSION['cater_id']=$res2[0]['cater_id'];
                    echo $uid=$_SESSION['cater_id'];
           return redirect('catering_team_home.php');


 			}
			
		

		}elseif ($res[0]['user_type']=="lightsound") {

		

 			$q2="select * from lightandsound inner join login using (login_id) where login_id='$lid'";
 			$res2=select($q2);
 			if (sizeof($res2)>0) {


 				$_SESSION['login_id']=$res[0]['login_id'];
 				 $_SESSION['light_sound_id']=$res2[0]['light_sound_id'];
                    echo $lid=$_SESSION['light_sound_id'];
           return redirect('light_sound_home.php');


 			}
			
		

		}





		elseif ($res[0]['user_type']=="Users") {

		

 			$q2="select * from customer  inner join login using (login_id) where login_id='$lid'";
 			$res2=select($q2);
 			if (sizeof($res2)>0) {
 				 $_SESSION['customer_id']=$res2[0]['customer_id'];
                    echo $uid=$_SESSION['customer_id'];
           		return redirect('user_home.php');


 			}
			
		

		}




		elseif ($res[0]['user_type']=="Staff") {


    


		 $q="select * from staffevent_manager inner join login using (login_id) where login_id='$lid'";
		 $res=select($q);
		 if (sizeof($res)>0) {
		 		$_SESSION['staff_id']=$res[0]['staff_id'];
			$sid=$_SESSION['staff_id'];
			return redirect('staff_home.php');
		}
		 }		
		
	}else{
		alert('invalid username and password');
	    }

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
<h1>Login</h1>
<form method="post" >
	<table class="table" style="width:500px;color: white">
		
		<tr>
			<th>User Name</th>
			<td ><input type="text"  required="" class="form-control" style="color: white" name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd" style="color: white"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="login" value="submit" class="btn btn-success"></td>
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