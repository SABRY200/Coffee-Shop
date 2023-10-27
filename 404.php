<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">404 Page Not Found</h1>
                    <br />
                    <a href="<?php echo APPURL; ?>" class="btn btn-primary py-3 px-4">Home</a>
                    <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>404 Page Not Found</span></p> -->
                </div>
            </div>
    </div>
    </div>
</section>
<?php require "includes/footer.php"; ?>