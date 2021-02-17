<?php require_once "controllerUserData.php"; 
	
	if($_SESSION['sid']==session_id())
	{
		header("location:dashboard.php");
		
	}
	else
	{
	//	die();
	}
?>
<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>ExamMania</title>



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

                            <a class="nav-link active" aria-current="page" href="#">Welcome To ExamMania</a>

                        </li>

                    </ul>

                    <ul class="navbar-nav m-2">

                        <li class="nav-item">

                            <a class="nav-link active" href="#"></a>

                        </li>

                    </ul>

                </div>

            </div>

        </nav>
</header>
	
<body>

        <div class="container-login100">
			
			

            <div class="wrap-login100">

                <div class="login100-pic">

                    <img src="/images/img-01.png" alt="IMG" />

                </div>



                <div class="login100-form">

                    <span class="login100-form-title"> Welcome to ExamMania </span>

                    <p class="text-center">Login to proceed with the exam or register NOW</p>

                    <form action="/login.php">

                        <div class="container-login100-form-btn">

                            <button class="login100-form-btn">Login</button>

                        </div>

                    </form>

                    <form action="/registration.php">

                        <div class="container-login100-form-btn">

                            <button class="login100-form-btn">Register</button>

                        </div>

                    </form>

                </div>

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