<?php
	include("header.php");
	//session_start();
	//session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
		exit();
	}
	
	$profile_identity = $_SESSION["email"];
	$result = mysql_query("select * from reg_schools where sc_email='$profile_identity'");
	$data = mysql_fetch_array($result);
	$id = $data["id"];
	
	
?>

 <div class="page-header" style="padding-bottom:0px;">
                <div class="container" style="padding-bottom:0px;margin-bottom:-55px;">
                    <img src="admin/<?=$data["sc_logo"]?>" style="max-width:200px;height:auto;display:inline-block"/><h1 class="title" style="display:inline-block;"><?=$data["sc_name"] ?></h1>
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
                <div class="container-fluid">
					<?
						$img_url = $data['sc_image'];
					?>	
					<section id="single_player" class="container-fluid secondary-page">
      <div class="general general-results players" >

           <div class="top-score-title right-score col-md-9" style="border:1px solid #F0F0F0;padding:15px;">
				
                <form method="post" action="add_sc_admin.php" id="myregform" style="display:none;" enctype="multipart/form-data">
						<h5>Add New Admin</h5>
						<input type="hidden" name="sc_id" value="<?=$id?>"/>
						<div class="col-lg-6 col-md-6 form-group">
							<label class="control-label">Name <span style="font-size:10px;"></span></label>
						 	<input type="text" name="name" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						<div class="col-lg-6 col-md-6 form-group">
							<label class="control-label">Email <span style="font-size:10px;"></span></label>
							<input type="email" name="email" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						<div class="col-lg-6 col-md-6 form-group">
							<label class="control-label">Username <span style="font-size:10px;"></span></label>
							<input type="text" name="username" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						<div class="col-lg-6 col-md-6 form-group">
							<label class="control-label">Phone <span style="font-size:10px;"></span></label>
							<input type="text" name="phone" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						
						<div class="col-lg-6 col-md-6 form-group">
							<label class="control-label">Sport<span style="font-size:10px;"></span></label>
							<select name="sport" class="sport_select form-control" ng-model="model.name" required="">
									<script>
									$(".sport_select").load("sports_list.php");
									</script>

							</select>
						</div>	
						<div class="col-lg-6 col-md-6 form-group">
							<label class="control-label">Password <span style="font-size:10px;"></span></label>
							<input type="password" pattern=".{8,20}"  title="8 to 20 characters"  name="password" class="form-control" ng-model="model.name" required="" value=''>
						</div>	
						<div class="clearfix"></div>
						<div class="col-lg-6 col-md-6 form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							
							<button role="button"  class="btn btn-primary cbutton">Cancel</button>
						</div>
					</form>	
				
				
				<div class="col-md-12 atp-single-player "  id="mytable1" style="padding:15px;">
						<div class="table-responsive" style="margin-top:15px;">
		 <h5>Registered Admins</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Username</th>
			<th>Email</th>
            <th>Phone</th>
            <th>Sport</th>
            <th>Registered Coaches</th>
            
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
		
			<?
				$sc_code = $data["id"];
				$tbl_data = mysql_query("select * from sc_admin where sc_id=$sc_code");
				while($rowsp=mysql_fetch_array($tbl_data)){
					//$sport_ID = $rowsp["sp_id"];
					//$coach_code = $rowsp["std_coach_code"];
			?>
          <tr>
            <td><?=$rowsp["name"]?></td>
            <td><?=$rowsp["username"]?></td>
            <td><?=$rowsp["email"]?></td>
            <td><?=$rowsp["phone"]?></td>
            <td><?
					$sport_id = $rowsp["sport"];
					echo ucwords(mysql_fetch_array(mysql_query("select sport_title from sports_offered where id=$sport_id"))["sport_title"]);
			?></td>
            <td><?
					$c_a_id = $rowsp["id"];
					
					echo mysql_num_rows(mysql_query("select * from mop_coach where admn_id=$c_a_id"));
			?></td>
            <td style="text-align:center;"><a href="remove_admin.php?id=<?=$rowsp["id"]?>" style="font-size:20px;font-weight:bold;"><i class="fa fa-close"></i></a>	</td>
			
            
          </tr>
				<?}?>
         </tbody>
      </table>
    </div>
                </div>
                <div class="clearfix"></div> 
              
           </div><!--Close Top Match-->

           <!--Right Column-->
           <div class="col-md-3 right-column">
           <div class="top-score-title col-md-12 right-title">
                <h3>Profile menu</h3>
                <ul class="last-tips">
                  <li><a href="#" data-toggle="modal" data-target="#edit_profile_std">Edit Profile</a></li>
                  <li><a  id="myadmin" style="text-decoration:none;cursor:pointer">Add New Admin</a></li>
				  
				  <script>
					
						$(document).ready(function(){
							$("#myadmin").on('click',function(){
								$("#mytable1").hide(500);
								$("#myregform").show(500);
							});
							
							$(".cbutton").on('click',function(e){
								e.preventDefault();
								$("#mytable1").show(500);
								$("#myregform").hide(500);
							});
						});
				  
				  </script>
                  <li><a href="#" data-toggle="modal" data-target="#documents-Upload">Forms</a></li>
                </ul>
          </div>
          
        
          </div>
         </div>
		 
		 <div class="clearfix"></div>
		 
	
					
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
									$doc_key = $data['doc_token'];
									$documents = mysql_query("select * from documents where doc_user_key='$doc_key'");
									
									while($doc = mysql_fetch_array($documents)){
								?>
								<p><a href="<?=$doc["doc_path"]?>"> <?=$doc["doc_title"]?></a></p>
									<?}?>
						</div>
						<form method="post" action="upload_document.php" enctype="multipart/form-data">
						<input type="hidden" name="doc_token" value="<?=$data["doc_token"]?>">
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
						
						<form method="post" action="functions/sc_basic_edit.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?=$data["id"]?>">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">School Name</label>
									<input type="text" name="name" class="form-control" ng-model="model.name" required="" value='<?=$data["sc_name"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" name="email" class="form-control" ng-model="model.name" required="" value='<?=$data["sc_email"]?>'>
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
									<input type="text" name="phone" class="form-control" ng-model="model.name" required="" value='<?=$data["sc_phone"]?>'>
								</div>	
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<label class="control-label">Address</label>
									<input type="text" name="address" class="form-control" ng-model="model.name" required="" value='<?=$data["address"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" name="pwd1" class="form-control" ng-model="model.name" required="" value='<?=$data["sc_pwd"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Confirm Password</label>
									<input type="password" name="pwd2" class="form-control" ng-model="model.name" required="" value='<?=$data["sc_pwd"]?>'>
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputFile1">Choose Logo Image</label>
							<input style="opacity:0;position:absolute;" type="file"  accept="image/gif, image/jpeg, image/png" name="p_image" id="exampleInputFile1"/>
							<p class="help-block"></p>
							<br>
							<?
								$img_url1 = $data["sc_logo"];
							?>
							<div style="height:150px;width:150px;overflow:hidden;position:relative;border-radius:10px">
							<img id="p_image" src="<?=($data["sc_logo"])? "admin/$img_url1":'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png'?>" style="height:150px;width:auto;cursor:pointer"/>
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
			
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
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

<script>
$(document).ready(function(){
    var tab = $('table').DataTable();
	new $.fn.dataTable.Buttons( tab, {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );



$(".mycsvclass").on("click", function(e) {
		e.preventDefault();
			var data_to_load = $(this).data("admin");
			$.ajax({
											url: 'admin_view.php?aid=' + data_to_load,
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
});
 
</script>							
			<?php
	include("footer.php");
?>
