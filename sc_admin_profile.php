<?php
	include("header.php");
	$_SESSION["current_page"]="sc_admin_profile.php";
	//session_start();
	//session_start();
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
		exit();
	}
	
	$profile_identity = $_SESSION["email"];
	$result = mysql_query("select * from sc_admin where email='$profile_identity'");
	$data = mysql_fetch_array($result);
	$id = $data["id"];
	
	
?>

 <div class="page-header">
                <div class="container">
                    <h1 class="title" style="display:inline-block;"><?=$data["name"] ?></h1>
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
					<section id="single_player" class="container-fluid secondary-page">
      <div class="general general-results players" >

           <div class="top-score-title right-score col-md-9" style="border:1px solid #F0F0F0;padding:15px;">
				 
                <form method="post" action="addcoach_basic.php" id="myregform" style="display:none;" enctype="multipart/form-data">
						<h5>Add New Coach</h5>
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
							<label class="control-label">Address<span style="font-size:10px;"></span></label>
							<input name="address" class="game_select form-control" type="text" ng-model="model.name" required=""/>
									
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
		 <h5>Registered Coaches</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Username</th>
			<th>Email</th>
            <th>Phone</th>
            <th>Registration Code</th>
            <th>Registered Teams</th>
            
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
		
			<?
				$sc_code = $data["id"];
				$tbl_data = mysql_query("select * from mop_coach where admn_id=$sc_code");
				while($rowsp=mysql_fetch_array($tbl_data)){
					//$game_ID = $rowsp["sp_id"];
					//$coach_code = $rowsp["std_coach_code"];
			?>
          <tr>
            <td><?=$rowsp["co_name"]?></td>
            <td><?=$rowsp["username"]?></td>
            <td><?=$rowsp["co_email"]?></td>
            <td><?=$rowsp["co_phone"]?></td>
            <td><?=$rowsp["co_reg_code"]?></td>
            <td><?
					$c_a_id = $rowsp["co_reg_code"];
					
					echo mysql_num_rows(mysql_query("select * from teams where team_coach_code='$c_a_id'"));
			?></td>
            <td style="text-align:center;"><a href="remove_coach.php?id=<?=$rowsp["id"]?>"><i class="fa fa-close"></i></a> <a class="mycsvclass" style="padding:0px 10px;" href="#" data-coach="<?=$rowsp["id"]?>"><i class="fa fa-expand"></i></a>	</td>
			
            
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
                <h3>Profile Menu</h3>
                <ul class="last-tips"> 
                  <li><a href="#" data-toggle="modal" data-target="#edit_profile_std">Edit Profile</a></li>
                  <li><a  id="myadmin" style="text-decoration:none;cursor:pointer">Add New Coach</a></li>
				  
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
						
						<form method="post" action="admn_edit.php" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?=$data["id"]?>">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Name</label>
									<input type="text" name="name" class="form-control" ng-model="model.name" required="" value='<?=$data["name"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label" disabled>Email</label>
									<input type="email" disabled name="email" class="form-control" ng-model="model.name" required="" value='<?=$data["email"]?>'>
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
									<input type="text" name="phone" class="form-control" ng-model="model.name" required="" value='<?=$data["phone"]?>'>
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
									<input type="password" name="pwd1" class="form-control" ng-model="model.name" required="" value='<?=$data["pwd"]?>'>
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="control-label">Confirm Password</label>
									<input type="password" name="pwd2" class="form-control" ng-model="model.name" required="" value='<?=$data["pwd"]?>'>
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
			var data_to_load = $(this).data("coach");
			$.ajax({
											url: 'coach_view.php?cid=' + data_to_load,
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
