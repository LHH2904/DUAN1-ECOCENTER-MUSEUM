<?php
include('header.php');
$sql = "select * from explore where id = 28";
$firstExplore = executeResult($sql,true);
$sql = "select * from explore ORDER BY id DESC LIMIT 3 ";
$AllExplore = executeResult($sql);
$sql = "select * from product  where deleted = 0 order by id asc limit 3";
$products = executeResult($sql);
// echo "<pre>";
// var_dump($products);
// echo "</pre>";
?>
<style>
/* button */
.main-button-edit {
    width: 230px;
    height: 70px;
    font-size: 20px;
    font-weight: bold;
    border: none;
    border-radius: 0 0 0 0;
    color: #EFBF29;
    background-color: #EFBF29;
    cursor: pointer;
    margin-bottom: 15px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;

}

.main-button-edit:hover {
    color: #EFBF29 !important;
    background-color: rgba(252, 252, 252, 0.1) !important;
    border: 4px solid #EFBF29 !important;
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;

}

.main-button-edit:focus {
    outline: none;
}

.main-button-edit.color-1 {
    background-color: #EFBF29;
    color: white;
}

/* button */

.saigon-button-edit {
    width: 230px;
    height: 70px;
    font-size: 20px;
    font-weight: bold;
    border: none;
    border-radius: 0 0 0 0;
    color: white;
    background-color: #3DA9DE;
    cursor: pointer;
    margin-bottom: 15px;
}

.saigon-button-edit:hover {
    color: #3DA9DE;
    background-color: white;
    border: 4px solid #3DA9DE
}

.slider-exhibit {
    margin-top: -180px;
}

@media only screen and (max-width: 600px) {
    .slider-exhibit {
        margin-top: 0px;
    }

    .pick-fav {
        margin-top: 20px !important;
        width: 60px !important;
    }
}
</style>
<!-- slide show -->

<div id="carouselExampleIndicators" class="carousel slide slider-exhibit" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="asset/img/art.jpg" alt="First slide">
            <div class="carousel-caption">
                <p class="carousel-caption-title1" style="font-family: 'Marcellus', serif; font-size:20px;">Annually at
                    EC since 2023</p>
                <p class="carousel-caption-title2"
                    style="font-weight:800; font-size:65px;width: 600px;line-height:80px;"><?=$firstExplore['title']?>
                </p>
                <a href="explore.php"><button class=" main-button-edit color-1"><i
                            class="fa-solid fa-hurricane"></i></i>&ensp;
                        EXPLORE NOW</button></a>
                <p class="carousel-caption-title4"><i style="color:#EFBF29"
                        class="fa-solid fa-clock"></i>&nbsp;&nbsp;&nbsp;Museum hours<br><span style="color:#7D7D7D">Open
                        today from 9:30 a.m. to 4:00 p.m.</span></p>
            </div>
        </div>
        <?php
        foreach ($AllExplore as $item){
            echo '<div class="carousel-item">
            <img class="d-block w-100" src='.$item['thumbnail'].' alt="Second slide">
            <div class="carousel-caption">
                <p class="carousel-caption-title1" style="font-family: Marcellus, serif; font-size:20px;">Annually at
                    EC since 2023</p>
                <p class="carousel-caption-title2"
                    style="font-weight:800; font-size:65px;width: 600px;line-height:80px;"> '.$item['title'].'
                </p>
                <a href="explore.php"><button class=" main-button-edit color-1"><i class="fa-solid fa-hurricane"></i></i>&ensp;
                        EXPLORE NOW</button></a>
                <p class="carousel-caption-title4"><i style="color:#EFBF29"
                        class="fa-solid fa-clock"></i>&nbsp;&nbsp;&nbsp;Museum hours<br><span style="color:#7D7D7D">Open
                        today from 9:30 a.m. to 4:00 p.m.</span></p>
            </div>
        </div>';
        }
        ?>
    </div>

</div>
<!-- slide show -->

<div class="row align-items-center">

    <div class="col-12 col-md-7">
        <div class="about-us-thumbnail mb-50 position-relative">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:50%;color:black;">
                <p style="color: #999999">AUTUMN AT ECO</p>
                <p style="font-size:50px; font-weight: bold; color: #121F6A">Fall Forward</p>
                <p style="font-family: 'Marcellus', serif; font-size:15px; color: #7D7D7D">The days may be growing
                    shorter, but there’s now more time for you to experience <span style="color:#3DA9DE">the world's
                        largest display of TREX® art.</span> In the Giant Dome Theater, <span
                        style="color:#3DA9DE">Wings Over Water</span> offers breathtaking footage of America’s wetlands
                    (not to mention, the latest in fowl fashion).</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5 ">
        <div class="about-us-thumbnail mb-50 position-relative">
            <img src="asset/img/trexndino.jpg" style="width:100%;" alt="">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:40%;color:white;">
                <p style="font-weight: bold; font-size: 25px">OUR LOCATION</p>
                <p style="font-size:32px;font-family: 'Marcellus', serif;">599 Le Duan Str
                    Distric 1
                    SaiGon, VietNam</p>
                <hr style="background-color: #3DA9DE;">
                <p style="font-family: 'Marcellus', serif; font-size:15px; color:#3DA9DE;">Get direction</p>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-center " style="margin-top:-16px;">
    <div class="col-12 col-md-7  ">
        <div class="outer-container">
            <div class="inner-container">
                <div class="video-overlay"></div>
                <div class="video-overlay1">
                    <p class="video-overlay1-content">
                        <i class="fa-solid fa-video"></i>&nbsp;&nbsp;&nbsp;
                        Science Snozeum
                </div>
                </p>
                <video id="player" src="asset/video/museum.mp4" muted autoplay loop></video>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5 ">
        <div class="about-us-thumbnail mb-50 position-relative">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:40%;color:black;">
                <p style="color: #999999">AUTUMN AT ECO</p>
                <p style="font-size:50px; font-weight: bold; color: #121F6A; line-height:50px;">Sai Gon Exhibition</p>
                <a href="ticket.php"><button class="saigon-button-edit"><i class="fa-solid fa-ticket"></i></i>&ensp;
                        BOOK TICKET&ensp;<i class="fa-solid fa-chevron-right"></i></button></a>
                <p style="font-family: 'Marcellus', serif; font-size:15px; color: #7D7D7D">Experience <span
                        style="color:#3DA9DE">the world's largest display of TREX® art.</span> In the Giant Dome
                    Theater.</p>
            </div>
        </div>
    </div>


</div>


<div class="container-fluid">
    <div class="robot row align-items-center" style="height: 100%;background-color: black; margin-top:-7px;">

        <div class="col-12 col-md-6 ">
            <div class="about-us-thumbnail mb-50 position-relative">
                <img src="asset/img/stone.png" style="width:100%;" alt="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class=" about-us-thumbnail mb-50 position-relative">
                <div class="robot-content position-absolute"
                    style="transform:translate(-50%,-50%);top:50%; left:50%;color:black;">
                    <p style="color: white; font-weight: bold;">THIS IS OUR FUTURE</p>
                    <p style="font-size:50px; font-weight: bold; color: #3DA9DE;line-height:50px;">Pick Your Favourite
                    </p>
                    <hr style="background-color: #3DA9DE;">
                    <p style=" font-size:15px; color:white">From field trips to teacher resources, MSI provides learning
                        experiences both inside and outside the classroom</p>
                    <a href="store.php">
                        <p style="font-size:15px;color: #3DA9DE;font-weight: bold;"><i
                                class="fa-solid fa-chevron-right"></i>&nbsp;&nbsp;Save Your Gifts </i>&nbsp;<i
                                class="fa-solid fa-tag"></i></p>
                    </a>
                    <?php
                    foreach($products as $item){
                        echo '<a href="detail.php?id='.$item['id'].'"><span><img class="pick-fav" src="'.$item['thumbnail'].'"
                        style="width:100px;border:4px solid #3DA9DE; border-radius: 5px 5px 5px;margin-right:5px;"
                        alt=""></span></a>';
                    }
                    ?>

                </div>
            </div>
        </div>



    </div>

    <div class="quote row align-items-center" style="height: 300px;background-color: #3DA9DE;">

        <div class="col-12 col-md-12 col-sm-6 ">
            <div class="position-absolute"
                style="transform:translate(-50%,-50%);top:50%; left:50%; text-align: center;">
                <p style="color: white; font-weight: bold;font-size:30px;"><i class="fa-solid fa-book"></i></p>
                <p style="font-size:20px; font-weight: bold; color: white;line-height:30px;  font-style: italic;">"This
                    might be my most favorite museum in SaiGon. [ECO] done a lot to take it beyond the '80s style
                    exhibits into more, flashy 21st century displays."</p>
                <p style=" font-size:15px; color:white">Rachel Azark CBS Chicago</p>

            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-image-full col-12 col-md-12"
    style="background-image: url('asset/img/dinohorn.jpg');height: 100vh; background-size: cover;">
    <div class=" my-5">
        <div class=" position-absolute"
            style="width: 500px;transform:translate(-50%,-50%);top:50%; left:30%;color:black;">
            <div class="support">
                <p class="support-title1" style="color: white; font-weight: bold;">GET INVOLVED</p>
                <p class="support-title2" style="font-size:50px; font-weight: bold; color: #3DA9DE;line-height:50px;">
                    Support
                    the Museum</p>
                <hr style="background-color: #3DA9DE;">
                <p style=" font-size:15px; color:white">Help us transform lives through the power of science and science
                    education—inside the Museum, in our schools and beyond—with your support of MSI.</p>
                <p style="font-size:15px;color: #3DA9DE;font-weight: bold;"><i
                        class="fa-solid fa-chevron-right"></i>&nbsp;&nbsp;Become a member</p>
                <p style="font-size:15px;color: #3DA9DE;font-weight: bold;"><i
                        class="fa-solid fa-chevron-right"></i>&nbsp;&nbsp;Donate now</p>
                <p style="font-size:15px;color: #3DA9DE;font-weight: bold;"><i
                        class="fa-solid fa-chevron-right"></i>&nbsp;&nbsp;Be a corporate partner</p>
            </div>
        </div>
    </div>
</div>
<?php
      include('footer.php')
?>
<!-- Footer -->