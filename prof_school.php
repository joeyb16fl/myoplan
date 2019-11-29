<?php
	include("header.php");
	session_start();
?>

 <div class="page-header">
                <div class="container">
                    <h1 class="title"><?php echo $_SESSION["name"]; ?></h1>
                </div>
                <div class="breadcrumb-box">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- page-header -->
            <section id="contact-us" class="page-section">
                <div class="container">
						
					<section id="single_player" class="container secondary-page">
      <div class="general general-results players" >
           <div class="top-score-title right-score col-md-9" style="border:1px solid #F0F0F0;padding:15px;">
                <h3><?php echo $_SESSION["user"]; ?><span class="point-little">.</span></h3>
                <div class="col-md-12 atp-single-player">
					<div class="col-md-5">
                  <img class="img-djoko" src="img/m5.jpg" width="224" height="235" alt="">
                  </div>
				  <div class="col-md-2 data-player" style="display:inline-block">
                     <p>Birthdate:</p>
                     <p>Birthplace:</p>
                     <p>Height:</p>
                     <p>Weight:</p>
                     <p>Plays:</p>
                     
                     <p>Nicknames:</p>
                  </div>
                  <div class="col-md-3 data-player-2" style="display:inline-block">
                     <p>May 22, 1995</p>
                     <p>Texas, Mount</p>
                     <p>6' 2" (188 cm)</p>
                     <p>176 lb (80 kg)</p>
                     <p>Right-handed</p>
               
                     <p>Nole</p>
                  </div>
				<div class="clearfix"></div>
                  <div class="rank-player" style="margin:0px auto;text-align:center;margin-top:10px;">
                     <div class="content-rank"><p class="rank-data" style="font-size:20px;fon-weight:bold;">YES</p></div>
                     <p class="rank-title" style="background:#1c75bc;padding:10px;max-width:100px;color:white;font-weight:bolder;margin:0px auto;">Cut-listed</p>
                  </div>
                </div>
              <!--   <div class="col-md-12 atp-single-player skill-content">
                     <div class="exp-skill">
                            <p class="exp-title-pp">SKILLS</p>
                            <div class="skills-pp">
                            <div class="skillbar-pp clearfix" data-percent="95%">
                                <div class="skillbar-title-pp"><span>Grip   </span></div>
                                <div class="skillbar-bar-pp"></div>
                                <div class="skill-bar-percent-pp">95%</div>
                            </div>
                            <div class="skillbar-pp clearfix" data-percent="84%">
                                <div class="skillbar-title-pp"><span>Serve  </span></div>
                                <div class="skillbar-bar-pp"></div>
                                <div class="skill-bar-percent-pp">84%</div>
                            </div>
                            <div class="skillbar-pp clearfix" data-percent="65%">
                                <div class="skillbar-title-pp"><span>Forehand</span></div>
                                <div class="skillbar-bar-pp"></div>
                                <div class="skill-bar-percent-pp">65%</div>
                            </div>
                            <div class="skillbar-pp clearfix" data-percent="75%">
                                <div class="skillbar-title-pp"><span>Backhand</span></div>
                                <div class="skillbar-bar-pp"></div>
                                <div class="skill-bar-percent-pp">75%</div>
                            </div>
                        </div>
                    </div>
             </div> -->
               <div class="col-md-12 atp-single-player skill-content" style="border:1px solid #F0F0F0;padding:10px;margin-top:10px;">
                      <div class="ppl-desc">
                        <p class="exp-title-pp">Your bio</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                        standard dummy text ever since the 1500s, when an unknown printer took a gallery of type and scrambled it to make a type specimen book.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                        standard dummy text ever since the 1500s, when an unknown printer took a gallery of type and scrambled it to make a type specimen book.</p>
                    </div>
              </div>
              
              <div class="row" role="form">
                            <div class="col-md-3">
                                <span class="btn btn-default btn-file">Insurance Form <input type="file"></span>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-file">PPE Form <input type="file"></span>
                            </div>
							
							 <div class="col-md-3">
                                <span class="btn btn-default btn-file">PAPA Form <input type="file"></span>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-file">EMA Form <input type="file"></span>
                            </div>

							<div class="col-md-3">
                                <span class="btn btn-default btn-file">Media Release Form <input type="file"></span>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-file">Non-Steroid UA Form <input type="file"></span>
                            </div>
							
							 <div class="col-md-3">
                                <span class="btn btn-default btn-file">CPA Form<input type="file"></span>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-file">AR Form <input type="file"></span>
                            </div>
							<div class="col-md-3"></div>
							
							 <div class="col-md-3">
                                <span class="btn btn-default btn-file">GER Form<input type="file"></span>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-file">ATD-NU Agreement <input type="file"></span>
                            </div>
							<div class="col-md-3"></div>
                        </div>
                        <div class="clearfix"></div> 
                        <!-- .buttons-box --></form>
              
           </div><!--Close Top Match-->

           <!--Right Column-->
           <div class="col-md-3 right-column">
           <div class="top-score-title col-md-12 right-title">
                <h3>Profile menu</h3>
                <ul class="last-tips">
                  <li><a href="">Edit profile</a></li>
                  <li><a href="">Cut-list</a></li>
                  <li><a href="">Forms</a></li>
                </ul>
          </div>
          
        
          </div>
         </div></section>
				
				</div>
            </section><!-- page-section -->
			
			
			
			
			<?php
	include("footer.php");
?>
