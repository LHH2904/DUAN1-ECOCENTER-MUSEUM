<?php
$title="Checkout-ticket";
include('header.php');
if(isset($_POST['num_adult'])) {
    $num_adult = $_POST['num_adult'];
} else {
    $num_adult = 0;
}
if(isset($_POST['num_child'])) {
    $num_child = $_POST['num_child'];
} else {
    $num_child = 0;
}
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
    background-color: #E2F0FA;
    border: 1px solid #8FCFED;
    margin-bottom: 20px;
    padding-left: 20px;
    padding-top: 20px;
    padding-right: 20px;
}

.ticket-info {
    height: 480px;
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
    /* background-color: #E2F0FA; */
    padding-top: 20px;
    background-color: #040D25;
    /* background-image: linear-gradient(to right, #1B3872, #101F53); */
    color: white;
}

.order-summary h4 {
    font-weight: bold;
}

.order-summary-checkout {
    height: 250px;
    width: 100%;
    background-color: #040D25;
    padding-top: 20px;
    /* background-color:#2A8CE8; */
    /* background-image: linear-gradient(to right, #1B3872, #101F53); */
    color: white;
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
        YOUR INFO
    </div>
</div>
<div class="container col-12" style="height: 50px;"></div>
<div class="container ">
    <!-- FORM SESSION -->
    <div class="row">
        <div class="col-8 col-md-8">
            <div class="are-u-mem" style="padding-top:16px;">
                <i class="fa-solid fa-circle-exclamation" style="color:#040D25"></i>&ensp;Are you a member? <a href=""
                    style="color:black;text-decoration:underline">Log in</a> for free & discounted tickets.
                <a href="" style="color:black;text-decoration:underline">Sign up</a> now!
            </div>
            <div class="ticket-info">
                <p class="col-12" style="font-size:20px; font-weight:bold;color:#040D25;margin-bottom:30px;">Your
                    information</p>
                <!-- Card input -->
                <form method="post" onsubmit="return completeCheckoutTicket()" ;>
                    <div class=" col-12 form-outline mb-3">

                        <label class="form-label" for="form4Example1" style="color:#040D25;font-weight:bold">Payment -
                            Card Details</label>
                        <div class="input-group"> <input type="text" class="form-control ">
                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i
                                        class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i
                                        class="fab fa-cc-amex mx-1"></i> </span> </div>
                        </div>
                    </div>
                    <!-- Name input -->
                    <div class="col-12 form-outline mb-3">
                        <label class="form-label" for="form4Example1"
                            style="color:#040D25;font-weight:bold">Name</label>
                        <input name="fullname" type=" text" id="form4Example1" class="form-control " />
                    </div>
                    <!-- Email input -->
                    <div class="col-12 form-outline mb-3">
                        <label class="form-label" for="form4Example2" style="color:#040D25;font-weight:bold">Email
                            address</label>
                        <input name="email" type="email" id="form4Example2" class="form-control " />
                    </div>
                    <!-- Phone input -->
                    <div class="col-12 form-outline mb-3">
                        <label class="form-label" for="form4Example2" style="color:#040D25;font-weight:bold">Phone
                            number</label>
                        <input name="phone_number" type="text" id="form4Example2" class="form-control" />
                    </div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="ticket-order-btn"><i class="fa-solid fa-ticket"></i></i>&ensp; COMPLETE
                &ensp;<i class="fa-solid fa-chevron-right"></i></button>
            </form>
        </div>
        <div class="col-4 col-md-4 order-md-2 mb-4">
            <div class="order-summary-checkout ">
                <h4 class="text-center">Order Summary</h4>
                <hr style="background:#EEEEEE; height: 0.001em;">
                <p style="padding-left:20px;font-weight:bold">Museum Entry</p>
                <span style="padding-left:20px;"><?=$num_adult?></span><span style="padding-left:20px;">x</span><span
                    style="padding-left:20px;">Individual,Online-Aldult</span><span
                    style="padding-left:18px;">$<?=number_format($num_adult)*20.95?></span>
                <span style="padding-left:20px;"><?=$num_child?></span><span style="padding-left:20px;">x</span><span
                    style="padding-left:20px;">Individual,Online-Child</span><span
                    style="padding-left:22px;">$<?=number_format($num_child)*10.95?></span>
                <hr style="border:0.001em dashed #445581">
                <span style="padding-left:20px;font-weight:bold">Order Total</span> <span
                    style="padding-left:48%;font-weight:bold">$<?=number_format($num_adult)*20.95 + number_format($num_child)*10.95?></span>
            </div>
        </div>
    </div>

</div>
<div class="container col-12" style="height: 50px;"></div>
<script type="text/javascript">
function completeCheckoutTicket() {
    $.post('api/ajax_request.php', {
            'action': 'checkout-ticket',
            'name_ticket': $('[name=fullname]').val(),
            'email_ticket': $('[name=email]').val(),
            'phone_number_ticket': $('[name=phone_number]').val(),
            'num_adult': <?=$num_adult?>,
            'num_child': <?=$num_child?>,
        },
        function() {
            window.open('complete-ticket.php', '_self');
        })
    return false;
}
</script>
<?php include('footer.php');
?>