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
  	 <h3>MyoPlan Sports - Admin Dashboard</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
    </div>
   <div class="panel-body1">
	<div class="table-responsive">
		
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Enrolled Students
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body" style="padding:15px;">
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							
						</tr>
					</thead>
					<!--
					-->
					<tbody>
					
					<?
						$students = mysql_query("select * from std_athlete");
						while($student = mysql_fetch_array($students)){
					?>
						<tr>
							<td><?=$student["Id"]?></td>
							<td><?=$student["std_name"]?></td>
							<td><?=$student["std_email"]?></td>
							<td><?=$student["std_phone"]?></td>
							<td><?=$student["std_address"]?></td>
							
						</tr>
						<?}?>
					
					</tbody>
				
				
				</table>
			
			
			</div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Registered Schools
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body" style="padding:15px;">
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
						$schools = mysql_query("select * from reg_schools");
						while($school = mysql_fetch_array($schools)){
					?>
						<tr>
							<td><?=$school["id"]?></td>
							<td><?=$school["sc_name"]?></td>
							<td><?=$school["sc_email"]?></td>
							<td><?=$school["sc_phone"]?></td>
							<td><?=$school["address"]?></td>
							<td><?=$school["sc_reg_code"]?></td>
							<td style="text-align:center;vertical-align:middle"><a class="" href="view_school.php?sc_id=<?=$school["id"]?>"><i class="glyphicon glyphicon-circle-arrow-right" style="font-size:25px;"></i></a></td>
						</tr>
						<?}?>
					
					</tbody>
				
				
				</table>
			
			
			</div>
			
		
		
		
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Registered Coaches
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        
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
						</tr>
					</thead>
					<tbody>
					
					<?
						$coaches = mysql_query("select * from mop_coach");
						while($coache = mysql_fetch_array($coaches)){
					?>
						<tr>
							<td><?=$coache["id"]?></td>
							<td><?=$coache["co_name"]?></td>
							<td><?=$coache["co_email"]?></td>
							<td><?=$coache["co_phone"]?></td>
							<td><?=$coache["co_address"]?></td>
							<td><?=$coache["co_reg_code"]?></td>
							
						</tr>
						<?}?>
					
					</tbody>
				
				
				</table>
			
			
			</div>
		
		
		
      </div>
    </div>
  </div>
</div>
		
		
	 
	 
	
	</div><!-- /.table-responsive -->
  </div>
  </div>
  <div class="copy_layout">
      <p>Copyright © 2018 MyoplanSports.com All Rights Reserved | Design by <a href="http://www.myoplansports.com" target="_blank">MyoPlan Sports</a> </p>
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
});

</script>
<script src="js/custom.js"></script>
</body>
</html>
