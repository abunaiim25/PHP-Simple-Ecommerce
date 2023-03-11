<?php
include('functions/userfunctions.php');
include 'includes/header.php';


if (isset($_GET['product'])) {
    $product_slug = $_GET['product']; //get from categories page (href="product-view.php?product=<?=$item['slug'];)
    $product_data = getBySlugActive('products', $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
        $prod_id = $product['id'];
?>

        <div class="py-1 bg-primary">
            <div class="container">
                <div class="text-white">
                    <a href="categories.php" class="text-white">
                        Collections
                    </a>/
                    <?= $product['name']; ?>
                </div>
            </div>
        </div>

        <div class="py-3 bg-light shadow m-5 rounded">
            <div class="container" id="product_data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow ">
                            <img src="uploads/product/<?= $product['image']; ?>" alt=" <?= $item['name']; ?> Image" class="w-100 rounded">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>

                            <div class="float-end text-success">
                                <?php if ($product['trending']) {
                                    echo "Trending";
                                } ?>
                            </div>
                        </h4>
                        <hr>

                        <p><?= $product['small_description']; ?></p>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>TK <span class="text-success fw-bold"> <?= $product['selling_price']; ?></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>TK <s class="text-danger"><?= $product['orginal_price']; ?></s></h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3"  style="width: 130px;">
                                    <button class="input-group-text" id="decrement-btn">-</button>
                                    <input type="text" disabled value="1" class="form-control bg-white text-center" id="input-qty">
                                    <button class="input-group-text" id="increment-btn">+</button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span class="badge bg-success p-2"><?= $product['qty']; ?> Product in stock</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 col-6">
                                <button type="button" class="btn btn-primary" id="addToCart-btn"  value="<?= $product['id'] ?>"><i class="fa fa-shopping-cart me-2"></i> Add to Cart</button>
                            </div>
                            <div class="col-md-6 col-6">
                                <button class="btn btn-danger"><i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                            </div>
                        </div>
                        <hr>

                        <div>
                            <h5>Product Description</h5>
                            <p><?= $product['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "Something Went Wrong";
}


include 'includes/footer.php'
?>