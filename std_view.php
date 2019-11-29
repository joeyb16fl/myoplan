<?
	include("functions/config.php");
	$std_id = $_REQUEST["std_id"];
	$data_extra = mysql_fetch_array(mysql_query("select * from std_data where std_id=$std_id"));
	$students = "select * from std_athlete where Id=$std_id";
	$data = mysql_fetch_array(mysql_query($students));
	$doc_token = $data["std_doc_token"];
	$documents = mysql_query("select * from documents where doc_user_key='$doc_token'");
	$sport_data = mysql_fetch_array(mysql_query("select * from std_enrolled_sports where std_id=$std_id"));
?>		
		
		
		
		 
				<div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?=$data["std_name"]?></h4>
				 </div>
				 <div class="modal-body" style="padding:20px 15px 20px 15px">
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<img src="<?=$data["std_image"]?>" style="max-height:200px; width:auto"/>
							</div>
							
							
							<div class="col-md-6 col-lg-6" style="font-size:18px !important">
								<div>Age: <?=date_diff(date_create($data_extra["std_dob"]),date_create('today'))->y?> Years</div>
								<div>Height: <?
								
								function getMeasurements($cm) {
								$inches = ceil($cm/2.54);
								$feet = floor(($inches/12));
								$measurement = $feet."' ".($inches%12).'"';

								return $measurement;
							}
							
							function getlbs($kgs) {
						 		$lbs = ceil($kgs * 0.4536);
								
								return $lbs;
							}
							
							echo getMeasurements($data_extra["std_height"]);?></div>
							<div>Weight: <?=$data_extra["std_weight"]?> lb</div>
							
							<div>Email: <?=$data["std_email"]?></div>
							<div>Phone: <?=$data["std_phone"]?></div>
							<div>Parents Email: <?=$data["std_parent"]?></div>
							
							<div>Allowed By Parents: <?=($data["parent_confirm"] == 1)?"Yes":"No"?></div>
							<div>Document Status: 
								<form method="post" id="permission_form" style="display:inline-block;" action="functions/c_doc_status.php">
									<input type="hidden" value="<?=$std_id?>" name="std_id"/>
									<select onchange="document.getElementById('permission_form').submit()" id="doc_statusss" name="doc_status" data-std="<?=$std_id?>">
										<option value="0" <?=$sport_data["std_doc_status"]==0 ? "selected":"" ?>> Incomplete</option>
										<option value="1" <?=$sport_data["std_doc_status"]==1 ? "selected":"" ?>>Complete</option>
									</select>
								</form>
							</div>
							</div>
						
						</div>
						
						
						<div>
							<div class="panel-group" role="tablist"> 
								<div class="panel panel-default"> 
									<div class="panel-heading" role="tab" id="collapseListGroupHeading1"> 
										<h4 class="panel-title"> <a href="#collapseListGroup1" class="" role="button" data-toggle="collapse" aria-expanded="falaw" aria-controls="collapseListGroup1">Documents </a> </h4> </div> 
											<div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup1" aria-labelledby="collapseListGroupHeading1" aria-expanded="false"> 
												<ul class="list-group"> 
													<?while($doc = mysql_fetch_array($documents)){?>
														<li class="list-group-item"><a target="_blank" href="<?=$doc["doc_path"]?>"><?=$doc["doc_title"]?></a></li> 
													<?}?>
												</ul> 
											</div> 
									</div> 
							</div>
						 
						
						</div>
						
						
						
				  </div>
				</div>