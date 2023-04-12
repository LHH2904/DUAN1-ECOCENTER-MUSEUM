<?php
$title="Category";
require_once ("header.php");
$category_id = getGet('id');
if($category_id == null || $category_id ==''){
$sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.updated_at asc limit 0,20 ";}
else{
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = $category_id and deleted = 0 order by updated_at asc limit 0,8 ";
}
$categoryItem  = executeResult($sql);

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
    transform: translate(-50% -50%);
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
</style>
<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        REPLICA
    </div>
</div>


<div class="container col-12" style="height: 35px;"></div>

<div class="container">

    <img class="w-100" src="asset/img/category/categorybanner.gif" alt="">
    <div class="container col-12" style="height: 35px;"></div>

    <div class="div" style="background-color:#E1E1E1;">
        <div class="row text-center pt-4">

            <div class="col-12 col-md-4">
                <i class="fa-solid fa-cube" style="font-size:35px;"></i>
                <p class="mt-4 text-align-center" style="font-size:12px; font-weight:bold;">Our postage charges include
                    all duties</p>
            </div>
            <div class="col-12 col-md-4">
                <i class="fa-solid fa-truck" style="font-size:35px;"></i>
                <p class="mt-4 text-align-center" style="font-size:12px; font-weight:bold;">Free SG standard delivery on
                    orders over $100</p>
            </div>
            <div class="col-12 col-md-4">
                <i class="fa-solid fa-building-columns" style="font-size:35px;"></i>
                <p class="mt-4 text-align-center" style="font-size:12px; font-weight:bold;">Every purchase supports the
                    Ecology Center</p>
            </div>
        </div>
    </div>


    <div class="col-12" style="height: 35px;"></div>

    <div class="row">

        <!-- product card -->
        <?php
        foreach($categoryItem as $item){
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
require_once('footer.php');
?>