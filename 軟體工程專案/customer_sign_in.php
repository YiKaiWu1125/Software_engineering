<?php
	session_start();
	$user = isset($_session['user']) ? $session['user'] : 'Guest';
	// print_r($_session);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>麥味登顧客登入</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcd n.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">     -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body {font-family: 微軟正黑體;}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="visitor_index.html">FBL</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">導覽按鈕</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="food_menu.html">即時點餐</a></li>
					<li><a href="auto_eat.html">自動取eat</a></li>
					<li><a href="order_web.html">檢視訂單</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
							<span style="padding-right: 10px; color: navy;">Hi! <?php echo($user) ?></span><img
								src="img/Setting_icon.png" width="30px"> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Account_Setting.html">Account Setting</a></li>
							<li><a href="preference.html">My preference Setting</a></li>
							<li class="active"><a href="customer_sign_in.html">Sign in</a></li>
							<li><a href="#">Sign out</a></li>
						</ul>
					</li>
				</ul>
				<!-- <form class="navbar-form navbar-right">
			<div class="form-group has-feedback">
				<input type="search" class="form-control" placeholder="search"><span class="glyphicon-search form-control-feedback"></span>
			</div>
			<button type="submit" class="btn btn-default">搜尋</button>
		  </form> -->
			</div>
		</div>
	</nav>
	
	<!--頁首-->
	<header>
		<div class="container">
			<h1>瀏覽菜單&即時點餐</h1>
			<p class="lead">下標</p>
			<hr>
		</div>
	</header>
	<!--內容區-->
    <center>
	<div class="container">   
		<div class="d-flex justify-content-center">
			<article>
				<div class="col-sm-12">
					<h1 style="font-family:微軟正黑體 ; text-align:center">ღLOGINღ</h1>
					<!-- <div align="center"><img src="demo.png" width="80%" class="img-thumbnail"></div> -->
					<hr>
					<!--  -->
                    
					<div class="col-sm-12">
						<div class="thumbnail">
							<img src="img\\demo.png" alt="2" width="400" height="300">
                            <!-- <form action = "php/login.php" method = "post">      -->
                                <label>                              
                                    請輸入您的帳號：  
                                </label>
                                <p>     
                                    <input type="text" name = "user_account" id ="user_account" value="" >
                                </p>     
                                <label> 
                                    請輸入您的密碼：
                                </label>
                                <p>     
                                    <input type="password" name = "user_password"  id = "user_password" value="">
                                    <p> <font style="font-size:12px">
                                    (測試帳號：evan 密碼:1234)</font>
                                    </p> 
                                <p>                                                                                  
                                    <!-- <input id="btn_send" type="submit" value="送出"> -->
                                <button type="submit" id = "sign_in" class="btn btn-dark" onclick="check_account()">登入</button>   
								<br>                      
                                <a href="#" role="button" aria-pressed="flase">忘記密碼</a>  
                            <!-- </form> -->
						</div>
					</div>
				
				</div>
			</article>
			
		</div>	       
	</div>
    </center>
	<hr>
	
	
	
	<!--頁尾-->
	<footer>
		<div class="container">
			<p>♂海洋大學&middot;資工系♀</p> <p style="text-align:right"><a href="#">T O P</a></p>

		</div>
	</footer>
	
  <script>

    //   const sign_in_btn = document.getElementById("sign_in");

    //   sign_in_btn.addEventListener('click',sign_in );
	var correct = true;
	function check_account(){
		var account_str = document.getElementById("user_account").value;
		var password_str = document.getElementById("user_password").value;
		const xmlhttp = new XMLHttpRequest();
		xmlhttp.onload = function () {
			var correct = this.responseText;
			console.log("correct: " + correct);
			correct = correct.substring(11,correct.length);
			if(correct=="False"){
				window.alert("帳號或密碼錯誤 !");
				window.location.reload();
			}
			else if(correct == "True"){
				localStorage.setItem("user_account", account_str);
				window.location.href = "food_menu.html";
			}
		}
		xmlhttp.open("GET", "php/login.php?user_account="+account_str+"&user_password="+password_str );
		xmlhttp.send();
		// if(correct){
		// 	localStorage.setItem("user_account", account_str);
		// 	window.location.href("food_menu.html");
		// }
	}
	function start(){
		localStorage.clear();
	}
	window.addEventListener("load",start,false);
    /*正式後端驗證機制由後端驗證後重新導向*/
  </script>

  </body>
</html>
