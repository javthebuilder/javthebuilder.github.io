
<?php
	// echo "login_val:".$_POST['login'];
	session_start();

	if(isset($_SESSION['AlreadyLogIn']))
	{
		// header(string: 'Location: dashBoard.php');
		header('Location: dashBoard.php');
		exit();
	}

	if(isset($_POST['login'])){
		$id = $_POST['id'];
		$email = $_POST['email'];
		$storegroup = $_POST['storegroup'];
		$name=$_POST['name'];

		$_SESSION['AlreadyLogIn'] = '1';
		$_SESSION['id']=$id;
		$_SESSION['storegroup']=$storegroup;
		$_SESSION['name']=$name;

		exit ("".$email."=".$pass."");
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pondo Branch Performance</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter" id="limiter_div">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<div class="login100-form validate-form" id="login_form">					
					<span class="login100-form-title">
						CTS Builders</br> <h3>File Management</br> Login</h3>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz / Email Not Found">
						<input class="input100" type="text" name="email" placeholder="Email" id="txtEmail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required / Incorrect Password">
						<input class="input100" type="password" name="pass" placeholder="Password" id="txtPassword">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="btnLogin">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#" id="forgotUsernamePassword">
							Username / Password?
						</a>
					</div>
					<div class="text-center p-t-1" style="display:none" id="emailshow">
						<span class="txt1">
							<h5>To our supports at </h5>
						</span><br>
						<a class="txt2" href="#">
							<H4>support@yourcompany.com</H4>
						</a>
						<br><br><br><br>
						<button class="" id="backLogin">
							Back to Login
						</button>
					</div>

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account

							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<!--===============================================================================================-->

	<script type="text/javascript">
	$('.js-tilt').tilt({
		scale: 1.1
	});
	$(document).ready(function(){
		var input = $('.validate-input .input100');
		var email = "";//email
		var pass = "";//password
		var obj="";


		$( "#btnLogin" ).click(function() {
			 goLogin();
		});
		$("#forgotUsernamePassword").click(function(){
			// console.log("11")
			$(".text-center").hide();
			$(".wrap-input100").hide();
			$(".container-login100-form-btn").hide();
			$(".login100-form-title").text("Send Email");
			$("#emailshow").show();
			// login100-form-title

		});

		$("#backLogin").click(function(){
			// console.log("11")
			$(".text-center").show();
			$(".wrap-input100").show();
			$(".container-login100-form-btn").show();
			$(".login100-form-title").text("Login");
			$("#emailshow").hide();
			// login100-form-title

		});



		$("#txtPassword").keyup(function(){
			// console.log("value:" + getKeyValue(event));
			var eventNumber = getKeyValue(event)
			if(eventNumber==13){
			 goLogin();
		 }
    });
		function goLogin(){

			  // console.log( "Login click" );
				var check = true;

				for(var i=0; i<input.length; i++) {
						// email = input[0].val();
						// pass = input[1].val();
						if(validate(input[i]) == false){
								showValidate(input[i]);
								check=false;
								// console.log("CHECK + " + i );
						}
				}


				if(check == true){
					var new_status="";
					var new_message="";
					$.post("ajax/readUser.php", {
						pass:pass,
						email:email
					}, function (data, status) {
							// console.log("rU_Result:" + data);;
		          obj = JSON.parse(data);
						 	// console.log("1" + obj.status);
							// new_status = ""+obj.status;
							// console.log("2" + obj.message);
							// new_message="" + obj.message;

							var id = obj.id;
							var name = obj.name;
							var storegroup = obj.storegroup;
							if(obj.status=="success"){
								$.ajax({
									url: "index.php",
									method: "POST",
									data: {
										login: 1,
										email: email,
										id:id,
										name:name,
										storegroup:storegroup
										// password: pass
										},
									success:function(response){
									// console.log("//////////////////reponse:");
									// console.log(response);
									window.location='dashBoard.php';
									},dataType:'text'
								});
							}else{
								// var message = obj.message;
								// console.log("LO:"+obj.message);
								if(obj.message=="NotFoundEmail"){
									showValidate(input[0]);
								}else{
									showValidate(input[1]);
								}

							}
					});
					// console.log("LO email:" + new_status);


				} else{
					return false;
				}


		}
		function getKeyValue(event) {
	    var x = event.which || event.keyCode;
			return x;
	    // document.getElementById("demo").innerHTML = "The Unicode value is: " + x;
		}

		$('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
      // console.log("validate start");
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }else{
              email = $(input).val();
              // console.log("email value:" + email);
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }else{
              pass = $(input).val();
              // console.log("pass value:" + pass);
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
	});

	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/jquery.min.js"></script>

</body>
</html>
