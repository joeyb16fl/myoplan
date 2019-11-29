<?php
	include("header.php");
?>

 <div class="page-header">
                <div class="container">
                    <h1 class="title">Contact Us</h1>
                </div>
                <div class="breadcrumb-box">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- page-header -->
            <section id="contact-us" class="page-section">
                <div class="container">
					<div class="row">
                        <div class="col-sm-6 col-md-8">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									<h5 class="title"><i class="icon-phone10 text-color"></i> Phone</h5>
									<div>(844) 2000-MYO (200-0696)</div>
									
								</div>
								<div class="col-sm-6 col-md-6">
									<h5 class="title"><i class="icon-envelope7 text-color"></i> Email</h5>
									<div>Product Info: <b>info@myoplansports.com</b><br> 
										Schedule a demo: <b>demo@myoplansports.com</b> <br>
										Technical Support: <b>support@myoplansports.com</b> </div>
									
								</div>
							</div>
							<hr>
							MyoPlan Sports is aimed at keeping sports fun by taking care of all the hard stuff for you. </p>
							<p>MyoPlan Sports is the ultimate athletic registration software for gyms, recreation centers, youth leagues, personal trainers, church leagues, and school athletic programs.  We exist to allow you to build rosters and register your athletes in a cost and time efficient manner. </p> <hr>
							<p>MyoPlan's core features include a Registration Tool and a Roster Builder. </p>
							<p>Our current features are available for our August 2018 launch.  We also have an eye on the future and have many state-of-the-art features scheduled for future release.  </p>
							
						</div>
						<div class="col-md-6 col-md-4">							
							<h3 class="title">Schedule <span style="text-transform:none !important">a</span> Demo</h3>
							<p class="form-message" style="display: none;"></p>
							<div class="contact-form">
								<!-- Form Begins -->
								<form role="form" name="contact-form" id="contact-form" method="post" action="contact_form/contact_process.php">
										
										<div class="input-text form-group">
											<input type="text" name="first_name" class="input-name form-control" placeholder="First Name" />
										</div>
										<div class="input-text form-group">
											<input type="text" name="contact_lname" class="input-name form-control" placeholder="Last Name" />
										</div>
										
										<div class="input-text form-group">
											<input type="text" name="contact_oname" class="input-name form-control" placeholder="Organization" />
										</div>								
										
										<div class="input-email form-group">
											<input type="text" name="contact_phone" class="input-phone form-control" placeholder="Phone"/>
										</div>
										<div class="input-email form-group">
											<input type="email" name="contact_email" class="input-email form-control" placeholder="Email"/>
										</div>
										
		
										<div class="textarea-message form-group">
											<textarea name="contact_message" class="textarea-message form-control" placeholder="Message" rows="2" ></textarea>
										</div>
										<!-- Button -->
										<button class="btn btn-default" type="submit">Send Now <i class="icon-paper-plane"></i></button>
									</div>
								</form>
								<!-- Form Ends -->
							</div>
					</div>
                </div>
            </section><!-- page-section -->
			
			
			
			
			<?php
	include("footer.php");
?>
