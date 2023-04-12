<?php
session_start();
    require_once('../../utils/utility.php');
    require_once('../../Database/dbhelper.php');
    require_once('process_form_register.php');
    $user = getUserToken();
    if($user!=null){
        header('Location: ../');
        die();
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

.vh-100 {
    background-image: url('../../asset/img/signup.jpg');
    background-size: cover;
}
</style>
</style>

<body>
    <!-- Register Form -->
    <section class="vh-100 ">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-6 col-xl-6">
                    <div style="background-color: rgba(255, 255, 255, 1); " class="card text-black"
                        style="border-radius: 1rem;">
                        <div class="card-body  p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-10 order-2 order-lg-1">
                                    <div class="d-flex align-items-center mb-3 pb-1 ml-3">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0 "><img src="../../asset/img/logo.png"
                                                style="width:30%" alt=""></span>
                                    </div>

                                    <h5 class="fw-normal  pb-3  ml-4" style="letter-spacing: 1px;">Sign In</h5>
                                    <!-- form -->
                                    <form method="POST" onsubmit="return validateForm()" action="" class="mx-1 mx-md-4"
                                        enctype="multipart/form-data">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Your Name</label>
                                                <input name="fullname" required="true" type="text" class="form-control"
                                                    id="usr">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Your Email</label>
                                                <input name="email" required="true" type="email" class="form-control"
                                                    id="email">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Password</label>
                                                <input name="password" minlength="6" required="true" type="password"
                                                    class="form-control" id="pwd">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Re-Enter Password</label>
                                                <input required="true" type="password" class="form-control"
                                                    id="confirmation_pwd">
                                            </div>
                                        </div>
                                        <button onclick="validateForm()" type="submit"
                                            style="width: 100%; height: 45px; font-size:15px; font-weight: bold;"
                                            name="submit" class="btn  btn-dark btn-lg">SIGN UP</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            function validateForm() {
                let pwd = document.querySelector("#pwd").value;
                let confirmPwd = document.querySelector("#confirmation_pwd").value;
                if (pwd != confirmPwd) {
                    alert("Re enter your password")
                    return false
                }
                return true;
            }
            </script>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
</body>

</html>