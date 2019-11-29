<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?
	include("includes/header.php");

?>

        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Myoplan Dashboard</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
			<?
				if(isset($_SESSION["status"]) && $_SESSION["status"] === 1){
					unset($_SESSION["status"]);
			
			?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  <strong>Success!</strong> Successfully updated
			</div>
			<?}else if(isset($_SESSION["status"]) && $_SESSION["status"] == 0){
					unset($_SESSION["status"]);
			?>
				
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  <strong>Error!</strong> Something went wrong, Please Try again
			</div>
			<?}else if(isset($_SESSION["status"]) && $_SESSION["status"] == 2){
					unset($_SESSION["status"]);
			?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  <strong>Error!</strong> Sport with same name is already registered
			</div>
			<?}?>
	
    </div>
   <div class="panel-body1">
	<h2>Offered Sports</h2>
	<div class="table-responsive">
		
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" dragable="true">
		
		<?
				$sports = mysql_query("select * from sports_offered");
				
				while($sport = mysql_fetch_array($sports)){
		
		?>
  <div class="panel panel-default" draggable="true">
    <div class="panel-heading" role="tab" id="<?=str_replace(' ','',$sport["sport_title"])?>1">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?=str_replace(' ','',$sport["sport_title"])?>" aria-expanded="false" aria-controls="<?=str_replace(' ','',$sport["sport_title"])?>">
          <?=ucwords($sport["sport_title"])?>
        </a>
      </h4>
    </div>
    <div id="<?=str_replace(' ','',$sport["sport_title"])?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?=str_replace(' ','',$sport["sport_title"])?>1">
		  <div class="panel-body" style="padding:15px;">
		  
					<div>

						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home<?=str_replace(' ','',$sport["sport_title"])?>" aria-controls="home<?=str_replace(' ','',$sport["sport_title"])?>" role="tab" data-toggle="tab">Sport Positions</a></li>
							<li role="presentation"><a href="#profile<?=str_replace(' ','',$sport["sport_title"])?>" aria-controls="profile<?=str_replace(' ','',$sport["sport_title"])?>" role="tab" data-toggle="tab">Sport Settings</a></li>
							<li role="presentation"><a href="#messages<?=str_replace(' ','',$sport["sport_title"])?>" aria-controls="messages<?=str_replace(' ','',$sport["sport_title"])?>" role="tab" data-toggle="tab">Enrolled Students In This Sport</a></li>
							<li role="presentation"><a href="#settings<?=str_replace(' ','',$sport["sport_title"])?>" aria-controls="settings<?=str_replace(' ','',$sport["sport_title"])?>" role="tab" data-toggle="tab">Registered Coaches Of Sport</a></li>
							<li role="presentation"><a href="#teams<?=str_replace(' ','',$sport["sport_title"])?>" aria-controls="teams<?=str_replace(' ','',$sport["sport_title"])?>" role="tab" data-toggle="tab">Teams of Sport</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home<?=str_replace(' ','',$sport["sport_title"])?>">
									<!-- Sport Positions are listed in this tab and can add more from here -->
									<?
										$_id = $sport["id"];
										$positions = mysql_query("select * from sport_positions where g_id=$_id");
										while($position = mysql_fetch_array($positions)){
											
									?>
									<span style="padding:10px;background:blue;border-radius:10px;color:white;font-size:25px;border-radius:25px;"><?=$position["position"]?> &nbsp;&nbsp;&nbsp;<a class="del_pos" style="color:white !important;font-size:25px;cursor:pointer;text-decoration:none" data-pos="<?=$position["id"]?>" data-sport="<?=$_id?>"> &times;</a></span>
									<?}?>
									<div class="clearfix"></div>
									<h3 style="margin-top:20px;">Add Position</h3>
									<form action="add_pos.php" method="post">
										<input type="hidden" value="<?=$_id?>" name="sport"/>
										 <fieldset>
										 <div class="form-group">
											  <label class="control-label">Position title</label>
											  <input type="text" name="position" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value=''>
										</div>
										</fieldset>
										<button type="submit" class="btn btn-primary">Submit</button>
									
									</form>
									
							</div>
							<div role="tabpanel" class="tab-pane" id="profile<?=str_replace(' ','',$sport["sport_title"])?>">
							<h3 style="margin-top:20px;">Update Fee</h3>
								<form action="fee_update.php" method="post">
										<input type="hidden" value="<?=$_id?>" name="sport"/>
										 <fieldset>
										 <div class="form-group">
											  <label class="control-label">Enter Fee of Sport</label>
											  <input type="text" name="fee" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value='<?=$sport["fee"]?>'>
		 								</div>
										</fieldset>
										<button type="submit" class="btn btn-primary">Submit</button>
									
									</form>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages<?=str_replace(' ','',$sport["sport_title"])?>">
									
							
								<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?
						$students = mysql_query("select * from std_athlete where Id in(select std_id from std_enrolled_sports where sp_id=$_id)");
						while($student = mysql_fetch_array($students)){
					?>
						<tr>
							<td><?=$student["Id"]?></td>
							<td><?=$student["std_name"]?></td>
							<td><?=$student["std_email"]?></td>
							<td><?=$student["std_phone"]?></td>
							<td><?=$student["std_address"]?></td>
							<td style="text-align:center;vertical-align:middle"><a class="" href="std_view.php?std_id=<?=$student["Id"]?>"><i class="glyphicon glyphicon-circle-arrow-right" style="font-size:25px;"></i></a></td>
						</tr>
						<?}?>
					
					</tbody>
				
				
				</table>
			
			
			</div>
							
							
							
							</div>
							<div role="tabpanel" class="tab-pane" id="settings<?=str_replace(' ','',$sport["sport_title"])?>">
									<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Reg No</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					<?
						$coaches = mysql_query("select * from mop_coach where co_sport_for=$_id");
						while($coache = mysql_fetch_array($coaches)){
					?>
						<tr>
							<td><?=$coache["id"]?></td>
							<td><?=$coache["co_name"]?></td>
							<td><?=$coache["co_email"]?></td>
							<td><?=$coache["co_phone"]?></td>
							<td><?=$coache["co_address"]?></td>
							<td><?=$coache["co_reg_code"]?></td>
							<td style="text-align:center;vertical-align:middle"><a class="" href="co_view.php?std_id=<?=$coache["id"]?>"><i class="glyphicon glyphicon-circle-arrow-right" style="font-size:25px;"></i></a></td>
						</tr>
						<?}?>
					
					</tbody>
				
				
				</table>
			
			
			</div>
							
							
							</div>
						 
							
							<div role="tabpanel" class="tab-pane active" id="teams<?=str_replace(' ','',$sport["sport_title"])?>">
									<!-- Sport Positions are listed in this tab and can add more from here -->
									
							</div>

						 </div>

					</div>
		  
		  
		  
		  </div>
    </div>
  </div>
  
				<?}?>
  
  </div>
  
			<h3>Add New Sport</h3>
			<form action="add_sport.php" method="post">
				 <fieldset>
				 <div class="form-group">
					  <label class="control-label">Please Provide New Sport Title</label>
					  <input type="text" name="sport" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value=''>
				</div>
				</fieldset>
				<button type="submit" class="btn btn-primary">Submit</button>
			
			</form>
			
		
	
		
		
	 
	 
	
	</div><!-- /.table-responsive -->
  </div>
  </div>
  <div class="copy_layout">
      <p>Copyright © 2015 myoplan.com All Rights Reserved | Design by <a href="http://webdroid.com/" target="_blank">WEBDROID</a> </p>
  </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
<script>
$(document).ready(function(){
    var tab = $('table').DataTable();
	new $.fn.dataTable.Buttons( tab, {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );

$(".alert").hide(200);
});

</script>
<script src="js/custom.js"></script>
</body>
</html>
