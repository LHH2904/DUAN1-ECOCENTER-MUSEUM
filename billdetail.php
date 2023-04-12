<?php
    $title="Bill-Detail";
    include ('header.php');
    $orderId = getGet('id');
    $sql = "select order_details.*,product.title,product.thumbnail,product.discount from order_details left join product on product.id=order_details.product_id where order_details.order_id = $orderId" ;
    $data = executeResult($sql);
    $sql = "Select * from orders where id = $orderId";
    $orderItem=executeResult($sql,true);
?>

<style>
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

@media (min-width: 1025px) {
    .h-custom {
        height: 100vh !important;
    }
}

.horizontal-timeline .items {
    border-top: 2px solid #ddd;
}

.horizontal-timeline .items .items-list {
    position: relative;
    margin-right: 0;
}

.horizontal-timeline .items .items-list:before {
    content: "";
    position: absolute;
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background-color: #ddd;
    top: 0;
    margin-top: -5px;
}

.horizontal-timeline .items .items-list {
    padding-top: 15px;
}
</style>
<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        BILLS DETAILS
    </div>
</div>
<section class="" style="background-color: white;">
    <div class="container py-5 ">
        <div class="row d-flex  ">
            <!-- order -->
            <div class="col-lg-8 col-xl-6">
                <div class="card border-top border-bottom border-3" style="border-color: #121F6A !important;">
                    <div class="card-body p-5">

                        <p class="lead fw-bold mb-5" style="color: #121F6A;font-weight:bold">Purchase Reciept</p>

                        <div class="row">
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Date</p>
                                <p>10 April 2021</p>
                            </div>
                            <div class="col mb-3">
                                <p class="small text-muted mb-1">Order No.</p>
                                <p><?=$orderItem['code']?></p>
                            </div>
                        </div>

                        <div class="mx-n5 px-5 py-4" style="background-color: #121F6A; color:white;">
                            <div class="row">
                                <!-- prod -->

                                <?php
                                foreach($data as $item){
                                    echo '
                                   
                                    <div class="col-md-2 col-lg-2 mb-4">
                                    <img style="width:60px; heigth:60px; border-radius:50%" src="'.$item['thumbnail'].'" alt="">
                                </div>
                                <div class="col-md-2 col-lg-3" style="font-size:15px;">
                                    <p>'.$item['title'].'</p>
                                </div>
                                <div class="col-md-2 col-lg-2">
                                    <p>$'.$item['price'].'</p>
                                </div>
                                <div class="col-md-2 col-lg-2">
                                    <p>x '.$item['num'].'</p>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                    <p>$'.number_format($item['price']*$item['num']).'</p>
                                </div>   
                               
                                ';
                                }
                                ?>
                                <!-- prod -->
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-md-4 offset-md-8 col-lg-5 offset-lg-9">
                                <p class="lead fw-bold mb-0" style="color: #121F6A;font-weight:bold">
                                    $<?=$orderItem['total_money']?></p>
                            </div>
                        </div>

                        <p class="fw-bold mb-2 pb-2" style="color: #121F6A;">Name: <?=$orderItem['fullname']?></p>
                        <p class=" fw-bold mb-2 pb-2" style="color: #121F6A;">Address: <?=$orderItem['address']?></p>
                        <p class=" fw-bold mb-2 pb-2" style="color: #121F6A;">Phone: <?=$orderItem['phone_number']?></p>



                        <p class="mt-4 pt-2 mb-0">Want any help? <a href="contact.php" style="color: #121F6A;">Please
                                contact
                                us</a></p>

                    </div>
                </div>
            </div>
            <!-- order -->



        </div>
    </div>
</section>

<?php
include('footer.php')
?>