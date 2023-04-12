<!-- Footer start -->
<footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center p-4 " style="background-color: #040D25">
        <!-- Left -->
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="text-white me-4">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold">ECOLOGY CENTER</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #121F6A; height: 2px" />
                    <p>
                        Ecology Center play an important role in preserving and displaying fossils, as they provide a
                        means for the public to learn about prehistoric life and the evolution of the planet.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Products</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #121F6A; height: 2px" />
                    <p>
                        <a href="#!" class="text-white">About Us</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Our Services</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Privacy Policy</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Payment Options</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Useful links</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #121F6A; height: 2px" />
                    <p>
                        <a href="#!" class="text-white">Your Account</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #121F6A; height: 2px" />
                    <p><i class="fas fa-home mr-3"></i> Sai Gon, SG 2023, VN</p>
                    <p><i class="fas fa-envelope mr-3"></i> ecocenter@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 84 935 15 3639</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->
</footer>
<!-- Footer -->
</div>
</body>

</html>
<?php
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']= [];
}
$count =0 ;
foreach($_SESSION['cart'] as $item){
    $count += $item['num'];
}
?>
<script type="text/javascript">
function addCart(productId, num) {
    $.post('api/ajax_request.php', {
        'action': 'cart',
        'id': productId,
        'num': num
    }, function(data) {
        location.reload()
    })
}
</script>
<!-- <a href="cart.php">
    <span class="cart_icon">
        <img src="asset/photo/cart_icon2_rm.png" alt="">
        <span class="cart_count"><?=$count?></span>
    </span>
</a> -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</main>
</div>
</div>
</body>

</html>