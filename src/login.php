<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>login</title>
</head>

<body>
    <section class="side">
        <img src="/assets/images/loginP.png">
    </section>
    <section class="main">
        <a href="/src/home.php" class="home-btn"><i class="fa fa-home"></i></a>
        <div class="m_container">
            <p class="title">Login</p>
            <div class="separator"></div>
            <p class="message">Enter Necessary Details</p>
            <form name="lform" class="lform" action="process_login.php" onsubmit="return vali()" method="post">
                <div class="control">
                    <input type="text" name="uname" placeholder="username">
                    <i class="fa fa-user"></i>
                </div>
                <p id="error1"></p>
                <div class="control">
                    <input type="password" name="pass" placeholder="******">
                    <i class="fa fa-lock"></i>
                </div>
                <p id="error2"></p>
                <input type="submit" value="Login" class="submit">
            </form>
            <div class="forgot">
                <a href="/src/forgot_password.php">Forgot Password</a>
            </div>
            <div class="link">
                <a href="/src/register.php">Create an Account</a>
            </div>
        </div>
    </section>
    <script>
    function vali() {
        var e1 = document.querySelector("#error1");
        var e2 = document.querySelector("#error2");
        var uname = document.lform.uname.value;
        var pass = document.lform.pass.value;
        if (uname === "" || uname === "null") {
            e1.style.color = "red";
            e1.innerHTML = "Please Enter Username";
            return false;
        }
        if (pass === "" || pass === "null") {
            e2.style.color = "red";
            e2.innerHTML = "Please Enter Password";
            return false;
        }
        return true;
    }
    </script>
</body>

</html>
<!--    <script>
        function vali(){
            var e1= document.querySelector("#error1");
            var e2= document.querySelector("#error2");
            var uname= document.lform.uname.value;
            var pass=document.lform.pass.value;
            if(uname==="" || uname==="null"){
                e1.style.color="red";
                e1.innerHTML="Please Enter Username";
                return false;
            }else if(pass==="" || pass==="null"){
                e2.style.color="red";
                e2.innerHTML="Please Enter Password";
                return false;
            }
                return true;
        }
    </script>

	<script>
					function login_vali(){
			var uname=document.getElementsByName("username").value;
			var pass= document.getElementsByName("password").value;

			if(uname==="" || pass===""){
				alert("Fields cannot be empty");
				return false;
			}
			else{
				return true;
			}
		}
		function regivali(){
			var fname = document.getElementsByName("fname").value;
			var lname = document.getElementsByName("lname").value;
			var uname = document.getElementsByName("uname").value;
			var pass = document.getElementsByName("pass").value;
			var cpass = document.getElementsByName("cpass").value;
			var email = document.getElementsByName("email").value;

			if(fname==="" || lname==="" || uname==="" || pass==="" || cpass==="" || email===""){
				alert("Form cannot be submitted empty !!");
				return false;
			}
			var pattern1 =/^[a-zA-z]/;
			if(!fname.match(pattern1) || !lname.match(pattern1)){
				alert("Name cannot contain number.");
				return false;
			}
			if(fname.length>15 && lname.length>15){
				alert("Name cannot contain more than 15 Letters !!");
				return false;
			}
			if(! pass==cpass){
				alert("Confirm Password has to be same as Password");
				return false;
			}
			var emailRegex = /^([a-zA-Z0-9\._]+)@([a-zA-Z])+.([a-zA-Z]+)?$/;
            if (!email.match(emailRegex)) {
                alert("Please enter a valid email address.");
                return false; 
            }
            alert("Successfully Submited");
            return true;
		}
-->