<!DOCTYPE html>
<html lang="en">
<head>
    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>login2.css">


</head>
<body>
    <div class="container">
	<div class="row">
		 <h1><i class="fa fa-lock" aria-hidden="true"></i> UTN Login</h1>
       
        </div><br /><br />
         
        <form autocomplete="off" action="<?php echo FRONT_ROOT."Home/Login"?>" method="post">
                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
								</div>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email"/>
							</div><br />
         
                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key icon"></i></span>
								</div>
									<input type="Password" name="password" id="password" class="form-control" placeholder="Password"/>
							</div><br />
            <div class="checkbox">
              <label></label>
            </div><br />
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</button>
         
        <br />
               <br /> <center><div style="border:1px solid black;height:1px;width:300px;"></div></center><br />
        <div class="footer">
                  <p>Don't have an Account! <a href="<?php echo FRONT_ROOT?>Home/ShowSignUpView">Sign Up Here</a></p>
</form> 
        </div>
 
	</div>
</body>
</html>