<?php
	include("header.php");
	$_SESSION["current_page"]="athlete_profile.php";
	//session_start();
	//session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
		exit();
	}
	
	$profile_identity = $_SESSION["email"];
	$result = mysql_query("select * from std_athlete where std_email='$profile_identity'");
	$data = mysql_fetch_array($result);
	$id = $data["Id"];
	$data_extra = mysql_fetch_array(mysql_query("select * from std_data where std_id=$id"));
	
?>

 <div class="page-header">
                <div class="container">
                    <h1 class="title"><?=$data["std_name"] ?></h1>
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
						$img_url = $data['std_image'];
					?>	
					<section id="single_player" class="container secondary-page">
      <div class="general general-results players" >

           <div class="top-score-title right-score col-md-9" style="border:1px solid #F0F0F0;padding:15px;">
                <div class="col-md-12 atp-single-player" style="padding:15px;">
					<div class="col-md-5">
                  <img class="" src="<?=(!empty($data["std_image"]))? "$img_url":'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'?>" width="224" height="235" alt="">
                  </div>
				  <div class="col-md-2 data-player" style="display:inline-block">
                     <p>Birthdate:</p>
                     <p>Age: </p>
                     <p>Height:</p>
                     <p>Weight:</p>
                     <p>Position:</p>
                     <p>Grade:</p>
                  </div>
                  <div class="col-md-3 data-player-2" style="display:inline-block">
                     <p><?=$data_extra["std_dob"]?></p>
					 
					 <?
						$dob = $data_extra["std_dob"];
					 ?>
                     <p><?=date_diff(date_create("$dob"), date_create('today'))->y;?></p>
                     <p><?
							function getMeasurements($inch) {
								$inches = $inch % 12;
								$feet = floor($inch/12);
								$measurement = $feet."' ".($inches).'"';

								return $measurement;
							}
							
							function getlbs($kgs) {
								$lbs = ceil($kgs * 0.4536);
								
								return $lbs;
							}
							
							echo getMeasurements($data_extra["std_height"]);
							
					 ?> </p>
                     <p><?=$data_extra["std_weight"]?> lb (<?=getlbs($data_extra["std_weight"])?> kg)</p>
                     <p><?=$data_extra["std_position"]?></p>
                     <p><?=$data_extra["std_grade"]?></p>
               
                     
                  </div>
				<div class="clearfix"></div>
                </div>
                <div class="clearfix"></div> 
              
           </div><!--Close Top Match-->

           <!--Right Column-->
           <div class="col-md-3 right-column">
           <div class="top-score-title col-md-12 right-title">
                <h3>Profile menu</h3>
                <ul class="last-tips">
                  <li><a href="#" data-toggle="modal" data-target="#edit_profile_std">Edit Profile</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#documents-Upload">Forms</a></li>
                </ul>
          </div>
          
        
          </div>
         </div>
		 <div >
			<?
					$tbl_data = mysql_query("select * from std_enrolled_sports where std_id=$id");
			?>	
		 
		 </div>
		 <div class="clearfix"></div>
		 <div class="table-responsive" style="margin-top:15px;">
		 <h5>Sports You Are Enrolled In</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Coach</th>
            <th>Cut-listed</th>
            <th>Document Status</th>
            <th>Fee Status</th>
            <th>Download Fee Slip</th>
          </tr>
        </thead>
        <tbody>
		
			<?
				while($rowsp=mysql_fetch_array($tbl_data)){
					$sport_ID = $rowsp["sp_id"];
					$coach_code = $rowsp["std_coach_code"];
			?>
          <tr>
            <th scope="row"><?=mysql_fetch_array(mysql_query("select co_name from mop_coach where co_reg_code='$coach_code'"))["co_name"]?></th>
            <td>
				<?=($rowsp["std_cut_listed"])?"Yes":"No"?>	
			</td> 
            <td>
				<?=($rowsp["std_doc_status"])?"Complete":"Incomplete"?>	
				
			</td>
            <td>
				<?=($rowsp["std_fee_status"])?"Clear":"Pending"?>	
				
			</td>
			
			<td style="text-align:center">
				<a href="generate_fee_slip.php?sport_ID=<?=$sport_ID?>&std_id=<?=$id?>&co_key=<?=$coach_code?>"><i style="font-size:20px;" class="glyphicon glyphicon-download-alt"></i></a>	
				
			</td>
			
          </tr>
				<?}?>
         </tbody>
      </table>
    </div>
	
					<form method="post" action="register_for_sport.php" enctype="multipart/form-data">
						<div class="col-lg-6 col-md-6">
						<input type="hidden" name="std_id" value="<?=$id?>"/>
						<div class="form-group">
							<label class="control-label">Register for New Sport <span style="font-size:10px;">(Please provide add-code provided by your coach)</span></label>
							<input type="text" name="coach_code" class="form-control" ng-model="model.name" required="" value=''>
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
									$doc_key = $data['std_doc_token'];
									$documents = mysql_query("select * from documents where doc_user_key='$doc_key'");
									
									while($doc = mysql_fetch_array($documents)){
								?>
								<p><a href="<?=$doc["doc_path"]?>"> <?=$doc["doc_title"]?></a></p>
									<?}?>
						</div>
						<form method="post" action="upload_document.php" enctype="multipart/form-data">
						<input type="hidden" name="doc_token" value="<?=$data["std_doc_token"]?>">
						<input type="hidden" name="sc_id" value="<?=$data["Id"]?>">
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
						
						<form method="post" action="functions/std_basic_edit.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?=$data["Id"]?>">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Name</label>
									<input type="text" name="name" class="form-control" ng-model="model.name" required="" value='<?=$data["std_name"]?>'>
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
									<input type="text" name="phone" class="form-control" ng-model="model.name" required="" value='<?=$data["std_phone"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Address</label>
									<input type="text" name="address" class="form-control" ng-model="model.name" required="" value='<?=$data["std_address"]?>'>
								</div>	
							</div>
							<?
							$dob_tokens = explode("-",$data_extra["std_dob"]);
						?>
							
							<div class="col-lg-2 col-md-3">
								<div class="form-group">
									<label class="control-label">Month</label>
									<input type="text" name="dob_m" class="form-control" ng-model="model.name" required="" value='<?=$dob_tokens[1]?>'>
								</div>	
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="form-group">
									<label class="control-label">Day</label>
									<input type="text" name="dob_d" class="form-control" ng-model="model.name" required="" value='<?=$dob_tokens[2]?>'>
								</div>	
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="form-group">
									<label class="control-label">Year of Birth</label>
									<input type="text" name="dob_y" class="form-control" ng-model="model.name" required="" value='<?=$dob_tokens[0]?>'>
								</div>	
							</div>
							
							<?
							
							$height = $data_extra["std_height"];
							$feet = (int)($height/12);
							$inches = (int)($height % 12);
							
							?>
							<div class="col-lg-2 col-md-2">
								<div class="form-group">
									<label class="control-label">Height (feet)</label>
									<select  name="height-f" class="form-control" ng-model="model.name" required="">
										<option value="4" <?=($feet==4)?'selected':''?>>4</option>
										<option value="5" <?=($feet==5)?'selected':''?>>5</option>
										<option value="6" <?=($feet==6)?'selected':''?>>6</option>
										<option value="7" <?=($feet==7)?'selected':''?>>7</option>
									
									
									</select>
								</div>	
							</div>
							
							<div class="col-lg-2 col-md-2">
								<div class="form-group">
									<label class="control-label">Height (inches)</label>
									<select  name="height-i" class="form-control" ng-model="model.name" required="">
										<option value="0" <?=($inches==0)?'selected':''?>>0</option>
										<option value="1" <?=($inches==1)?'selected':''?>>1</option>
										<option value="2" <?=($inches==2)?'selected':''?>>2</option>
										<option value="3" <?=($inches==3)?'selected':''?>>3</option>
										<option value="4" <?=($inches==4)?'selected':''?>>4</option>
										<option value="5" <?=($inches==5)?'selected':''?>>5</option>
										<option value="6" <?=($inches==6)?'selected':''?>>6</option>
										<option value="7" <?=($inches==7)?'selected':''?>>7</option>
										<option value="8" <?=($inches==8)?'selected':''?>>8</option>
										<option value="9" <?=($inches==9)?'selected':''?>>9</option>
										<option value="10" <?=($inches==10)?'selected':''?>>10</option>
										<option value="11" <?=($inches==11)?'selected':''?>>11</option>
										</select>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Weight(lbs)</label>
									<input type="text" name="weight" class="form-control" ng-model="model.name" required="" value='<?=$data_extra["std_weight"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Grade</label>
									<input type="text" name="grade" class="form-control" ng-model="model.name" required="" value='<?=$data_extra["std_grade"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" name="pwd1" class="form-control" ng-model="model.name" required="" value='<?=$data["std_pwd"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Confirm Password</label>
									<input type="password" name="pwd2" class="form-control" ng-model="model.name" required="" value='<?=$data["std_pwd"]?>'>
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputFile1">Choose Profile Picture</label>
							<input style="opacity:0;position:absolute;" type="file"  accept="image/gif, image/jpeg, image/png" name="p_image" id="exampleInputFile1"/>
							<p class="help-block"></p>
							<br>
							<?
								$img_url1 = $data["std_image"];
							?>
							<div style="height:150px;width:150px;overflow:hidden;position:relative;border-radius:10px">
							<img id="p_image" src="<?=($data["std_image"])? "$img_url1":'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'?>" style="height:150px;width:auto;cursor:pointer"/>
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
							</script>			
			<?php
	include("footer.php");
?>
