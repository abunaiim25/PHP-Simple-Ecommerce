<?php
include('functions/userfunctions.php');
include 'includes/header.php';
?>

<div class="py-1 bg-primary">
    <div class="container">
        <div class="text-white">Collections</div>
    </div>
</div>


<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Our Collections</h2>
                <hr width="300px" style="color:brown">

                <div class="row">
                    <?php
                    $categories = getAllActive('categories');

                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-md-3 mv-2">
                                <a href="products.php?category=<?=$item['slug'];?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt=" <?= $item['name']; ?> Image" height="200px" class="w-100">
                                            <h4 class="text-center"> <?= $item['name']; ?> </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No Data Available";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>