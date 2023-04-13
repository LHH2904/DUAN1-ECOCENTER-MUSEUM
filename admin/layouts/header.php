<?php
session_start();
require_once($baseUrl.'../utils/utility.php');
require_once($baseUrl.'../Database/dbhelper.php');
$user = getUserToken();
if($user==null){
    header('Location: '.$baseUrl.'authen/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title?></title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/0ec45a6e18.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/0ec45a6e18.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<style>
.bg-header {
    /* background:linear-gradient(-120deg, #3A5997, #2B3467, #000C53); */
    background-color: #2B3467;
}

body {
    font-family: 'Poppins';
}
</style>

<body>
    <div class="container-fluid" style=" font-family: 'Poppins';">
        <div class="row">
            <div style="background-color: white;display:flex;justify-content:space-around;"
                class="w-100 p-1 col-md-2 col-sm-4">
                <p class="bg-white" style="color: white; text-align: center; margin-top: 10px;" class="name">
                    <a href="../"><img style="width:80px;" src="https://i.ibb.co/X7Xbfvc/logoblue.png" alt=""></a>
                </p>

            </div>
            <nav class="navbar navbar-expand navbar-light col-md-10 bg-white topbar mb-9 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn " style="background-color: #2B3467;color:white" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="col-md-2 col-sm-1">
                    <p style="color: black; margin-top: 15px; " class="name">
                        <i class="fa-solid fa-user-tie"></i>
                        &nbsp;<?=$user['fullname']?>
                </div>
                <div class="col-md-2 col-sm-1" style="margin-right:-40px; ">
                    <a style="text-decoration:none; color: gray;" href="<?=$baseUrl?>authen/logout.php"><i
                            class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;Logout</a>
                </div>
            </nav>

        </div>
        <div class="row">
            <div style="max-height: 100%; " class="col-md-2 bg-header">
                <ul style="list-style: none; margin-top:20px; font-weight: bold;" class="d-flex flex-column">
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="../" class="nav-link">
                            <i class="fa-solid fa-gauge"></i>
                            &nbsp;&nbsp;Dashboard
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>category/" class="nav-link">
                            <i class="fa-solid fa-list"></i>
                            &nbsp;&nbsp; Product Cate
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>product/" class="nav-link">
                            <i class="fa-brands fa-docker"></i>
                            &nbsp;&nbsp; Product
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>category_explore/" class="nav-link">
                            <i class="fa-solid fa-list"></i>
                            &nbsp;&nbsp;Explore Cate
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>explore/" class="nav-link">
                            <i class="fa-solid fa-building-columns"></i>
                            &nbsp;&nbsp; Explore
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>ticket/" class="nav-link">
                            <i class="fa-solid fa-ticket"></i>
                            &nbsp;&nbsp;Ticket Manage
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>order/" class="nav-link">
                            <i class="fa-solid fa-folder"></i>
                            &nbsp;&nbsp;Orders Manage
                        </a>
                    </li>


                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>feedback/" class="nav-link">
                            <i class="fa-solid fa-comments"></i>
                            &nbsp;&nbsp; Feedback
                        </a>
                    </li>
                    <li style="margin-top:20px;">
                        <a style="color: white; font-size: 14px" href="<?=$baseUrl?>user/" class="nav-link">
                            <i class="fa-solid fa-user-gear"></i>
                            &nbsp;&nbsp; Users
                        </a>
                    </li>


                </ul>
            </div>
            <main role="main" class="col-md-10 px-4">