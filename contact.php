<?php
require_once ('header.php');
if(!empty($_POST)){
    $firstname = getPost('firstname');
    $lastname = getPost('lastname');
    $email = getPost('email');
    $phone_number = getPost('phone_number');
    $subject = getPost('subject');
    $note = getPost('note');
    $created_at = $updated_at = date('Y-m-d H:s:i');
    $sql="INSERT INTO `feedback`(`firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES ('$firstname','$lastname','$email','$phone_number','$subject','$note','$created_at','$updated_at','0')";
    execute($sql);
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
        CONTACT US
    </div>
</div>

<div class="row align-items-center no-gutters">

    <div class="col-12 col-md-7">
        <div class="about-us-thumbnail mb-50 position-relative" style="height:700px">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:50%; left:41%;color:black;">
                <p style="color:#121F6A; font-weight:bold;font-size:25px; margin-bottom:30px">How can we help you?</p>
                <form class="needs-validation" method="post" style="width:300px">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" style="font-weight:600;">FIRST NAME&nbsp;<span
                                    style="color:red">*</span></label>
                            <input name="firstname" type="text" class="form-control" id="firstName" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname" style="font-weight:600;">LAST NAME&nbsp;<span
                                    style="color:red">*</span></label>
                            <input name="lastname" type="text" class="form-control" id="lastname" required="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" style="font-weight:600;">EMAIL&nbsp;<span style="color:red">*</span></label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="email" style="font-weight:600;">PHONE NUMBER&nbsp;<span
                                style="color:red">*</span></label>
                        <input name="phone_number" type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" style="font-weight:600;">HOW CAN WE HELP YOU?&nbsp; <span
                                style="color:red">*</span></label>
                        <input required name="subject" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group mb-3" style="width:500px">
                        <label for="exampleInputPassword1" style="font-weight:600;">YOUR COMMENT OR QUESTION</label>
                        <textarea name="note" class="form-control" id="" cols="50" rows="3"></textarea>
                    </div>

                    <hr class="mb-4">
                    <button class="" name="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-5 ">
        <div class="about-us-thumbnail mb-50 position-relative" style="height:700px; background-color: #F0F0F0;">
            <div class="position-absolute" style="transform:translate(-50%,-50%);top:45%; left:40%;color:#737373;">
                <p style="color:#121F6A; font-weight:bold;font-size:25px; margin-bottom:30px">Other Ways to Contact Us
                </p>
                <p style="color:#121F6A; font-weight:bold; margin-bottom:30px">Call Us</p>
                <p style="font-weight:bold; margin-bottom:30px">General Information</p>
                <p style=" margin-bottom:30px">(84) 93515-3639</p>
                <p style="color:#121F6A; font-weight:bold; margin-bottom:30px">Press Inquiries</p>
                <p style=" margin-bottom:30px">Visit our <span style="color:#2A8CE8">Press Center</span> to learn more.
                </p>
                <p style="color:#121F6A; font-weight:bold; margin-bottom:30px">Volunteer Opportunities</p>
                <p style=" margin-bottom:30px">For more information about volunteering, please contact the <span
                        style="color:#2A8CE8">Volunteer Office</span> or visit our Volunteer page.</p>


                <hr style="background-color: white;">
            </div>
        </div>
    </div>
</div>

<?php
require_once ('footer.php')
?>