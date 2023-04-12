<?php
$title="Cart";
require_once ('header.php');

?>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
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

.add-to-cart-btn {
    width: 250px;
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
        YOUR CART
    </div>
</div>
<div class="container-fluid">
    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: bold;">Details</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <!-- Set columns width -->
                                <th style="font-weight: bold;" class="text-center py-3 px-4" style="min-width: 400px;">
                                    Product Name</th>
                                <th style="font-weight: bold;" class="text-right py-3 px-4" style="width: 100px;">Price
                                </th>
                                <th style="font-weight: bold;" class="text-center py-3 px-4" style="min-width: 120px;">
                                    Quantity</th>
                                <th style="font-weight: bold;" class="text-right py-3 px-4" style="width: 100px;">Total
                                </th>
                                <th style="font-weight: bold;" class="text-center align-middle py-3 px-0"
                                    style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title=""
                                        data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- database product -->
                            <?php
                            if(!isset($_SESSION['cart'])){
                            $_SESSION['cart']=[];
                                                }
                                    $index = 0;
                                    $total = 0;
                        foreach($_SESSION['cart'] as $item){
                            $total+= $item['discount'] * $item['num'];
                            echo '<tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <img src="'.$item['thumbnail'].'"
                                        class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                    <div class="media-body">
                                        <p class="d-block text-dark" style=" font-weight: 600;">'.$item['title'].'
                                        </p>
                                        <small>
                                            <span class="text-muted">Color:</span>
                                            <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                                style="background:black;"></span> &nbsp;
                                            <span class="text-muted">Ships from: </span> America
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td style="font-weight: 600;" class="text-right font-weight-semibold align-middle p-4">
                            $   '.number_format($item['discount']).'</td>
                            <td class="align-center p-4">
                                <div class="d-flex align-items-center justify-content-center"
                                    style="padding-top:18px;">
                                    <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', -1)">-</button>
                                    <input type="number" id="num_'.$item['id'].'" value="'.$item['num'].'" class="form-control" style="text-align:center;width: 90px; border-radius: 0px" onchange="fixCartNum('.$item['id'].')"/>
                                        <button class="btn btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart('.$item['id'].', 1)">+</button>
                                </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4" style="font-weight: 600;">
                            $ '.number_format($item['discount'] * $item['num']).'</td>
                            <td class="text-center align-middle px-2"><button
                                    onclick="updateCart('.$item['id'].', 0)"
                                    class="shop-tooltip close float-none text-danger" title=""
                                    data-original-title="Remove">×</button></td>
                        </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal">Promocode</label>
                        <input type="text" placeholder="ABC" class="form-control">
                    </div>
                    <div class="d-flex">

                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large" style="font-weight: bold;">$<?=number_format($total)?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="float-right">
                    <a href="checkout.php"><button type="button" style="font-weight: 600; font-size:15px;"
                            class=" btn btn-lg btn-primary mt-2 add-to-cart-btn"><i
                                class="fa-regular fa-credit-card"></i>&ensp;CHECKOUT</button></a>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function addMoreCart(id, delta) {
    num = parseInt($('#num_' + id).val())
    num += delta;
    if (num < 1) num = 1;
    $('#num_' + id).val(num);
    updateCart(id, num)
}

function fixCartNum(id) {
    $('#num_' + id).val(Math.abs($('#num_' + id).val()))
    updateCart(id, $('#num_' + id).val())
}

function updateCart(productId, num) {

    $.post('api/ajax_request.php', {
        'action': 'update',
        'id': productId,
        'num': num
    }, function(data) {
        location.reload();
    })
}
</script>
<?php
require_once ('footer.php');
?>