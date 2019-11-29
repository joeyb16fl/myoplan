<?php
	include("header.php");
	//session_start();
	$_SESSION["current_page"]="coach_profile.php";
	$profile_identity = $_SESSION["email"];
	$result = mysql_query("select * from mop_coach where co_email='$profile_identity'");
	$data = mysql_fetch_array($result);
	$id = $data["id"];
	$reg_code = $data["co_reg_code"];
	$data_extra = mysql_fetch_array(mysql_query("select * from std_data where std_id=$id"));
	$coach_codes = $data['co_reg_code'];
	$students = "select * from std_athlete where Id in(select std_id from std_enrolled_sports where std_coach_code='$reg_code')";
	$enrolled_students = mysql_query($students);
	
?>
 
 <div class="page-header">
                <div class="container">
                    <h1 class="title"><?=$data["co_name"] ?> </h1>
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
					<?
						$img_url = $data['image'];
					?>	
					<section id="single_player" class="container secondary-page">
      <div class="general general-results players" >

           <div class="top-score-title right-score col-md-9" style="border:1px solid #F0F0F0;padding:15px;">
                <div class="col-md-12 atp-single-player" style="padding:15px;">
					<div class="col-md-5">
                  <img class="" src="<?=(!empty($data["image"]))? "$img_url":'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'?>" width="224" height="235" alt="">
                  </div>
				  <div class="col-md-2 data-player" style="display:inline-block">
                     <p>Birthdate:</p>
                     <p>Age: </p>
                     <p>Sport: </p>
                     <p>Reg Code: </p>
					 
                  </div>
                  <div class="col-md-3 data-player-2" style="display:inline-block">
                     <p><?=$data["co_dob"]?></p>
					 
					 <?
						$dob = $data["co_dob"];
					 ?>
                     <p><?=date_diff(date_create("$dob"), date_create('today'))->y;?></p>
                     <p><?
							$ad_id = $data["admn_id"];
							$sport_id = mysql_fetch_array(mysql_query("select sport from sc_admin where id=$ad_id"))["sport"];
						
							echo ucwords(mysql_fetch_array(mysql_query("select sport_title from sports_offered where id=$sport_id"))["sport_title"]);
					 
					 ?></p>
					 <p><?=$data["co_reg_code"]?></p>
                     
                  </div> 
				<div class="clearfix"></div>
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
                  <li><a href="#" data-toggle="modal" data-target="#edit_profile_std">Edit Profile</a></li>
                  <li><a href="coach_teams.php?coach_id=<?=$data["id"]?>">View Teams</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#documents-Upload">Forms</a></li>
                </ul>
          </div>
          
        
          </div>
         </div>
		
			<?
					$tbl_data = mysql_query("select * from std_enrolled_sports where std_id=$id");
			?>	
		 
		 
		 <div class="clearfix"></div>
		 
		 
		 <div class="table-responsive" style="margin-top:15px;">
		 <h5>Your Enrolled Students</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Weight (lb)</th>
            <th>Height</th>
            
            <th>Document Status</th>
            <th>Fee Status</th>
			
			<th>Action</th>
			<th>Cut-list</th>
          </tr>
        </thead>
        <tbody>
		
			<?
				while($rowsp=mysql_fetch_array($enrolled_students)){
					$coach_code = $rowsp["std_coach_code"];
					$std_id_student = $rowsp["Id"];
					$sport_data = mysql_fetch_array(mysql_query("select * from std_enrolled_sports where std_id=$std_id_student"));
					$std_data = mysql_fetch_array(mysql_query("select * from std_data where std_id=$std_id_student"));
			?>
          <tr>
            
            <td scope="row"> <?=$rowsp["std_name"]?></td>
			
            <td><?=date_diff(date_create(mysql_fetch_array(mysql_query("select std_dob from std_data where std_id=$std_id_student"))["std_dob"]),date_create('today'))->y?></td>
		
			
           
            <td>
				<?=$std_data["std_weight"]?>	
				
			</td>
            <td>
				<?
				
					$feet = (int)($std_data["std_height"] / 12);
					$inc = (int)($std_data["std_height"] % 12);
					echo $feet . '" ' . $inc . "'";
				?>	
				
			</td>
             <td>
				<?=($sport_data["std_doc_status"])?"Complete":"Incomplete"?>
				
			</td>
            <td>
				<?=($sport_data["std_fee_status"])?"Clear":"Pending"?>	
				
			</td> 
			
			<td style="text-align: center; vertical-align: middle;">
				<a style="font-size:20px !important;" class="mycsvclass" href="#" data-student="<?=$std_id_student?>"><i class="glyphicon glyphicon-resize-full"></i></a>	
				
			</td>
			<td style="text-align: center; vertical-align: middle;">
				<input <?=($sport_data["std_cut_listed"])?"checked":""?> type="checkbox" style="height:15px;width:15px;border-radius:1px;box-sizing: border-box" name="report_myTextEditBox" data-std="<?=$rowsp["Id"]?>" data-coach="<?=$coach_codes?>" value="<?=($sport_data["std_cut_listed"])?"checked":""?>" class="cut_list_class">
			</td>
			
          </tr> 
				<?}?>
         </tbody>
      </table>
    </div>
	<form method="post" action="finalize_team.php" enctype="multipart/form-data">
						<div class="col-lg-6 col-md-6">
						<input type="hidden" name="coach_code" value="<?=$reg_code?>"/>
						<div class="form-group">
							<label class="control-label">Finalize Roster<span style="font-size:10px;">(Kindly provide team name you want to create)</span></label>
							<input type="text" name="team_name" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
						</div>
					</form>	
		 </section>
				
				</div>
            </section><!-- page-section -->
			
			
			<div style="z-index:10004234234;padding:30px;" class="modal fade bs-example-modal-lg" tabindex="-1" id="documents-Upload" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 class="modal-title" id="myModalLabel">Upload Documents</h2>
				 </div>
				 <div class="modal-body">
						<div>
								<?
									$doc_key = $data['co_doc_token'];
									$documents = mysql_query("select * from documents where doc_user_key='$doc_key'");
									
									while($doc = mysql_fetch_array($documents)){
								?>
								<p><a href="<?=$doc["doc_path"]?>"> <?=$doc["doc_title"]?></a></p>
									<?}?>
						</div>
						<form method="post" action="upload_document.php" enctype="multipart/form-data">
						<input type="hidden" name="doc_token" value="<?=$data["co_doc_token"]?>">
						<input type="hidden" name="sc_id" value="<?=$data["id"]?>">
						<div class="form-group">
							<label class="control-label">Document Title</label>
							<input type="text" name="doc_title" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						<div class="form-group">
							<label for="exampleInputFile">Choose Document File</label>
							<input type="file" required="" name="document" id="exampleInputFile">
							<p class="help-block"></p>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
			
			
			
			
			<div style="z-index:10004234234;padding:30px;" class="modal fade bs-example-modal-lg" tabindex="-1" id="edit_profile_std" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				 <div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 class="modal-title" id="myModalLabel">Edit Profile</h2>
				 </div>
				 <div class="modal-body">
						
						<form method="post" action="functions/coach_edit.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?=$data["id"]?>">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Name</label>
									<input type="text" name="name" class="form-control" ng-model="model.name" required="" value='<?=$data["co_name"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label" disabled>Email</label>
									<input type="email" disabled name="txt" class="form-control" ng-model="model.name" required="" value='<?=$data["co_email"]?>'>
									<input type="hidden" name="email" value="<?=$data["co_email"]?>">
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Username</label>
									<input type="text" name="username" class="form-control" ng-model="model.name" required="" value='<?=$data["username"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Phone</label>
									<input type="text" name="phone" class="form-control" ng-model="model.name" required="" value='<?=$data["co_phone"]?>'>
								</div>	
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label class="control-label">Address</label>
									<input type="text" name="address" class="form-control" ng-model="model.name" required="" value='<?=$data["co_address"]?>'>
								</div>	
							</div>
							<?
							$dob_tokens = explode("-",$data["co_dob"]);
						?>
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label class="control-label">Year of Birth</label>
									<input type="text" name="dob_y" class="form-control" ng-model="model.name" required="" value='<?=$dob_tokens[0]?>'>
								</div>	
							</div>
							<div class="col-lg-2 col-md-3">
								<div class="form-group">
									<label class="control-label">Month</label>
									<input type="text" name="dob_m" class="form-control" ng-model="model.name" required="" value='<?=$dob_tokens[1]?>'>
								</div>	
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="form-group">
									<label class="control-label">Date</label>
									<input type="text" name="dob_d" class="form-control" ng-model="model.name" required="" value='<?=$dob_tokens[2]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" name="pwd1" class="form-control" ng-model="model.name" required="" value='<?=$data["co_pwd"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Confirm Password</label>
									<input type="password" name="pwd2" class="form-control" ng-model="model.name" required="" value='<?=$data["co_pwd"]?>'>
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputFile1">Choose Profile Picture</label>
							<input style="opacity:0;position:absolute;" type="file"  accept="image/gif, image/jpeg, image/png" name="p_image" id="exampleInputFile1"/>
							<p class="help-block"></p>
							<br>
							 <?
								$img_url1 = $data["image"];
							?>
							<div style="height:150px;width:150px;overflow:hidden;position:relative;border-radius:10px">
							<img id="p_image" src="<?=($data["image"])? "$img_url1":'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'?>" style="height:150px;width:auto;cursor:pointer"/>
								<div id="overlay" style="border-radius:10px;padding:50px;cursor:pointer;width:100%;height:100%;top:0;left:0;display:none;position:absolute;background:rgba(0,0,0,0.7);z-index:112887289">
									<span><i class="glyphicon glyphicon-edit" style="font-size:50px;color:rgb(100,100,100)"></i></span>
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
			
			
			
			
			
			
			
			
			<div style="z-index:10004234234;padding:30px;" class="modal fade bs-example-modal-lg" tabindex="-1" id="profile_data_model" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div id="std_data_content" class="modal-dialog modal-lg" role="document">
				 
			  </div>
			</div>
			
		   

<script>
	$(".mycsvclass").on("click", function(e) {
		e.preventDefault();
			var data_to_load = $(this).data("student");
			$.ajax({
											url: 'std_view.php?std_id=' + data_to_load,
											type: "GET",
											success: function(data){
												//alert("success " + data);
												$("#std_data_content").html(data);
												$("#profile_data_model").modal("show");
											  
											},
											error: function(data){
											  alert("Unable to load data");
											}
										
									}); 
			
    
});


</script>























		
<script>
								function readURL(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function (e) {
											$('#p_image').attr('src', e.target.result);
										}

										reader.readAsDataURL(input.files[0]);
									}
								}

								$("#exampleInputFile1").change(function(){
									readURL(this);
								});
								$("#overlay").click(function(e){
									e.preventDefault();
									$("#exampleInputFile1").click();
									
								});
								$('#p_image').hover(
								  function () {
									$("#overlay").show();
								  }
								);
								$("#overlay").mouseleave(function(){
									$(this).hide();
								});
								
								
								$(".cut_list_class").change(function(e){
									e.preventDefault();
									var f = $(this).data("std");
									var fs = $(this).data("coach");
									$.ajax({
											url: 'update_status.php?std_id=' + f + '&coach=' + fs,
											type: "GET",
											success: function(data){
												//alert(data);
											  
											},
											error: function(data){
											  alert("Unable to change Status. \n Some error occured");
											}
										
									}); 
								});
								
								
							</script>			
			<?php
	include("footer.php");
?>
