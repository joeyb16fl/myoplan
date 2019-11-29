<?
	include("includes/header.php");

?>


<?
	$_query="select * from mop_admin where is_super=0";
	$_result = mysql_query($_query);
	

?>


        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Registered School</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
		<a href="add_user.php"><button class="btn-success btn">Add New User</button></a>
    </div>	
   <div class="panel-body1">
	<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
		
		<?
			$row;
			while($row=mysql_fetch_array($_result)){
		
		?>
          <tr>
            <th scope="row"><img style="max-height:40px;width:auto;" src="<?=$row['image']?>"/></th>
            <td><?=$row['name']?></td>
            <td>
				<?=$row['email']?>
				<!--
						  <select class="form-control">
								<option value="0">Unpaid</option>
								<option value="1">Paid </option>
						  </select>-->
					
			</td>
            <td>
				<?=$row['phone']?>
				<!--
				<select class="form-control">
					<option value="0">Waiting</option>
					<option value="1">Selected</option>
				</select>-->
			</td>
            <td>
				<?=$row['address']?>
				<!--<select class="form-control">
					<option value="0">Not Varified</option>
					<option value="1">Varified</option>
				</select>-->
			</td>
			<td>
					<a class="btn btn-danger" href="user_profile.php?sc_id=<?=$row["Id"]?>">View</a> <a class="btn btn-default" href="">Edit</a>
			</td>
          </tr>
			<?}?>
         </tbody>
      </table>
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
<script src="js/custom.js"></script>
</body>
</html>
