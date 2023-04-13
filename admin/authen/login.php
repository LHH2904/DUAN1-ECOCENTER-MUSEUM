<?php
session_start();
    require_once('../../utils/utility.php');
    require_once('../../Database/dbhelper.php');
    require_once('process_form_login.php');
    $user = getUserToken();
    if($user!=null){
        header('Location: ../');
        die();
    }
?>

<!-- <!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
    <title>Đăng nhập</title>

    <link rel="icon" href="../../asset/photo/user_register.png" type="image/x-icon" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../asset/css/authen_register.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Đăng nhập</h2>
                <h4 style="color:red" class="text-center"></h4>
            </div>
            <form method="POST" action="">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" required="true" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="password" minlength="6" required="true" type="password" class="form-control"
                            id="pwd">
                    </div>
                    <p><a href="register.php">Đăng kí tài khoản mới</a></p>
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html> -->

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../asset/img/iconlogo.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Montserrat:wght@400;500;700&display=swap"
        rel="stylesheet">
    <!-- font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
body {
    font-family: 'Poppins';
}
</style>

<body>

    <section class="vh-100" style="background-color: #F6F6F6;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../../asset/img/login.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;width:100%" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">


                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0"><img src="../../asset/img/logo.png"
                                                style="width:30%" alt=""></span>
                                    </div>
                                    <h5 class="fw-normal  pb-3" style="letter-spacing: 1px;">Sign In</h5>
                                    <form method="post" onsubmit="checkLogin(event)">
                                        <div class=" form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Email</label>
                                            <input name="email" type="email" id="email"
                                                class="form-control form-control-lg" style="height:45px" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input name="password" type="password" id="password"
                                                class="form-control form-control-lg" style="height:45px" />
                                        </div>
                                        <div id="notifi" class="text-danger mb-1"></div>
                                        <p class="text-danger"><?=$msg?></p>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" style="height:45px"
                                                type="submit">Login</button>
                                        </div>
                                    </form>
                                    <a class="small text-muted" href="#!">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                            href="register.php" style="color: #393f81;">Register here</a></p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function checkLogin(event) {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const notifi = document.getElementById("notifi");

        if (email == "") {
            notifi.innerHTML = "Please text your Email";
            event.preventDefault();
        }
        if (password == "") {
            notifi.innerHTML = "Please text your password";
            event.preventDefault();
        }
        if (email == "" && password == "") {
            notifi.innerHTML = "Please text your infomation";
            event.preventDefault();
        }
    }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>