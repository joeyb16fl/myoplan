<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?
	include("includes/header.php");
	$scid = $_GET["id"];
	
	$data = mysql_fetch_array(mysql_query("select * from reg_schools where id=$scid"));
?>
        <div id="page-wrapper">
        
		 <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Edit School</h3>
  	    <div class="well1 white">
        <form enctype="multipart/form-data" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" action="edt_school.php" method="post" >
          <input type="hidden" value="<?=$data["id"]?>" name="id">
          <input type="hidden" value="<?=$data["sc_logo"]?>" name="logo_c">
		  <fieldset>
            <div class="form-group">
              <label class="control-label">Name</label>
              <input type="text" name="name" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value='<?=$data["sc_name"]?>'>
            </div>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" name="email" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.email" required="" value='<?=$data["sc_email"]?>'>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="text" name="password" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value='<?=$data["sc_pwd"]?>'>
            </div>
            <div class="form-group">
              <label class="control-label">Contact Number</label>
              <input type="text" name="contact" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" ng-model="model.number" ng-pattern="/[0-9]/" required="" value='<?=$data["sc_phone"]?>'>
              <p class="help-block hint-block">Numeric values from 0-***</p>
            </div>
            
			<div class="form-group">
              <label class="control-label">Address</label>
              <input type="text" name="address" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value='<?=$data["address"]?>'>
            </div>
			<div class="form-group">
				<label for="smdc">Choose logo</label>
				<input type="file" name="logo" style="display:none;" id="smdc" value=""/>
				<img src="<?=$data["sc_logo"]?>" style="border:4px solid white;max-height:150px;cursor:pointer;width:auto;" onclick="document.getElementById('smdc').click()"/>
			</div>
			<div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </fieldset>
        </form>
      </div>
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
