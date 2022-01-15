<?php
	session_start();
	$user = isset($_session['user']) ? $session['user'] : 'Guest';
	if($user === 'Guest')
	header("Location:../food_menu.php");
	// print_r($_session);
?>

<!DOCTYPE html>
<!--我有試做前端驗證機制，顯示錯誤跳轉回登錄頁面是正常的，可以將其註解掉(試作概念，後面要改成後端，為方便修改此html可改成註解) by 石貫志-->
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FBL早餐店(Customer)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- button -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--我加的前端驗證機制(試作概念，後面要改成後端，為方便修改此html可改成註解) by 石貫志-->
	<!-- <script type="text/javascript">
		//模擬檢測帳號、密碼
		  if(localStorage.userid!="guest" || sessionStorage.userpwd!="1234"){
			  alert("帳號密碼錯誤,請回首頁登入!!");							
			  sessionStorage.removeItem('userpwd');							
			  document.location="customer_sign_in.html";								
		  }
	</script> -->
	<!--我加的前端驗證機制(試作概念，後面要改成後端，為方便修改此html可改成註解) by 石貫志-->
	<style>
		body {
			font-family: 微軟正黑體;
		}

		button {
			text-align: center;
			transition-duration: 0.4s;
			text-decoration: none;
		}

		.btn_trash {
			background-color: white;
			border: none;
			color: black;
			padding: 1px 1px;
			font-size: 4px;
			cursor: pointer;
		}

		/* Darker background on mouse-over */
		.btn_trash:hover {
			color: white;
			background-color: red;
		}

		/* loading */
		#preloader {
			/*   這是整個會蓋住畫面的底色色塊  */
			position: fixed;
			width: 100%;
			height: 100%;
			left: 0%;
			top: 0%;
			background-color: #fff;
			z-index: 9999;
		}

		#status {
			/*   這是中間loading的gif坐標css,我們盡量讓他畫面置中  */
			position: fixed;
			width: 218px;
			height: 419px;
			margin-left: 520px;
			margin-top: 140px;
		}
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
					<li class="active"><a href="food_menu.html">即時點餐</a></li>
					<li><a href="auto_eat.html">自動取eat</a></li>
					<li><a href="order_web.html">檢視訂單</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
							<span style="padding-right: 10px; color: navy;">Hi! user_test</span><img
								src="img/Setting_icon.png" width="30px"> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="Account_Setting.html">Account Setting</a></li>
							<li><a href="preference.html">My preference Setting</a></li>
							<li><a href="customer_sign_in.html">Sign in</a></li>
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
			<p class="lead" id="user_mode">下標</p>
			<hr>
		</div>
	</header>
	<!--內容區-->
	<div class="container">
		<div class="row">
			<article>
				<div class="col-sm-8">
					<div>
						<form class="navbar-form navbar-right">
							<div class="form-group has-feedback">
								<input type="search" class="form-control" placeholder="search"
									onkeyup="searching_function(this.value)">
							</div>
							<!-- <button type="submit" class="btn btn-default" onclick="searching_function(this.value)">搜尋</button> -->
						</form>
						<h1 style="font-family:微軟正黑體 ; text-align:center">ღMenuღ</h1>

					</div>

					<!-- <div align="center"><img src="demo.png" width="80%" class="img-thumbnail"></div> -->
					<hr>
					<!-- 這邊是餐點 -->
					<p id="menu">
						<!--<div class="col-sm-4" >
                            <div class="thumbnail">
                                <img src="img\\demo.png" alt="2" width="400" height="300">
                                <p><strong>Paris</strong></p>
                                <p>Friday 27 November 2015</p>
                                <p>Price: </p>
                                <button class="btn" data-toggle="modal" data-target="#myModal" >Add To Package</button> 
                            
                            </div>
                        </div>-->
					</p>
					<!--  -->
					<center>
						<div class="col-sm-12">
							<ul class="pagination">
								<li><a onclick="page1()">1</a></li>
								<li><a onclick="page2()">2</a></li>
								<li><a onclick="page3()">3</a></li>
								<li><a onclick="page4()">4</a></li>
								<li><a onclick="page5()">5</a></li>
							</ul>
						</div>
					</center>
				</div>
			</article>

			<aside>
				<div class="col-sm-3 col-sm-offset-1">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>購物車<svg style="float: right; position:relative; top:-10px;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
								<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
							  </svg></h3>
						</div>
						<div class="panel-body">
							<ul id="package">
								<!-- 								
								<li>商品: <span style="float: right;">100</span></li>
								<li>商品: <span style="float: right;">100</span></li>
								 -->
							</ul>
							<label for="coupon_id">輸入優惠券: </label>
							<div class="form-group has-feedback">
								<input type="text" id="coupon_id" class="form-control" placeholder="coupon"
									onkeyup="use_coupon(this.value)">
							</div>

							<button value="submit" onclick="checkOut()">結帳</button>
							<span id="totalPrice" style="float: right;">Total: </span>
						</div>

					</div>
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h3>優惠卷<svg style="float: right;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
								<path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
								<path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
								<path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
							  </svg></h3>
						</div>

						<div class="panel-body">
							<ul id="coupon_code_id">
								<!-- <li>優惠卷code: <span style="float: right;">-30$</span></li> -->
							</ul>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3>FBL早餐店</h3>
							<br>[海大店]
						</div>

						<div class="panel-body">
							<ul>
								<li>此處引入php店家資訊</li>
								<li>此處引入php店家資訊</li>
								<li>此處引入php店家資訊</li>
								<li>此處引入php店家資訊</li>
							</ul>
						</div>
					</div>


				</div>
			</aside>
		</div>
	</div>
	<hr>

	<!-- jQuery Plugin -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<div id="preloader">
		<div id="status"><img width="400px" src="img/loading.gif" /></div>
	</div>

	<!--頁尾-->
	<footer>
		<div class="container">
			<p>♂海洋大學 &middot; 資工系 &middot; 軟體工程專案♀</p>
			<p style="text-align:right"><a href="#">T O P</a></p>

		</div>
	</footer>


	<script>
		var User_test;
		var i = 0;	//display index
		var k = 0;	//searching index
		var is_searching = 0;
		var searching_str = '';
		var product_name_Array = {};
		var coupon_code = "";
		var p_id = "";
		var clickPage = false;
		function showMenu() {
			if (!clickPage) {
				i = 0;
			}
			const xmlhttp = new XMLHttpRequest();

			xmlhttp.onload = function () {
				var obj = this.responseText;
				//console.log(obj);
				obj = obj.substring(11, obj.length);
				//console.log(obj);
				var product = JSON.parse(obj);
				//console.log(product);
				var j = 0;
				for (; j < product.length; j++) {
					product_name_Array[j] = product[j]["product_name"];
				}
				//console.log(product[0]);
				//console.log(product[0].product_pic);
				document.getElementById("menu").innerHTML = '';
				var max = i + 6;
				//display remain product
				for (; i < max; i++) {
					document.getElementById("menu").innerHTML += '<div class="col-sm-4" ><div class="thumbnail" ><img src="img/' + product[i]["product_pic"] + ' " alt="2" width="400" height="300"> <p><strong style="font-size:150%">' + product[i]["product_name"] + '</strong></p> <p>' + product[i]["product_info"] + '</p><p>Price: ' + product[i]["product_price"] + '</p><button id="' + i + '" onclick="addToPackage(this.id)" class="btn" data-toggle="modal" data-target="#myModal" >Add to Cart</button> </div> </div>';
				}
			}
			xmlhttp.open("GET", "php/user_display_menu.php");
			//xmlhttp.responseType = 'json';
			xmlhttp.send();
		}
		function page1() {
			clickPage = true;
			i = 0;
			k = 0;
			if (is_searching) {
				searching_function(searching_str);
			}
			else {
				showMenu();
			}
		}
		function page2() {
			clickPage = true;
			i = 6;
			k = 6;
			if (is_searching) {
				searching_function(searching_str);
			}
			else {
				showMenu();
			}
		}
		function page3() {
			clickPage = true;
			i = 12;
			k = 12;
			if (is_searching) {
				searching_function(searching_str);
			}
			else {
				showMenu();
			}
		}
		function page4() {
			clickPage = true;
			i = 18;
			k = 18;
			if (is_searching) {
				searching_function(searching_str);
			}
			else {
				showMenu();
			}
		}
		function page5() {
			clickPage = true;
			i = 24;
			k = 24;
			if (is_searching) {
				searching_function(searching_str);
			}
			else {
				showMenu();
			}
		}
		function showPackage() {
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				var obj = this.responseText;
				//console.log(obj);
				obj = obj.substring(11, obj.length);
				//console.log("showPackage: " + obj);
				if(!isJSON(obj)){
					document.getElementById("package").innerHTML = '';
					return;
				}
				var package_obj = JSON.parse(obj);
				console.log(package_obj);
				//console.log(package_obj[0].product_name);
				//display first product
				document.getElementById("package").innerHTML = '';
				//display remain product
				var index = 0;
				showPackageSum();
				while (package_obj[index].product_name != null) {

					document.getElementById("package").innerHTML += '<li>' + package_obj[index].product_name + ': <span style="float: right;">' + package_obj[index].product_price + ' $<button id="' + package_obj[index].product_name + '" onclick="delete_package_product(this.id)" style="float: right;" class="btn_trash" ><i class="fa fa-trash"></i></button></span>';
					index++;
				}
				//console.log(coupon_code);
				//style="float: right;" class="btn_trash" ><i class="fa fa-trash"></i></button>
			}

			xmlhttp.open("GET", "php/display_package.php?q=" + User_test);
			xmlhttp.send();
		}
		function showPackageSum() {
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				var sum = this.responseText;
				console.log(sum);
				document.getElementById("totalPrice").innerHTML = "Total: " + sum + " $";

			}

			console.log(coupon_code);
			xmlhttp.open("GET", "php/package_sum.php?q=" + User_test + "&s=" + coupon_code);
			//xmlhttp.responseType = 'json';
			xmlhttp.send();
		}
		function isJSON(str){
			if(!str){
				return false;
			}
			if(typeof str == 'string'){
				try{
					var obj=JSON.parse(str);
					if(typeof obj == 'object' && obj){
						return true;
					}
					else{
						return false;
					}
				}
				catch(e){
					return false;
				}
			}
		}
		// product_name_to_id(product_name_Array[button_index]).then(
		// 		function(pro_id){
		// 			//console.log("addfunc_id:" + p_id );
		// 			const xmlhttp = new XMLHttpRequest();
		// 			xmlhttp.onload = function() {
		// 				//console.log(product_name_Array[button_index]);

		// 				showPackage();
		// 				//window.location.reload();
		// 			}
		// 			xmlhttp.open("GET", "php/add_to_Package.php?user_account="+ User_test +"&product_id=" + pro_id);
		// 			xmlhttp.send(); 
		// 		}
		// 	);
		function addToPackage(button_index) {
			console.log("user_test: " + User_test);
			if(User_test==null){
				window.alert("尚未登入! 即將切換至登錄畫面!");
				window.location.href = "customer_sign_in.html";
				return;
			}
			//product_name_to_id(product_name_Array[button_index]);
			//console.log("addfunc_id:" + p_id );
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				//console.log(product_name_Array[button_index]);

				showPackage();
				//window.location.reload();
			}
			xmlhttp.open("GET", "php/add_to_Package.php?user_account=" + User_test + "&product_name=" + product_name_Array[button_index]);
			xmlhttp.send();

		}
		function delete_package_product(del_product_name) {
			//product_name_to_id(del_product_name);
			//console.log("del_pid:" + p_id);
			console.log(del_product_name);
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				console.log("deleteFunc: " + this.responseText);
				var x = this.responseText;
				if (x == -1) {
					document.getElementById("package").innerHTML = '';
				}
				else {
					showPackage();
				}
				//window.location.reload();
			}
			console.log("product_name delete:" + del_product_name);
			xmlhttp.open("GET", "php/delete_package_product.php?user_account=" + User_test + "&product_name=" + del_product_name);
			xmlhttp.send();
		}
		function searching_function(str) {
			if (!clickPage) {
				k = 0;
			}
			clickPage = false;
			searching_str = str;
			if (str.length == 0) {
				i = 0;
				is_searching = 0;
				showMenu();
				return;
			}
			is_searching = 1;
			console.log(str);
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				console.log("enter searching onload");
				var obj = this.responseText;
				console.log(obj);
				obj = obj.substring(11, obj.length);
				var product_searching = JSON.parse(obj);
				console.log(product_searching);
				for (var j = 0; j < product_searching.length; j++) {
					product_name_Array[j] = product_searching[j].product_name;
				}
				var max = product_searching.length;
				if (product_searching.length > 6) {
					max = k + 6;
				}
				document.getElementById("menu").innerHTML = '';
				for (; k < max; k++) {
					document.getElementById("menu").innerHTML += '<div class="col-sm-4" ><div class="thumbnail"><img src="img/' + product_searching[k]["product_pic"] + ' " alt="2" width="400" height="300"> <p><strong style="font-size:150%">' + product_searching[k]["product_name"] + '</strong></p> <p>' + product_searching[k]["product_info"] + '</p><p>Price: ' + product_searching[k]["product_price"] + '</p><button id="' + k + '" onclick="addToPackage(this.id)" class="btn" data-toggle="modal" data-target="#myModal" >Add to Cart</button> </div> </div>';
				}
				//document.getElementById("totalPrice").innerHTML = sum;
			}
			xmlhttp.open("GET", "php/searching.php?q=" + str);
			//xmlhttp.responseType = 'json';
			xmlhttp.send();
		}

		function product_name_to_id(name_str) {	//return 的地方有問題

			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				console.log(name_str);
				p_id = this.responseText;
				p_id = p_id.substring(22, p_id.length);
				console.log("onload:" + p_id);

			}
			xmlhttp.open("GET", "php/check_id.php?product_name=" + name_str);
			xmlhttp.send();
			//console.log("p_id= " + p_id);
			//return p_id;
		}
		function checkOut() {
			var timestamp = Date.now();
			var date = new Date(timestamp);
			var time = date.getFullYear() +
				"-" + (date.getMonth() + 1) +
				"-" + date.getDate() +
				"-" + date.getHours() +
				"-" + date.getMinutes() +
				"-" + date.getSeconds();

			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				console.log(time);
				showPackage();
			}

			xmlhttp.open("GET", "php/package_to_order_list.php?q=" + User_test + "&s=" + coupon_code + "&r=" + time);
			xmlhttp.send();

		}
		function showCoupon() {
			//
			const xmlhttp = new XMLHttpRequest();
			xmlhttp.onload = function () {
				var obj = this.responseText;

				obj = obj.substring(11, obj.length);
				console.log(obj);
				var coupon_info = JSON.parse(obj);
				console.log(coupon_info);
				var index = 0;
				document.getElementById("coupon_code_id").innerHTML = '';
				while (coupon_info[index] != null) {
					console.log(typeof (coupon_info[index].is_persentoff));
					console.log(coupon_info[index].is_persentoff);
					if (coupon_info[index].is_persentoff == 1) {
						var disc = coupon_info[index].num * 10;
						console.log("disc: " + disc);
						document.getElementById("coupon_code_id").innerHTML += "<li>" + coupon_info[index].coupon_code + "<span style='float: right;'>" + disc + "折</span></li>";
					}
					else {
						document.getElementById("coupon_code_id").innerHTML += "<li>" + coupon_info[index].coupon_code + "<span style='float: right;'>-" + coupon_info[index].num + "$</span></li>";
					}
					index++;
				}
				//console.log(product_name_Array[button_index]);
			}
			xmlhttp.open("GET", "php/show_coupon.php");
			xmlhttp.send();
		}
		function use_coupon(coupon_str) {
			//console.log(coupon_str);
			coupon_code = coupon_str;
			console.log(coupon_code);
			showPackage();
		}
		function check_login(){
			User_test = localStorage.getItem("user_account");
			if(User_test==null){
				document.getElementById("user_mode").innerHTML = "訪客模式(只限瀏覽)";
			}
			else{
				document.getElementById("user_mode").innerHTML = "顧客模式";
			}
		}
		function start() {
			i = 0;
			k = 0;
			clickPage = false;
			showMenu();
			showPackage();
			showPackageSum();
			showCoupon();
			check_login();
			//console.log(Date.now);
		}
		$(window).load(function () { // 確認整個頁面讀取完畢再將這三個div隱藏起來
			$("#status").delay(2000).fadeOut(500); //delay --> 延遲幾秒才fadeOut
			$("#preloader").delay(2000).fadeOut(500);
		})
		window.addEventListener("load", start, false);
	</script>
</body>

</html>