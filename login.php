<?php
if(isset($_POST['loginme']) && $_POST['loginme'] == "loginme"  ){
include("login_controller.php");
}	

		include("header.php");
		
		
	 ?>
        <!-- Sticky Navbar -->
        <div class="page-header"> 
            <div class="container">
                <h1 class="title">Login &amp; Registration</h1>
            </div>
            <div class="breadcrumb-box">
                <div class="container">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                        </li>
                        <li class="active">Login &amp; Registration</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- page-header -->
        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> For help or questions while signing up as an admin or coach, please call <b>844-200-0696</b> extension <b>803</b>.<br>For help or questions while signing up as an athlete, please email us at <b>support@myoplan.com</b> for assistance within 24 hours. </div>
                </div>
                <hr />
                <div class="row">
                    <div class="content col-sm-12 col-md-8">
						
						<h3 class="title">Don&#39;t have an Account? Register Now.</h3>
                        <div id="success"></div>
						<div class="form-group">
						  <label for="sel1">Select Account Type</label>
						  <select class="form-control" id="acctype">
							<option value="0">Athlete</option>
						   <option value="1">Parent</option>
						   <option value="3">Admin</option>
						  </select>
						</div>
						
						<?php
							//Athlete Signup Form Starts from here
						?>
                        <form style="display:block" id="std_form" action="functions/std_signup.php" class="contact-form" method="post">
                        
						<h5 class="title">Athlete Signup</h5>
						
                        <input class="form-control" type="text" name="name" placeholder="Name *" required/> 
                        <input class="form-control" type="email" name="email" placeholder="Email *" required/>
                       
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <select class="form-control" name="sports" id="sports">
								  
										 <option value="0">Select Gender</option>
										 <option value="1">Male</option>
										 <option value="2">Female</option>
										 <option value="3">Undisclosed </option>
								  </select>
                            </div>
							
							<div class="col-md-6">
                                <input class="form-control" type="text" name="address" placeholder="Address" />
                            </div>
							
				<div class="col-md-6" style="display:none;">
                                <input type="text" class="form-control" name="p_email" placeholder="Parent's Email Address"/>
                            </div>
							<div class="col-md-6"> 
								<div class="form-group">
								  <select class="form-control" name="sports" id="sports1">
								  
										 <option value="0">Select Sport</option>
										 <?
											$sports = mysql_query("select * from sports_offered order by sport_title");

												while($sport = mysql_fetch_array($sports)){
													
												?>

													<option value="<?=$sport["id"]?>"><?=ucwords($sport["sport_title"])?></option>


												<?
												}
												?>
								  </select>
								</div>
                            </div>
							<div class="col-md-6">
                                <input type="text" class="form-control" oninvalid="setCustomValidity('Please enter only alphanumeric characters without spaces ')"  onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-zA-Z0-9]+[a-zA-Z0-9]+" name="username" id="exampleInputEmail3" placeholder="User Name *" required />
                            </div>
                            
							<div class="col-md-6">  
                                <input type="tel" class="form-control" name="phone" id="phone2" placeholder="Phone *" required />
                            </div>
							
                        </div>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password1a" name="pwd1" placeholder="Password *" required/>
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="pwd2" id="password1b" oninput="check1(this)" placeholder="Re-Enter Password *" required/>
                            </div>
                        </div>
						
						<div class="row" role="form">
                            
                        </div>
                        <div class="clearfix"></div>
                        <button id="submitx" type="submit" style="margin-top:15px;" class="btn btn-default">Register Now</button> 
                        <!-- .buttons-box -->
						
						
						</form>
						
						
						
						
						
						<?php
							//Parent Signup Form Starts from here
						?>
                        <form style="display:none" id="parent_form" enctype="multipart/form-data" action="functions/parentsignup.php" class="contact-form" method="post">
                        
						<h5 class="title">Athlete's Parent Signup</h5>
						
                        <input class="form-control" type="text" name="pname" placeholder="Name *" required/> 
                        <input class="form-control" type="email"  name="email" placeholder="Email *" required/>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <input type="text" oninvalid="setCustomValidity('Please enter only alphanumeric characters without spaces ')"  onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-zA-Z0-9]+[a-zA-Z0-9]+" class="form-control" name="username" placeholder="User Name *" required/>
                            </div>
                            <div class="col-md-6">
                                <input type="tel"  class="form-control" name="phone" placeholder="Phone *" required/>
                            </div>
                        </div>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password2a" name="password" placeholder="Password *" />
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password2b" name="cpassword" oninput="check2(this)" placeholder="Re-Enter Password *" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <input type="submit" class="btn btn-default" value="Register Now" />
                        
                        <!-- .buttons-box --></form>
						
						
						
						<?php
							//Coach Signup Form Starts from here
						?>

						
						
						
						
						<?php
							//Admin Signup Form Starts from here
						?>
                        <form style="display:none" id="admin_form" action="functions/admin_signup.php" class="contact-form" method="post">
						
                        
						<h5 class="title">Admin Signup</h5>
						
						<div class="form-group">
						  <label for="sel2">Select Admin Type</label>
						  <select name="admin_type" class="form-control">
								<option value="0">Primary Admin</option>
								<option value="1">Secondary Admin (i.e. Front Desk, Secretary) </option>
								<option value="2">Department Head </option>
								<option value="3">Head Coach </option>
								<option value="4">Assistant Coach </option>

						  </select>
						</div>
                        <input class="form-control" type="text" name="name" placeholder="Name *" required/> 
                        <input class="form-control" type="email" name="email" placeholder="Email *" required/>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <input type="text" oninvalid="setCustomValidity('Please enter only alphanumeric characters without spaces ')"  onchange="try{setCustomValidity('')}catch(e){}" pattern="[a-zA-Z0-9]+[a-zA-Z0-9]+" class="form-control" id="exampleInputEmail6" name="username" placeholder="User Name *" />
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control" id="exampleInputphone3" placeholder="Phone *" required/>
                            </div>
                        </div>
                        <div class="row" role="form">
                            <div class="col-md-6">
                                <input type="password" id="password3a" name="pwd1" class="form-control"  placeholder="Password *" />
                            </div>
                            <div class="col-md-6">
                                <input type="password" id="password3b" name="pwd2" class="form-control" oninput="check3(this)"  placeholder="Re-Enter Password *" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <button id="submit" type="submit" class="btn btn-default">Register Now</button> 
                        <!-- .buttons-box --></form>
						
						
						
						
						
                    </div>
                    <!-- .content -->
                    <div class="col-sm-12 col-md-4">
                        <form id="contact-form" action="" class="light-bg contact-form pad-40" method="post"> 
                        <h3 class="title">Login Now</h3>
                        <div id="success"></div>
                        <input class="form-control" type="text" name="username" placeholder="User Name *" requird/> 
                        <input class="form-control" type="password" name="passwd" placeholder="Password *" required/>
						<select name="acctype" class="form-control" required>
								<option value="0">Login Account Type</option>
								<option value="1">Athletics Organization </option>
								<option value="2">Athlete </option>
								<option value="3">Coach</option>
								<option value="4">Parent </option>
								<option value="5">Admin </option>

						  </select>
                        <div class="clearfix"></div>
                        <input type="submit" name="loginme" value="Login" class="btn btn-default" value="Login" />
                         
                        <span class="pull-right">
                            <a href="forgot.php" class="text-success">Forgot Password?</a>
                        </span> 
                        <!-- .buttons-box --></form>
                    </div>
                </div>
            </div>
        </section>
        <!-- page-section -->
        <div id="get-quote" class="bg-color get-a-quote black text-center" data-appear-animation="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">Need Help? 
                    <a class="black" href="#">Contact Us</a></div>
                </div>
            </div>
        </div>
     <?php
		include("footer.php");
	 ?>
	 <script>
	 
    function check1(input) {
        if (input.value != document.getElementById('password1a').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    } 
    function check2(input) {
        if (input.value != document.getElementById('password2a').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
	    function check3(input) {
        if (input.value != document.getElementById('password3a').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
		$("#acctype").change(function(){
			var val = $(this).val();
			
			if(val == 0){
				$("#parent_form").hide(500);
				$("#coach_form").hide(500); 
				$("#admin_form").hide(500);
				$("#std_form").show(500);
				
			}
			
			
			if(val == 1){
				$("#std_form").hide(500);
				$("#coach_form").hide(500);
				$("#admin_form").hide(500);
				$("#parent_form").show(500);
				
			}
			
			
			if(val == 2){
				$("#std_form").hide(500);
				$("#parent_form").hide(500);
				$("#admin_form").hide(500);
				$("#coach_form").show(500);
				
			}
			
			
			if(val == 3){
				$("#std_form").hide(500);
				$("#parent_form").hide(500);
				$("#coach_form").hide(500);
				$("#admin_form").show(500);
			}
			
			
		});
	 
	 </script>