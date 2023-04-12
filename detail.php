<?php


$title="Detail";
require_once ("header.php");
$productId = getGet('id');
$sql =  "Select product.*,category.name as category_name from product left join category on product.category_id = category.id where product.id = $productId and deleted = 0";
$product  = executeResult($sql,true);
$category_id = $product['category_id'];
$sql = "select product.*,category.name as category_name from product left join category on product.category_id = category_id where product.category_id = $category_id and deleted = 0 limit 0,2";
$relatedProduct = executeResult($sql);

?>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

body {
    background: #F7F7F7;
    /* background: white; */
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


.add-to-cart-btn {
    width: 80%;
    margin: auto;
    height: 60px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 0 0 0 0;
    color: white;
    background-color: #121F6A;
    border: none;
}

.add-to-cart-btn:hover {
    color: #121F6A;
    background-color: white;
    border: 4px solid #121F6A;
}
</style>
<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        VIEW ITEMS
    </div>
</div>
<div class="container col-12" style="height: 35px;"></div>

<div class="container">

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
        <div class="col-md-8 ">
            <img style="width: 100%;" src="<?=$product['thumbnail']?>" alt="">
        </div>
        <div class="col-md-4" style="position: sticky; top: 15px; z-index: 9999;">
            <div
                style="background-color:white;height: 640px; padding-left:20px; padding-top:20px;border:1px solid #E1E1E1;;">
                <h3 style="font-weight: 600; width: 80%;" class="mb-2 ">
                    <?=$product['title']?>
                </h3>

                <div class="price">
                    <p style="font-size:25px; font-weight: 600;">$<?=number_format($product['discount'])?></p>
                    <p class="mt-2 " style="font-size:15px;color:grey;text-decoration:line-through;">
                        $<?=number_format($product['price'])?>
                    </p>
                </div>
                <div class="sign-in-text mb-3" style="width: 80%;">
                    See if this sourvenir is compatible with your house in your Account <span><a href="#"
                            style="color:#121F6A; font-weight:bold;">Sign In</a></span>
                </div>
                <div class="amount">
                    <p class="mr-5" style="font-weight:bold">Quantity</p>
                    <button onclick="addMoreCart(-1)" type="button" class="minusAmount btn btn-outline-primary"
                        style="background-color:#121F6A; border:1px solid black; color:white;  border-radius: 4px 0px 0px 4px;font-weight:bold;height:37.5px;width:37.5px;margin-top:-1.5px;">-</button>
                    <input type="number" name="num" id="" value="1"
                        style="width: 60px;height:38px;border: solid #e0dede 1px; border-radius: 0px; text-align:center;margin-left:-4.5px;"
                        onchange="fixCartNum()" class="amountNumber">
                    <button onclick="addMoreCart(1)" type="button" class="btn btn-outline-primary plusAmount"
                        style="background-color:#121F6A; border:1px solid black; color:white; border-radius: 0px 4px 4px 0px;margin-left:-5px;font-weight:bold;height:37.5px;width:37.5px;margin-top:-1.5px;">+</button>
                </div>
                <button onclick="addCart(<?=$product['id']?>,$('[name=num]').val())" type="button"
                    class=" mt-3 add-to-cart-btn">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    &ensp;
                    Add to basket
                </button>

                <!-- <a href="cart.php"><button 
                type="button" class=" mt-3 add-to-cart-btn">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                &ensp;
                View Your Cart
                </button></a> -->



                <div class="return mt-3" style="width: 90%;">
                    <hr>
                    <span style="font-weight:bold;font-size: 20px;">Returns and FAQs:</span><br>
                    Please contact Customer Services within 14 days of delivery.
                    For more information, please see our FAQs page.
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="description">
                <p class="mr-5 mt-5" style="font-weight: 600;font-size:20px">About</p>
                <hr>
            </div>
            <div class="description-text">
                <p>
                    <?=$product['description']?>
                </p>
            </div>
        </div>
        <div class="col-12 col-md-12" style="font-weight: 600;font-size:20px;margin-bottom:10px;">
            <hr>You may also like
        </div>
        <?php
        foreach($relatedProduct as $item){
            echo ' <div class="col-4 col-md-4 mb-10 ">
            <a href="detail.php?id='.$item['id'].'">
                <div class="product_item"><img style="width:100%;" src="'.$item['thumbnail'].'" alt="">
                </div>
            </a>
            <a href="detail.php?id='.$item['id'].'">
                <p class="tittle-hover mt-2" style="font-weight:bold;color:black; font-size:18px" class=" h6">
                    '.$item['title'].'</p>
            </a>
            <p style="font-weight:bold; color:gray; margin-top:-8px;"  class="h6">
                $'.number_format($item['discount']).'</p>
            <div style="height: 40px;"></div>
        </div>';
        }
        ?>
    </div>

</div>
<script type="text/javascript">
function addMoreCart(delta) {
    num = parseInt($('[name=num]').val())
    num += delta
    if (num < 1) num = 1;
    $('[name=num]').val(num)
}

function fixCartNum() {
    $('[name=num]').val(Math.abs($('[name=num]').val()))
}
</script>
<?php
require_once('footer.php');
?>