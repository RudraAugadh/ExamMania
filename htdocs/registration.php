<?php require_once "controllerUserData.php"; 
	
	if($_SESSION['sid']==session_id())
	{
		header("location:dashboard.php");
		
	}
	else
	{
		
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EM Register</title>

    <link rel="icon" type="image/png" href="/images/icons/favicon.ico" />
    <link rel="stylesheet" href="/css/main.css" />

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<header>
    
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/index.php">ExamMania</a>
                <div class="d-flex">
                    <ul class="navbar-nav m-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav m-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</header
<body>
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic">
                    <img src="/images/img-01.png" alt="IMG" />
                </div>

                <form method="post" class="login100-form">
                    <span class="login100-form-title"> Member Register </span>

                    <div class="wrap-input100">
                        <input class="input100" type="text" id="name" name="name" placeholder="Name" required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" id="email" name="email" placeholder="Email" size="30"
                            required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password"
                            required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div>
                        <p align="center">
                            <input type="checkbox" required name="terms" /> I accept the
                            <u>Terms and Conditions</u>
                        </p>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="register" class="login100-form-btn">
                            Register
                        </button>
                    </div>
                    <div>
                        <p align="center">
                            <span>Already Registered? <a href="/login.php">Login</a></span>
                        </p>
                    </div>
                    <div class="message">
                        <p align="center">
                            <span class="message">
                   	   		  	<?php
                    	if(count($errors) > 0){
							?>
                       		 <div class="alert alert-danger text-center">
                          		<?php
								foreach($errors as $showerror){
									echo $showerror;
								}
								 ?>
                      		 </div>
                       		 <?php
								}
								?>
								
							
							</span>
                        </p>
                    </div>
                </form>
            </div>
        </div>

</body>
<footer class="navbar fixed-bottom navbar-dark bg-dark">
    <div class="container-fluid">
        <i class="fa fa-copyright navbar-link text-light" aria-hidden="true">
            &reg; Rudra &trade;
        </i>
        <div class="d-flex">
            <i class="fa fa-copyright navbar-link text-light" aria-hidden="true">
                By: Ankit Kumar Singh
            </i>
        </div>
    </div>
</footer>

</html>