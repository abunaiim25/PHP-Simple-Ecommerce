<?php
include('functions/userfunctions.php');
include 'includes/header.php';


if (isset($_GET['category'])) {
    $category_slug = $_GET['category']; //get from categories page (<a href="products.php?category=<?=$item['slug'];)
    $category_data = getBySlugActive('categories', $category_slug);
    $category = mysqli_fetch_array($category_data);
 
    if ($category) {
        $cate_id = $category['id'];
?>

        <div class="py-1 bg-primary">
            <div class="container">
                <div class="text-white">
                    <a href="categories.php" class="text-white">
                        Collections
                    </a>/
                    <?= $category['name']; ?>
                </div>
            </div>
        </div>


        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2> <?= $category['name']; ?></h2>
                        <hr width="300px" style="color:brown">

                        <div class="row">
                            <?php
                            $products = getProductByCategory($cate_id);

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="product-view.php?product=<?=$item['slug'];?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/product/<?= $item['image']; ?>" alt=" <?= $item['name']; ?> Image" height="200px" class="w-100">
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

<?php
    }else{
        echo "Product Not Found";
    }
}else{
    echo "Something Went Wrong";
}


include 'includes/footer.php'
?>