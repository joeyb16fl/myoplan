<?php
	include("header.php");
	//session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
		exit();
	}
	$profile_identity = $_SESSION["email"];
	$result = mysql_query("select * from parent where email='$profile_identity'");
	$data = mysql_fetch_array($result);
	$students = mysql_query("select * from std_athlete where std_parent = '$profile_identity' and parent_confirm=0");
	$requests = mysql_num_rows($students);


?>

 <div class="page-header">
                <div class="container">
                    <h1 class="title"><?=$data["name"] ?></h1>
                </div>
                <!--div class="breadcrumb-box">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Profile</li>
                        </ul>
                    </div>
                </div-->
            </div>
            <!-- page-header -->
            <section id="contact-us" class="page-section">
                <div class="container">

					<section id="single_player" class="container secondary-page">
      <div class="general general-results players" >
           <div class="top-score-title right-score col-md-9" style="border:1px solid #F0F0F0;padding:15px;">
                <div class="col-md-12 atp-single-player" style="padding:15px;">


				  <div class="col-md-2 data-player" style="display:inline-block">
                                     </div>
                  <div class="col-md-3 data-player-2" style="display:inline-block">

				   </div>
				<div class="clearfix"></div>
                  <div class="rank-player" style="margin:0px auto;text-align:center;margin-top:10px;">
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

                        <div class="clearfix"></div>

           </div><!--Close Top Match-->

           <!--Right Column-->
           <div class="col-md-3 right-column">
           <div class="top-score-title col-md-12 right-title">
                <h3>Profile menu</h3>
                <ul class="last-tips">
                  <!--li><a href="">Edit profile</a></li-->
                  <li>
					  <div class="panel-group">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title" >
							  <a style="font-weight:normal;color:auto;font-size:14px;" data-toggle="collapse" href="#collapse1">Child Requests <span class="badge"><?=$requests?></a>
							</h4>
						  </div>
						  <div class="panel-body">
						  <div id="collapse1" class="panel-collapse collapse">
							<?while($std = mysql_fetch_array($students)){?>
									<a data-toggle="modal" data-target="#modal_<?=$std['Id']?>" href="#"><?=$std['std_name']?></a><br>
							<?}?>
							</div>
						  </div>
						</div>
					  </div>
				</li>
                </ul>
          </div>


          </div>
         </div></section>

				</div>
            </section><!-- page-section -->



			
			
			<?
			$students = mysql_query("select * from std_athlete where std_parent = '$profile_identity' and parent_confirm=0");
			while($std = mysql_fetch_array($students)){?>
									
									<div class="modal fade" style="z-index:89898098" id="modal_<?=$std['Id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header" style="background-color:#1c75bc;color:white !important">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Student Preview</h4>
										  </div>
										  <div class="modal-body">
											<div class="row">
												<div class="col-lg-6 col-md-6">
													<p>Name: <?=$std['std_name']?></p>
													<p>Email: <?=$std['std_email']?></p>
													<?
														$sport=$std['std_sport_for'];
													?>
													<p>sport <?=mysql_fetch_array(mysql_query("select * from sports_offered where sport_id=$sport"))['sport_title']?></p>
													
													<br/>
													<br/>
													<p>Your Child Needs your permission to complete his profile.</p>
													<form id="permission_form" action="functions/change_permission.php" method="post">
													<input type="hidden" value="<?=$std['Id']?>" name="std_id"/>
													<select onchange="document.getElementById('permission_form').submit()" name="permission" class="form-control" id="acctype">
														<option value="0">Reject</option>
														<option value="1">Allow</option>
													</select>
													</form>
												</div>
												</div>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  </div>
										</div>
									  </div>
									</div>
							<?}?>
			

			<?php
	include("footer.php");
?>
