<?php
$title="Bill";
include ('header.php');
$user = getUserToken();
$userId = $user['id'];
$sql = "select * from orders where user_id = $userId ";
$billsOrder = executeResult($sql);
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

.bill-btn {
    margin-left: 100px;
    margin-top: -10px;
    width: 160px;
    height: 45px;
    border: none;
    background-color: #121F6A;
    color: white;
    font-weight: bold;
}

.bill-btn:hover {
    background-color: white;
    color: #121F6A;
    border: 4px solid #121F6A;
}
</style>
<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        YOUR BILL
    </div>
</div>
<section class="" style="background-color: white;">
    <div class="container py-5 ">
        <div class="row d-flex  ">
            <!-- order -->
            <?php
           if($billsOrder ==null || $billsOrder ==''){
            echo '<div class="alert alert-danger">
            <strong>SORRY</strong> THERE IS NO ORDER :(
          </div>';
           }else{
            {
                foreach($billsOrder as $item){
                    echo '     <div class="col-lg-8 col-xl-6 mt-4">
                    <div class="card border-top border-bottom border-3" style="border-color: #121F6A !important;">
                        <div class="card-body p-5">
    
                            <p class="lead fw-bold mb-5" style="color: #121F6A;font-weight:bold">Purchase Reciept</p>
    
                            <div class="row">
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Date</p>
                                    <p>'.$item['order_date'].'</p>
                                </div>
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">Order No.</p>
                                    <p>'.$item['code'].'</p>
                                </div>
                            </div>
    
                            <p class="fw-bold mb-2 pb-2" style="color: #121F6A;">Name:'.$item['fullname'].'</p>
                            <p class=" fw-bold mb-2 pb-2" style="color: #121F6A;">Address: '.$item['address'].'</p>
                            <p class=" fw-bold mb-2 pb-2" style="color: #121F6A;">Phone: '.$item['phone_number'].'</p>
                            <div class="row my-4">
                                <div class="col-md-4">
                                    <p class="lead fw-bold mb-0" style="color: #121F6A;font-weight:bold">TOTAL: $'.$item['total_money'].'</p>
                                </div>
                                <a href="billdetail.php?id='.$item['id'].'"><button class="bill-btn"
                                        >Click
                                        to See</button></a>
                            </div>
                        </div>
                    </div>
                </div>';
                }
               }
           }
            ?>
            <!-- order -->
        </div>
    </div>
</section>

<?php include('footer.php')
?>