<?php
	include("header.php");
	//session_start();
	
	$profile_identity = $_SESSION["email"];
	$result = mysql_query("select * from mop_coach where co_email='$profile_identity'");
	$data = mysql_fetch_array($result);
	$id = $data["id"];
	$reg_code = $data["co_reg_code"];
	
	$teams = mysql_query("select * from teams where team_coach_code='$reg_code'");
	
	
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
					<a class="btn btn-default" href="<?=$_SESSION["current_page"]?>">Back</a>
					<div class="panel-group" id="accordion" style="margin-top:15px;" role="tablist" aria-multiselectable="false">
					
						<?
							while($team = mysql_fetch_array($teams)){
						?>
						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
							  <h3 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?=str_replace(" ","_",$team["team_name"])?>" aria-expanded="false" aria-controls="<?=str_replace(" ","_",$team["team_name"])?>">
									<?=$team["team_name"]?>
								</a>
							  </h3>
							</div>
							<div id="<?=str_replace(" ","_",$team["team_name"])?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							  <div class="panel-body">
										<div class="table-responsive" style="margin-top:15px;">
										  <table class="table table-bordered">
											<thead>
											  <tr>
												<th>Name</th>
												<th>Age</th>												
												<th>Document Status</th>
												<th>Fee Status</th>
												
												<th>Action</th>
											  </tr>
											</thead>
											<tbody>
											
												<?
													$tid = $team["id"];
													$enrolled_students = mysql_query("select * from std_athlete  where Id in(select std_id from team_members where team_id=$tid)");
													
													while($rowsp=mysql_fetch_array($enrolled_students)){
														$std_id_student = $rowsp["Id"];
														$sport_data = mysql_fetch_array(mysql_query("select * from std_enrolled_sports where std_id=$std_id_student"));
														
												?>
											  <tr>
												
												<td scope="row"> <?=$rowsp["std_name"]?></td>
												
												<td><?=date_diff(date_create(mysql_fetch_array(mysql_query("select std_dob from std_data where std_id=$std_id_student"))["std_dob"]),date_create('today'))->y?></td>
											
												
											   
												
												 <td>
													<?=($sport_data["std_doc_status"])?"Complete":"Uncomplete"?>	
													
												</td>
												<td>
													<?=($sport_data["std_fee_status"])?"Clear":"Pending"?>	
													
												</td> 
												
												<td style="text-align: center; vertical-align: middle;">
													<a style="font-size:20px !important;" class="mycsvclass" href="#" data-student="<?=$std_id_student?>"><i class="glyphicon glyphicon-resize-full"></i></a>	
													
												</td>
												
											  </tr>
													<?}?>
											 </tbody>
										  </table>
    </div>
										
										
										
							  </div>
							</div>
						  </div>
						 
							
							
							<?
							
							}?>
					</div>
					
				
				
				
				
				</div>
			</section>
			
			
			
			
			
			
			
			<div style="z-index:10004234234;padding:30px;" class="modal fade bs-example-modal-lg" tabindex="-1" id="profile_data_model" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div id="std_data_content" class="modal-dialog modal-lg" role="document">
				 
			  </div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
<script>							
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
			<?php
	include("footer.php");
?>
