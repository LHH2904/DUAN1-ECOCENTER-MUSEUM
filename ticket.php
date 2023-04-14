<?php
$title="Ticket";
include('header.php');

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
    top: 76%;
}

.visit-button-edit {
    width: 230px;
    height: 70px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 0 0 0 0;
    color: white;
    background-color: #3DA9DE;
}

.visit-button-edit:hover {
    color: #3DA9DE;
    background-color: white;
    border: 4px solid #3DA9DE;
}

.are-u-mem {
    height: 60px;
    width: 100%;
    background-color: white;
    border: 1px solid #040D25;
    border-left: 6px solid #040D25;
    margin-bottom: 30px;
    padding-left: 20px;
}

.who-coming {
    height: 450px;
    width: 100%;
    background-color: white;
    border: 1px solid #040D25;
    margin-bottom: 20px;
    padding-left: 20px;
    padding-top: 20px;
    padding-right: 20px;
}

.order-summary {
    height: 150px;
    width: 100%;
    background-color: #E2F0FA;
    padding-top: 20px;
    /* background-color:#2A8CE8; */
    /* background-image: linear-gradient(to right, #1B3872, #101F53); */
    background-color: #040D25;
    color: white;
}

.order-summary h4 {
    font-weight: bold;
}

.ticket-order-btn {
    width: 250px;
    margin: auto;
    height: 60px;

    color: white;
    font-weight: bold;
    border: none;
    /* background-image: linear-gradient(to right, #1B3872 , #101F53); */
    background-color: #040D25;
    font-size: 17px;

}

.ticket-order-btn:hover {
    border: 4px solid #040D25;
    background-color: white;
    color: #040D25;
}
</style>
<div class="row align-items-center position-relative"
    style="height: 350px;background-image: url('asset/img/ticketbanner.jpg');background-size:cover; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        TICKETING
    </div>
</div>

<div class="container col-12" style="height: 50px;"></div>
<div class="container ">
    <!-- FORM SESSION -->
    <form method="post" action="checkout-ticket.php">
        <div class="row">
            <div class="col-8 col-md-8">
                <div class="are-u-mem" style="padding-top:16px;">
                    <i class="fa-solid fa-circle-exclamation" style="color:#040D25"></i>&ensp;Are you a member? <a
                        href="" style="color:black;text-decoration:underline">Log in</a> for free & discounted tickets.
                    <a href="" style="color:black;text-decoration:underline">Sign up</a> now!
                </div>
                <div class="who-coming">
                    <p class="col-12" style="font-size:20px; font-weight:bold;color:#040D25;margin-bottom:50px;">Who’s
                        coming to the museum?</p>
                    <div class="d-flex" style=" gap:50px;margin-bottom:30px;">
                        <p class="col-4" style="border-bottom:1px solid #040D25;height:30px;">Ticket Type </p>
                        <p class="col-3 text-right" style="border-bottom:1px solid #040D25;height:30px; ">Price</p>
                        <p class="col-3 text-right" style="border-bottom:1px solid #040D25;height:30px; ">Quantity</p>
                    </div>
                    <div class="d-flex" style=" gap:50px;margin-bottom:50px;">
                        <p class="col-4" style="height:30px;"><span
                                style="color:#040D25;font-size:20px;font-weight:bold">Adult</span><br>Ages 12+</p>
                        <p class="col-3 text-right" style="height:30px; padding-top:15px;">$20.95</p>
                        <p style="height:30px; padding-top:20px;z-index:10; margin-left:20px;"
                            class="quantity col-3 d-flex   align-items-center justify-content-center">
                            <button type="button" class="quantity__minus btn btn-primary"
                                style="background-color:#040D25; border:1px solid black; color:white;  border-radius: 4px 0px 0px 4px;font-weight:bold; width:30px;height:30px;padding: 0px;">-</button>
                            <input style="width: 50px;height:30px; text-align:center; border:1px solid #162B63"
                                class="quantity__input" type="number" value="0" min="0" name="num_adult">
                            <button type="button" class="quantity__plus btn btn-primary"
                                style="background-color:#040D25; border:1px solid black; color:white; border-radius: 0px 4px 4px 0px;font-weight:bold;width:30px;height:30px;padding: 0px;">+</button>
                        </p>
                    </div>
                    <div class="d-flex" style=" gap:50px;margin-bottom:50px;">
                        <p class="col-4" style="height:30px;"><span
                                style="color:#040D25;font-size:20px;font-weight:bold">Child</span><br>Ages 3-11</p>
                        <p class="col-3 text-right" style="height:30px; padding-top:15px;">$10.95</p>
                        <p style="height:30px; padding-top:20px;z-index:10; margin-left:20px;"
                            class="quantity col-3 d-flex   align-items-center justify-content-center">
                            <button type="button" class="quantity__minus btn btn-primary"
                                style="background-color:#040D25; border:1px solid black; color:white;  border-radius: 4px 0px 0px 4px;font-weight:bold; width:30px;height:30px;padding: 0px;">-</button>
                            <input style="width: 50px; text-align:center;height:30px;; border:1px solid #162B63"
                                class="quantity__input" type="number" value="0" min="0" name="num_child">
                            <button type="button" class="quantity__plus btn btn-primary"
                                style="background-color:#040D25; border:1px solid black; color:white; border-radius: 0px 4px 4px 0px;font-weight:bold;width:30px;height:30px;padding: 0px;">+</button>
                        </p>
                    </div>

                    <p class="col-12">
                        <input class="margin-right:5px;" style="width:15px;height:15px;" type="checkbox"
                            class="form-check-input" id="exampleCheck1">
                        &ensp;Will you be redeeming CityPASS vouchers for this visit?
                    </p>
                </div>
                <!-- Submit button -->
                <button type="submit" class="ticket-order-btn "><i class="fa-solid fa-ticket"></i></i>&ensp; ADD
                    TICKET
                    &ensp;<i class="fa-solid fa-chevron-right"></i></button>
    </form>
</div>
<div class="col-4 col-md-4 order-md-2 mb-4">

    <div class="order-summary text-center">
        <h4>Order Summary</h4>
        <hr style="background:#EEEEEE; height: 0.001em;">
        <p>There are no items</p>
    </div>
</div>
</div>
</div>

<script>
const quantityMinus = document.querySelectorAll('.quantity__minus');
const quantityPlus = document.querySelectorAll('.quantity__plus');
const quantityInputs = document.querySelectorAll('.quantity__input');

function decreaseQuantity(event) {
    let currentQuantityInput = event.target.parentNode.querySelector('.quantity__input');
    let currentValue = Number(currentQuantityInput.value);
    if (currentValue >= 1) {
        currentQuantityInput.value = currentValue - 1;
    }
}

function increaseQuantity(event) {
    let currentQuantityInput = event.target.parentNode.querySelector('.quantity__input');
    let currentValue = Number(currentQuantityInput.value);
    currentQuantityInput.value = currentValue + 1;
}

for (let i = 0; i < quantityMinus.length; i++) {
    quantityMinus[i].addEventListener('click', decreaseQuantity);
}

for (let i = 0; i < quantityPlus.length; i++) {
    quantityPlus[i].addEventListener('click', increaseQuantity);
}
</script>

<script type="text/javascript">
$('button.ticket-order-btn').click(function() {
    const numChild = $('input[name="num_child"]').val();
    const numAdult = $('input[name="num_adult"]').val();
    $.ajax({
        url: 'checkout-ticket.php',
        method: 'POST',
        data: {
            num_child: numChild,
            num_adult: numAdult
        },
        success: function(response) {
            window.open('checkout-ticket.php', );
        }
    });
});
</script>
<div class="container col-12" style="height: 50px;"></div>
<?php include('footer.php')
?>