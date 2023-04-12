<?php
include ('header.php');
$exploreId = getGet('id');
$sql = "select * from explore where id = $exploreId";
$explore = executeResult($sql,true);
$sql = "select * from explore_thumbnails where explore_id = $exploreId order by id desc limit 0,2";
$exploreThumbs = executeResult($sql);
$sql = "select * from explore_thumbnails where explore_id = $exploreId order by id asc limit 1";
$firstThumb = executeResult($sql,true);
$sql ="SELECT explore.*, explore_thumbnails.thumbnail AS subthumbs 
FROM explore 
JOIN explore_thumbnails ON explore.id = explore_thumbnails.explore_id 
WHERE explore.id != $exploreId 
LIMIT 0,2";
$otherExplores = executeResult($sql);
?>
<style>
body {
    background-color: #040D25 !important;
}

.carousel-caption-button-edit:hover {
    color: #EFBF29;
    background-color: rgba(252, 252, 252, 0.1) !important;
    border: 4px solid #EFBF29 !important;
}

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

.slider-exhibit {
    margin-top: -180px;
}

.small-ticket {
    font-weight: bold;
    font-family: 'Poppins';
    border: none;
    background-color: #EFBF29;
    width: 120px;
    height: 50px;
    color: white;
    text-shadow: 0px 2px 5px #434343;
}

.small-ticket:hover {
    font-weight: bold;
    font-family: 'Poppins';
    border: none;
    background-color: rgba(252, 252, 252, 0.1);
    width: 120px;
    height: 50px;
    color: white;
    text-shadow: 0px 2px 5px #434343;
}


.overview-background {
    background-color: #040D25;
    height: 900px;
}

@media only screen and (max-width: 600px) {
    .slider-exhibit {
        margin-top: 0px;
    }

    .overview-list {
        text-align: left;
        margin-top: 9%;
        margin-left: 2%;
    }

    .overview-list ul li {
        list-style-type: none;
        display: inline;
        padding-right: 50px;
        font-size: 15px;
        font-weight: bold;
        color: white;
    }


    .overview-background {
        background-color: #040D25;
        height: 1000px;
    }

    .overview-content {
        text-align: left;
        color: white;
        font-family: 'Marcellus', serif;
        width: 400px;
        margin-left: 10%;
        margin-top: 60px;
    }

    .overview-title1 {
        font-size: 25px;
    }

    .overview-title2 {
        text-decoration: underline;
    }

    .overview-note {
        margin-top: 150px;
    }

    .overview-note ul li {
        list-style-type: none;
        color: white;
        margin-bottom: 30px;

        font-size: 20px;
        font-weight: bold;
    }

    .overview-note ul li i {
        color: #EFBF29;
    }

    .presented-img {
        width: 400px;
    }

}

.more-to-ex {
    font-size: 25px !important;
    margin-top: 50px !important;
    margin-bottom: 20px !important;
}

.more-to-ex-card {
    margin-bottom: 20px !important;

}

.more-to-ex-btn {
    background-color: #3DA9DE;
    color: white;
    height: 40px;
    font-size: 20px;
    font-weight: bold;
    width: 100%;
    border: none;
}

.more-to-ex-btn:hover {
    background-color: rgba(252, 252, 252, 0.1);
    color: white;
    height: 40px;
    font-size: 20px;
    font-weight: bold;
    width: 100%;
    border: none;
}
</style>
<!-- slide show -->
<div id="carouselExampleIndicators" class="carousel slide slider-exhibit" data-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active position-relative">
            <img class="d-block w-100" src="<?=$explore['thumbnail']?>" alt="First slide">
            <div class="carousel-caption">
                <p class="carousel-caption-title1" style="font-family: 'Marcellus', serif; font-size:20px;">
                    EXPLORE&ensp;>&ensp;<?=$explore['title']?></p>
                <p class="carousel-caption-title2"
                    style="font-weight:800; font-size:65px;width: 600px;line-height:80px;"><?=$explore['title']?>.</p>
                <!-- <button  type="button" class="btn carousel-caption-button-edit"><i class="fa-regular fa-calendar-check"></i>&ensp; BOOK NOW</button> -->
                <a href="#"><button class=" main-button-edit color-1"><i class="fa-regular fa-calendar-check"></i>&ensp;
                        BOOK
                        NOW</button></a>
                <p class="carousel-caption-title4" style="color:white;font-size:15px;"><i style="color:#EFBF29"
                        class="fa-solid fa-clock"></i>&nbsp;&nbsp;&nbsp;Museum hours<br><span style="color:#7D7D7D">Open
                        today from 9:30 a.m. to 4:00 p.m.</span></p>
            </div>


        </div>
    </div>
</div>
<!-- slide show -->

<div class="row no-gutters">
    <div class="col-12 col-md-7 overview-background ">
        <div class="overview-list">
            <ul>
                <li style="color:#EFBF29 !important;text-decoration: underline;">Overview</li>
                <li>Awards</li>
                <li>Gallery</li>
                <li>Artists</li>
            </ul>
        </div>
        <div class="overview-content">
            <p class="overview-title1"><?=$explore['title']?></p>
            <p><?=$explore['description']?><br><br>
                <?=$explore['title']?> is open through September 4, 2023.<br>
            <p style="font-weight:bold;font-size:25px;color:#EFBF29">Ticket</p>
            <?=$explore['title']?> is included in Museum Entry and requires a separate, timed-entry ticket. Add this
            ticket to your order after selecting your Museum Entry date and time.<br><br>
            <p style="font-weight:bold;">Adults <span style="font-weight:300;font-style:italic;color:#CACACA">(age
                    12+)</span> $20</p>
            <p style="font-weight:bold;margin-top:-10px;">Children <span
                    style="font-weight:300;font-style:italic;color:#CACACA">(age 3-11)</span> $10</p>
            <a href="ticket.php"><button class="small-ticket mb-3">Ticket</button></a>
            <span style="font-style:italic;color:#CACACA;font-size:15px;"><br><?=$explore['title']?> <span
                    style="color:#CACACA;font-size:15px;font-style:normal;">spancontains themes of natural disaster and
                    death, including the display of body casts. A gallery within the exhibition—which may be
                    bypassed—contains adult content, themes and artifacts which may not be suitable for all
                    guests.</span>

                </p>

        </div>
    </div>
    <div class="col-12 col-md-5" style="background-color: #101E53; height:900px;">
        <div class="overview-note">
            <ul>
                <li><i class="fa-solid fa-users"></i><span>&ensp;For all ages.</span></li>
                <li><i class="fa-brands fa-guilded"></i></i><span>&ensp;Main Level, West side</span></li>
                <li><i class="fa-solid fa-building-columns"></i></i><span>&ensp;Museum entry</span></li>
                <li><i class="fa-solid fa-wheelchair"></i></i><span>&ensp;Accessibility</span></li>
            </ul>
        </div>
    </div>
    <!-- endrow   -->
</div>
<div class="container">
    <div class="col-md-12">
        <div class="slideshow-explore " style="padding:auto ">
            <div id="carouselwithIndicators" class="slideshow-explore-inner carousel slide w-100" data-ride="carousel">
                <div class=" carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?=$firstThumb['thumbnail']?>" alt="First slide">
                    </div>
                    <?php
                    foreach($exploreThumbs as $item){
                        echo '<div class="carousel-item">
                        <img class="d-block w-100" src="'.$item['thumbnail'].'" alt="Third slide">
                    </div>';
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselwithIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselwithIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12"
        style="color: gray; font-weight: bold; font-size: 20px;margin-bottom:20px;margin-top:20px;">Presented By</div>
    <img class="mx-auto d-block presented-img" src=""
        data-srcset="
							https://www.msichicago.org/fileadmin/assets/_processed_/a/0/csm_pompeii_sponsors_lockup_1060x97_e310df9c63.png 480w,
							https://www.msichicago.org/fileadmin/assets/_processed_/a/0/csm_pompeii_sponsors_lockup_1060x97_ef1f775d15.png 600w,
							https://www.msichicago.org/fileadmin/assets/_processed_/a/0/csm_pompeii_sponsors_lockup_1060x97_b70445781d.png 768w,
							https://www.msichicago.org/fileadmin/assets/whats_here/exhibits/temporary/2023/pompeii/pompeii_sponsors_lockup_1060x97.png 1060w" data-sizes="auto" alt=""
        title="" class="lazyautosizes lazyloaded" sizes="914px"
        srcset="
							https://www.msichicago.org/fileadmin/assets/_processed_/a/0/csm_pompeii_sponsors_lockup_1060x97_e310df9c63.png 480w,
							https://www.msichicago.org/fileadmin/assets/_processed_/a/0/csm_pompeii_sponsors_lockup_1060x97_ef1f775d15.png 600w,
							https://www.msichicago.org/fileadmin/assets/_processed_/a/0/csm_pompeii_sponsors_lockup_1060x97_b70445781d.png 768w,
							https://www.msichicago.org/fileadmin/assets/whats_here/exhibits/temporary/2023/pompeii/pompeii_sponsors_lockup_1060x97.png 1060w">
</div>

</div>

<div class="container" style="margin-bottom: 50px;">
    <div class="row">
        <div class="col-12 col-md-12 more-to-ex"
            style="color: white; font-weight: bold; font-size: 30px;margin-top: 100px;margin-bottom:20px;">More To
            Explore
            <hr style="background-color: #3DA9DE; height:1px;">
        </div>
        <?php
        foreach($otherExplores as $item){
            echo
            '<div class="more col-12 col-md-6 more-to-ex-card">
            <img src="'.$item['subthumbs'].'" style="width:100%;height:300px;" alt="">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.8)"></div>
            <button class="more-to-ex-btn"
                >'.$item['title'].'&ensp;&ensp;<i class="fa-solid fa-circle-play"></i></button>
        </div>';
        }
        ?>
    </div>

</div>
</div>
</div>
<?php
include('footer.php')
?>