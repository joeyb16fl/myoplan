<?
	include("includes/header.php");

?>


<?
	$sc_id = $_REQUEST["sc_id"];
	$_query="select * from mop_admin where Id = $sc_id";
	$_result = mysql_query($_query);
	$row = mysql_fetch_array($_result);
	

?>


        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>User Profile</h3>
  	<div class="bs-example4" data-example-id="contextual-table">
		<a href="add_user.php"><button class="btn-success btn">Add new User</button></a>
    </div>	
   <div class="panel-body1">
	<div class="table-responsive">
		<div class="col-md-6 widget_1_box2">
		   	 	<div class="wid_blog">
		   	 		<h1><?=$row['name']?></h1>
					<p style="color:white"><?=$row['address']?></p>
					<p style="color:white"><?=$row['phone']?></p>
		   	 	</div>
		   	 	<div class="wid_blog-desc">
		   	 		<div class="wid_blog-left">
		   	 			<img src="<?=$row["image"]?>" class="img-responsive" alt="">
		   	 		</div>
		   	 		<div class="wid_blog-right">
		   	 			<h2>Info</h2>
		   	 			<p>Email: <?=$row["email"]?></p>
		   	 			<p>Password: <?=$row["password"]?></p>
		   	 			
		   	 		</div>
		   	 		<div class="clearfix"> </div>
		   	 	</div>
            </div>
			<?/*
			<div class="col-md-6 widget_1_box2">
		   	 	<div class="wid_blog">
		   	 		<h1>Documents</h1>
		   	 	</div>
				
				<?
					$doc_token = $row["doc_token"];
					$documents = mysql_query("select * from documents where doc_user_key='$doc_token'");
					?>
		   	 	<div class="wid_blog-desc">
				<form id="status_form" method="post" action="update_doc_status.php">
						<input type="hidden" name="sc_id" value="<?=$row["id"]?>">
						<div class="form-group">
							<label class="control-label" for="exampleInputFile">Change Document Status</label>
							<select onchange="document.getElementById('status_form').submit()" class="form-control1 ng-invalid ng-invalid-required ng-touched" name="doc_status">
								<option <?=($row['sc_doc_status'])?'selected':''?> value="0">Uncomplete</option>
								<option <?=($row['sc_doc_status'])?'selected':''?> value="1">Completed</option>
							</select>
						</div>
					</form>
		   	 		<?
					if(mysql_num_rows($documents) <1){
						echo "<h5>No Documents Found</h5>";
					}
					while($document = mysql_fetch_array($documents)){	
				
				?>
					<h5><a href="<?=$document['doc_path']?>"><?=$document['doc_title']?></a></h5>
				
					<?}?>
					
					<form method="post" action="upload_document.php" enctype="multipart/form-data">
						<input type="hidden" name="doc_token" value="<?=$row["doc_token"]?>">
						<input type="hidden" name="sc_id" value="<?=$row["id"]?>">
						<div class="form-group">
							<label class="control-label">Document Title</label>
							<input type="text" name="doc_title" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value=''>
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
	  
	  */?>
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
