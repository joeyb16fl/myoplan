<?
	include("functions/config.php");
	$aid = $_REQUEST["aid"];
	$admins = "select * from sc_admin where id=$aid";
	$data = mysql_fetch_array(mysql_query($coaches));
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
						
						
						
				  </div>
				</div>