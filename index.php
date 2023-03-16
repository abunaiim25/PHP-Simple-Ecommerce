<?php
//open xampp server, http://localhost/PHP_Raw/php_ecom/
//session_start();
include 'functions/userfunctions.php';
include 'includes/header.php';
include 'includes/slider.php';
?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <!--Message-->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['message']);
            } ?>


            <h4>Trending</h4>
            <hr>
            <div class="owl-carousel">
                <?php
                $trendingProducts = getAllTrending();
                if (mysqli_num_rows($trendingProducts) > 0) {
                    foreach ($trendingProducts as $item) {
                ?>
                        <div class=" item">
                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img src="uploads/product/<?= $item['image']; ?>" alt=" <?= $item['name']; ?> Image" height="200px" class="w-100">
                                        <h6 class="text-center"> <?= $item['name']; ?> </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ullam amet ipsum blanditiis magnam perspiciatis eligendi placeat ab accusamus dignissimos eius dolorem aliquam necessitatibus sed, aut rerum eum! Dolore consectetur, eveniet error recusandae delectus velit sit ipsum atque voluptas nam accusantium porro facere totam blanditiis eligendi et aspernatur expedita iusto dignissimos culpa voluptates! Ducimus praesentium necessitatibus dignissimos ab dicta earum ullam, facilis ratione aliquam fugit consectetur vero, beatae commodi. Aspernatur, ratione, earum facere minima nemo laboriosam atque fuga dolores hic qui cum sapiente. Molestiae magnam sapiente ullam maxime, ea eveniet quos ipsam adipisci provident, cumque porro voluptatem inventore nam enim.    
                </p>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58455.9260407803!2d90.3725695!3d23.69399755221983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755becbb4c48bd5%3A0xd9dfc3c5a175640c!2sKeraniganj!5e0!3m2!1sen!2sbd!4v1678961012235!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>

<script>
    //jqDocReady
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    });
</script>