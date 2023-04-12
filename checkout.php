<?php
require_once ('header.php');
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
</style>
<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        CHECK OUT
    </div>
</div>
<div class="container col-12" style="height: 100px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted" style=" font-weight:bold;">Your cart</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <?php
             if(!isset($_SESSION['cart'])){
                     $_SESSION['cart']=[];
                    }                  
                        $index = 0;
                        $total=0;
                        $totalnum=0;
                    foreach($_SESSION['cart'] as $item){
                        $total+=$item['discount']*$item['num'];
                        $totalnum+=$item['num'];
                            echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="media align-items-center">
                                <img style="width:50px" src="'.$item['thumbnail'].'" class="d-block" alt="">
                                <div class="media-body">
                                    <a href="#" class="d-block text-dark pl-2"
                                        style="font-size:12px; font-family: Montserrat, sans-serif;font-weight: 600;">'.$item['title'].'</a>
                                    <a href="#" class="d-block text-dark pl-2"
                                        style="font-size:12px; font-family: Montserrat, sans-serif;"><small>Quality:
                                            '.$item['num'].'</small></a>
                                    <span class="text-muted">&nbsp; $'.number_format($item['discount'] * $item['num']).'</span>
                                </div>
                            </div>
                        </li>';
                       }
                ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total price</span>
                    <strong>$<?=number_format($total)?></strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3" style=" font-weight:bold;">Billing address</h4>
            <form class="needs-validation" method="post" onsubmit="return completeCheckout();">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input name="fullname" type="text" class="form-control" id="firstName"
                            placeholder="Your fullname" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="123 Hai Ba Trung"
                        required="">
                </div>
                <div class="mb-3">
                    <label for="address">Phone number</label>
                    <input required name="phone_number" type="text" class="form-control" id="exampleInputPassword1"
                        placeholder="0123456789">
                </div>
                <!-- Note input -->
                <div class=" mb-3">
                    <label class="form-label" for="form4Example1">Note</label>
                    <textarea name="note" class="form-control" id="" cols="50" rows="3"></textarea>
                </div>
                <hr class="mb-4">
                <button class="checkout-eco-btn" style="font-size:18px; font-weight:bold;" type="submit">Continue to
                    checkout</button>
            </form>
            <!-- <button class="btn btn-danger">Checkout MOMO</button> -->
        </div>
    </div>
</div>
<div class="container col-12" style="height: 100px;"></div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function completeCheckout() {
    $.post('api/ajax_request.php', {
            'action': 'checkout',
            'fullname': $('[name=fullname]').val(),
            'email': $('[name=email]').val(),
            'phone_number': $('[name=phone_number]').val(),
            'address': $('[name=address]').val(),
            'note': $('[name=note]').val(),
        },
        function() {
            window.open('complete.php', '_self');
        })
    return false;
}
</script>
<?php
require_once ('footer.php');
?>