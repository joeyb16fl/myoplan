<?
	include("functions/config.php");
	$cid = $_REQUEST["cid"];
	$coaches = "select * from mop_coach where id=$cid";
	$data = mysql_fetch_array(mysql_query($coaches));
	$doc_token = $data["co_doc_token"];
	$documents = mysql_query("select * from documents where doc_user_key='$doc_token'");
?>		
		
		
		
		 
				<div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?=$data["co_name"]?></h4>
				 </div>
				 <div class="modal-body" style="padding:20px 15px 20px 15px">
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<img src="<?=$data["image"]?>" style="max-height:200px; width:auto"/>
							</div>
							
							
							<div class="col-md-6 col-lg-6" style="font-size:18px !important">
							<div>Name: <?=$data["co_name"]?></div>
							<div>Username: <?=$data["username"]?></div>
							<div>Email: <?=$data["co_email"]?></div>
							<div>Phone: <?=$data["co_phone"]?></div>
							<div>Registration Code: <?=$data["co_reg_code"]?></div>
							
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