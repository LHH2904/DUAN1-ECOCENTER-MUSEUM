<?php
include('header.php')
?>
<style>
.page-title {
    color: white;
    font-weight: bold;
    font-size: 80px;
    letter-spacing: -5px;
    position: absolute;
    transform: translate(-50%-50%);
    left: 210px;
    top: 74%;
}

.checkout-eco-btn {
    width: 100%;
    background-color: #121F6A;
    color: white;
    border: none;
    height: 45px;
    cursor: pointer;
    border-radius: 3px 3px 3px;
}

.checkout-eco-btn:hover {
    background-color: white;
    color: #121F6A;
    border: 3px solid #121F6A;
}

.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
    vertical-align: middle;
}

.com-button-edit {
    width: 230px;
    height: 70px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 0 0 0 0;
    color: white;
    background-color: #121F6A;
    border: none
}

.com-button-edit:hover {
    color: #121F6A;
    background-color: white;
    border: 4px solid #121F6A;
}
</style>
<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        COMPLETED
    </div>
</div>
<div class="container col-12" style="height: 50px;"></div>

<div class="row d-flex justify-content-center">
    <div class="text-center" style="width:900px;height:450px;background-color:white; box-shadow: 1px 10px 15px gray;">
        <img class="img-fluid" style="width:18%;margin-top:50px;"
            src="https://icons.veryicon.com/png/o/system/revision-background/order-details-order-status.png" alt="">
        <div>
            <h2 style="font-weight: 600;">Your order is completed</h2>
        </div>
        <div>
            <p class="text-muted" style="font-size:15px">You will receive your detail cart in your email later</p>
        </div>
        <a href="index.php"><button style="margin-top:30px;" type="button" class="com-button-edit">Explore
                More</button></a>
    </div>

</div>



<div class="container col-12" style="height: 50px;"></div>
<?php
include('footer.php')
?>