<?php
$title="Store";
include ('header.php');
$sql = "select * from product where deleted = 0  order by id desc limit 0,3";
$titleProduct = executeResult($sql);
$sql = "select * from product where deleted = 0";
$allProduct = executeResult($sql);

?>
<style>
body {
    background: #F7F7F7;
}

.page-title {
    color: white;
    font-weight: bold;
    font-size: 80px;
    letter-spacing: -5px;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 210px;
    top: 74%;
}

.circle-store {
    position: relative;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    /* background: rgb(210, 210, 210); */
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo-store {
    position: absolute;
    width: 180px;
    height: 180px;
    background: url(asset/img/test/trojan.png);
    background-size: cover;
    border-radius: 50%;
    filter: brightness(1);
}

.text-store {
    position: absolute;
    width: 100%;
    height: 100%;
    /* font-size: 20px; */
    font-family: 'Poppins';
    color: white;
    animation: rotateText 10s linear infinite;

}

@keyframes rotateText {
    0% {
        transform: rotate(360deg);
    }
}

.text-store span {
    position: absolute;
    left: 50%;
    top: 0%;
    font-size: 1.2em;
    transform-origin: 0 125px;
}

.find-yours-btn {
    width: 170px;
    height: 50px;
    font-weight: bold;
    color: white;
    background-color: black;
    border: none;
}

.find-yours-btn:hover {
    color: black;
    background-color: white;
    border: 4px solid black;
}

.store-title {
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 20px;
}

/* [1] The container */
.product_item {
    /* [1.1] Set it as per your need */
    overflow: hidden;
    /* [1.2] Hide the overflowing of child elements */
}

/* [2] Transition property for smooth transformation of images */
.product_item img {
    transition: transform .5s ease;
}

/* [3] Finally, transforming the image when container gets hovered */
.product_item:hover img {
    transform: scale(1.3);
}

.category-button {
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    color: white;
    font-weight: bold;
    font-size: 25px;
    display: none;

}

.product_item .category-button {
    transition: transform .5s ease;
}

.product_item:hover .category-button {
    display: block;

}

.slider-exhibit {
    margin-top: -180px;
}
</style>
<!-- slide show -->
<div id="carouselExampleIndicators" class="carousel slide slider-exhibit" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block" style="width: 100%;" src="asset/img/store/banner/Group 22.jpg" alt="First slide">
            <div class="carousel-caption">

                <!-- <p class="carousel-caption-title2" style="font-family: 'Marcellus', serif;font-weight:800; font-size:65px;width: 600px;line-height:80px;">OUR SOURVENIR</p> -->
                <div class="circle-store">
                    <div class="logo-store"></div>
                    <div class="text-store">
                        <p>Cherish The ❋ Joys ❋ To Our Museum ❋</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h4 class="mt-5 mb-10 text-center" style="font-weight: bolder;font-size:50px;font-family: 'Marcellus', serif;">BRING
        HISTORY HOME WITH YOU</h4>
    <div class="col-12 text-center">
        <p>Take a Piece of History Home: Discover Unique Souvenirs at Our Museum Gift Shop!</p>
        <a href=""><button class="find-yours-btn">FIND YOURS</button></a>
    </div>
    <div class="col-12" style="height: 35px;"></div>
    <div class="row">
        <div class="store-title col-12 col-md-12 ">New Items</div>
        <!-- product card -->

        <?php
        foreach($titleProduct as $item){
            echo '<div class="col-4 col-md-4 mb-10 ">
            <a href="detail.php?id='.$item['id'].'">
                <div class="product_item"><img src="'.$item['thumbnail'].'" style="width:100%;" alt="">
                </div>
            </a>
            <a href="detail.php?id='.$item['id'].'">
                <p class="tittle-hover mt-2" style="font-weight:bold;color:black; font-size:18px" class=" h5">
                    '.$item['title'].'</p>
            </a>
            <p style="font-weight:bold; color:gray; margin-top:-8px;" class="h6">
                $'.number_format($item['discount']).'</p>
            <div style="height: 40px;"></div>
        </div>';
        }
        ?>
        <!-- Popular -->
        <div class="store-title col-12 col-md-12 ">Must Have</div>
        <!-- Popular -->

        <div class="col-6 col-md-6 mb-10 ">
            <a href="detail.php?id='.$item['id'].'">
                <div class="product_item position-relative"><img style="width:100%;"
                        src="asset/img/store/banner/Group 23.jpg" alt="">
                    <p class="category-button">SHOP NOW &ensp;<i class="fa-solid fa-circle-chevron-right"></i></p>
                </div>
            </a>
            <div style="height: 40px;"></div>
        </div>
        <div class="col-6 col-md-6 mb-10 ">
            <a href="detail.php?id='.$item['id'].'">
                <div class="product_item position-relative"><img style="width:100%;"
                        src="asset/img/store/banner/Group 24.jpg" alt="">
                    <p class="category-button">SHOP NOW &ensp;<i class="fa-solid fa-circle-chevron-right"></i></p>
                </div>
            </a>

            <div style="height: 40px;"></div>
        </div>


        <!-- All Souvenirs -->
        <div class="store-title col-12 col-md-12 ">All Souvenirs</div>
        <!-- All Souvenirs -->
        <?php
        foreach($allProduct as $item){
            echo '<div class="col-4 col-md-4 mb-10 ">
            <a href="detail.php?id='.$item['id'].'">
                <div class="product_item"><img style="width:100%;" src="'.$item['thumbnail'].'" alt="">
                </div>
            </a>
            <a href="detail.php?id='.$item['id'].'">
                <p class="tittle-hover mt-2" style="font-weight:bold;color:black; font-size:18px" class=" h6">
                    '.$item['title'].'</p>
            </a>
            <p style="font-weight:bold; color:gray; margin-top:-8px;" class="h6">
                $'.number_format($item['discount']).'</p>
            <div style="height: 40px;"></div>
        </div>';
        }
        ?>
        <!-- product card -->
    </div>
</div>
<script>
const text = document.querySelector('.text-store p');
text.innerHTML = text.innerText.split("").map(
    (char, i) =>
    `<span style="transform:rotate(${i * 9.7}deg)">${char}</span>`
).join("")
</script>
<?php
include('footer.php')
?>