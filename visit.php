<?php
 $title="Visit";
 include('header.php');
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
</style>

<div class="row align-items-center position-relative"
    style="height: 320px;background-color: #121F6A; margin-top:-180px; ">
    <div class="page-title col-12 col-md-6">
        VISIT US
    </div>
</div>

<div class="row align-items-center no-gutters">

    <div class="col-12 col-md-7">
        <div class="about-us-thumbnail mb-50 position-relative">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:49%;color:black;">
                <p style="color: #999999">FOR YOUR VIEW</p>
                <p style="font-size:50px; font-weight: bold; color: #121F6A">MUSEUM HOURS</p>
                <p style="font-family: 'Marcellus', serif;  color: #7D7D7D">MUSEUM OPEN DAILY 9AM–5PM (LAST ADMISSION AT
                    4PM)CLOSED THANKSGIVING DAY AND CHRISTMAS DAY</p>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-5 ">
        <div class="about-us-thumbnail mb-50 position-relative">
            <img src="asset/img/visit/museum.jpg" style="width:100%;" alt="">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:40%;color:white;">
                <p style="font-size:25px;font-family: 'Marcellus', serif;">Fuel your passion for discovery with
                    dinosaurs, ancient artifacts, cultural insights, and groundbreaking science.</p>
                <hr style="background-color: white;">
            </div>
        </div>
    </div>


    <div class="col-12 col-md-7 ">
        <div class="about-us-thumbnail mb-50 position-relative">
            <img src="asset/img/visit/foottouch.jpg" style="width:100%;" alt="">
            <p
                style="font-family: 'Marcellus', serif; font-size:15px;text-align:right; padding-left:30%;padding-top:1%; float:left;">
                Two kids touch the foot of Máximo, a cast of a titanosaur Patagotitan mayorum. You can greet him in
                person or text him at (+84) 935-153-639.</p>
        </div>
    </div>


    <div class="col-12 col-md-5">
        <div class="about-us-thumbnail mb-50 position-relative">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:40%;color:black;">
                <p style="font-size:50px; font-weight: bold; color: #121F6A;line-height:50px;">Member discover more</p>
                <p style="font-family: 'Marcellus', serif;  color: #7D7D7D">Save 10 percent off the cost of membership
                    when you join online today using promo code: MEMTEN</p>
                <button type="button" class="btn visit-button-edit"><i class="fa-solid fa-right-to-bracket"></i>&ensp;
                    JOIN TODAY</button>
            </div>
        </div>
    </div>




</div>

<div class="container-fluid" style="width: 75%;">
    <div class="row no-gutters">
        <div class="col-12 col-md-6">
            <div class="about-us-thumbnail mb-50 position-relative"
                style="height:200px; border-top: 0.5px ridge gray; border-bottom:1px solid gray; ">
                <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:33%;color:black;">
                    <p style="font-size:30px; font-weight: bold; color: #121F6A">GET TICKETS ONLINE</p>
                    <p style="font-family: 'Marcellus', serif;  color: #7D7D7D">Ordering advance tickets, including free
                        tickets for Illinois residents, is encouraged.</p>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6">
            <div class="about-us-thumbnail mb-50 position-relative"
                style="height:200px;  border-top:0.5px solid gray;border-bottom:1px solid gray; ">
                <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:80%;color:black;">
                    <button type="button" class="btn visit-button-edit"></i>&ensp;Reserve now</button>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-12">
            <p style="font-size:30px; font-weight: bold; color: #121F6A; margin-top: 5%;margin-bottom: 5%;">What to
                expect</p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-12 col-md-4">
            <img src="asset/img/visit/phone1.png" class=" rounded mx-auto d-block" style="width:120px;" alt="">
            <p class="mt-4 text-align-center">Advance ticket purchase is encouraged for the public. Members do not need
                to reserve tickets for the museum or special exhibitions, including the Dalí show.</p>
        </div>
        <div class="col-12 col-md-4">
            <img src="asset/img/visit/spoon.png" class=" rounded mx-auto d-block" style="width:120px;" alt="">
            <p class="mt-4 text-align-center">All cafés and restaurants, valet service, and the Member Lounge are
                currently unavailable.</p>
        </div>
        <div class="col-12 col-md-4">
            <img src="asset/img/visit/phone.png" class=" rounded mx-auto d-block" style="width:120px;" alt="">
            <p class="mt-4 text-align-center">The Dalí exhibition requires a free ticket and uses a virtual line which
                you can join when you arrive at the museum by scanning the QR code on signs near the entrances.</p>
        </div>
        <div class="col-12 col-md-12" style="height: 50px; "></div>
    </div>





</div>
<?php include('footer.php')
?>