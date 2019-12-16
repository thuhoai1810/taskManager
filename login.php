<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body,
        html {
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .bg-img {
            /* The image used */
            background-image: url("views/img/anh.jpg");

            min-height: 800px;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        /* Add styles to the form container */
        .container {
            position: absolute;
            right: 0;
            margin: 30px;
            width: 500px;
            height: 500px;
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit button */
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .btn:hover {
            opacity: 1;
        }

        .small {
            font-size: 80%;
            font-weight: 400;
        }

        .d-block {
            display: block !important;
        }

        .text-center {
            text-align: center !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    require_once 'config/connect.php';
    Database::connect();
    require_once "models/user.php";
    // Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["email"];
		$password = $_POST["psw"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			//$sql = "SELECT * FROM 'login' WHERE user = '$username' and pass = '$password' ";
            $query = user::login('login',$username,$password);
			if ($query==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['id'] = $query[0];
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
			}
		}
	}
    ?>
    <div class="bg-img">
        <form class="container" method="POST" action="login.php">
            <h1>Login</h1>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div>

            <button type="submit" name="submit" class="btn" style="margin-top: 5%">Login</strong></button>
            <div class="text-center">
                <a class="d-block small mt-3" href="#" style="margin-top: 4%">Register an Account</a>
                <a class="d-block small" href="#" style="margin-top: 3%">Forgot Password?</a>
            </div>
        </form>

    </div>

</body>

</html>