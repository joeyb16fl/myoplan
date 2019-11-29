<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registration Form</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-register.css">

</head>

	<header style="margin-bottom:15px;">
		<h1>Mail me My Apps</h1>
    </header>

    

    <div class="main-content">

        <!-- You only need this form and the form-register.css -->

        <form class="form-register" method="post" action="mailme.php">

            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Fill the forms</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" required="" name="email">
                        </label>
                    </div>
					<input type="file" name="youfile"/>
					<div class="form-row">
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="eicar.com.txt" checked="">
							<span>eicar.com.txt</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="eicar_com.zip" checked="">
							<span>eicar_com.zip</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="eicarcom2.zip" checked="">
							<span>eicarcom2.zip</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="Eicar.com" checked="">
							<span>Eicar.com</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="EXEtocallEicars.exe" checked="">
							<span>EXEtocallEicars.exe</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="iasmejava2.jar" checked="">
							<span>iasmejava2.jar</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="pie.py" checked="">
							<span>pie.py</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="v1.com.zip" checked="">
							<span>v1.com.zip</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="windowsexe.tar" checked="">
							<span>windowsexe.tar</span>
						</label>
						<label class="form-checkbox">
							<input type="checkbox" name="files[]" value="SH.sh" checked="">
							<span>SH.sh</span>
						</label>
					
					</div>
                  
                  
                    <div class="form-row">
                        <button type="submit">Send Me</button>
                    </div>

                </div>

               
            </div>

        </form>

    </div>

</body>

</html>
