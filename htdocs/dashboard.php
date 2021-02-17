
<?php require_once "controllerUserData.php"; 
	if($_SESSION['sid']==session_id())
	{
		
	}
	else
	{
		header("location:login.php");
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

		<style>
			
		</style>
	</head>

	
		<header>
			<nav class="navbar fixed-top navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="">ExamMania</a>
					<div class="d-flex">
						<ul class="navbar-nav m-2">
							<li class="nav-item">
								
								<a class="nav-link active" aria-current="page" href="#">
									Welcome <?php echo($_SESSION['username'])?>
                      		 </a>
								 
								
							</li>
						</ul>
						 <ul class="navbar-nav m-2 card bg-secondary">
							<li class="nav-item">
								<a class="nav-link active" href="/logout.php">&nbsp  Sign Out  &nbsp</a>
							</li>
                    	</ul>
					</div>
				</div>
			</nav>
		</header>
	
	<body>
		<div>
	
		<div id="quizContainer" class="wrap-login100">
			<div class="title">Quiz<br></div>
			<div id="question" class="question"></div>
			<label class="option"><input type="radio" name="option" value="1" /> <span id="opt1"></span></label>
			<label class="option"><input type="radio" name="option" value="2" /> <span id="opt2"></span></label>
			<label class="option"><input type="radio" name="option" value="3" /> <span id="opt3"></span></label>
			<label class="option"><input type="radio" name="option" value="4" /> <span id="opt4"></span></label>
			<button id="nextButton" class="next-btn" onclick="loadNextQuestion();">Next Question</button>
		</div>
		<div id="result" class="wrap-login100 result" style="display:none;">
		</div>
		</div>	
		<script src="/js/question.js"></script>
		<script src="/js/quiz-script.js"></script>

		
		
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
