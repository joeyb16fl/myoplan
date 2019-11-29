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
  	    <h3>Register School</h3>
  	    <div class="well1 white">
        <form enctype="multipart/form-data" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" action="reg_user.php" method="post" >
          <input type="hidden" value="" name="id">
		  <fieldset>
            <div class="form-group">
              <label class="control-label">Name</label>
              <input type="text" name="name" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value=''>
            </div>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" name="email" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.email" required="" value=''>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="text" name="password" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value=''>
            </div>
            <div class="form-group">
              <label class="control-label">Contact Number</label>
              <input type="text" name="contact" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" ng-model="model.number" ng-pattern="/[0-9]/" required="" value=''>
              <p class="help-block hint-block">Numeric values from 0-***</p>
            </div>
            
			<div class="form-group">
              <label class="control-label">Address</label>
              <input type="text" name="address" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" value=''>
            </div>
			<div class="form-group">
				<label for="exampleInputFile">Choose Profile Picture</label>
				<input type="file" name="logo" id="exampleInputFile">
				<p class="help-block"></p>
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
