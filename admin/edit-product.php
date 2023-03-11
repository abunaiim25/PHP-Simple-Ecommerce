<?php
include 'includes/header.php';
?>


<div class="container py-4">
    <div class="row">
        <div class="col-md-12">

            <?php if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $products = getById("products", $id);

                if (mysqli_num_rows($products) > 0) {
                    $data = mysqli_fetch_array($products);
            ?>

                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Edit Product
                                <a href="products.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="product_id" value="<?= $data['id'] ?>">

                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?= $data['name']?>" placeholder="Enter category name" class="form-control">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Select Category</label>
                                        <select name="category_id" class="form-select" aria-label="Default select example">
                                            <option selected>Select Category</option>
                                            <?php
                                            $category = getAll("categories");

                                            if (mysqli_num_rows($category) > 0) {
                                                foreach ($category as $item) {
                                            ?>
                                                    <option value="<?= $item['id'] ?>" 
                                                    <?= $data['category_id'] == $item['id']?'selected':''?> > 
                                                    <?= $item['name'] ?> </option>
                                            <?php }
                                            } else {
                                                echo "No Category Available";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug']?>" placeholder="Enter category slug" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="col-md-6 col-6  mt-2">
                                                <label>Status</label><br>
                                                <input type="checkbox"  <?= $data['status'] ? "checked":"" ?> name="status">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-2">
                                            <label>Trending</label><br>
                                            <input type="checkbox"  <?= $data['trending'] ? "checked":"" ?> name="trending">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Small Description</label>
                                        <textarea name="small_description" placeholder="Enter small description" class="form-control" rows="3"><?= $data['small_description']?></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label> Description</label>
                                        <textarea name="description" placeholder="Enter description" class="form-control" rows="3"><?= $data['description']?></textarea>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Orginal Price</label>
                                        <input type="text" name="orginal_price" value="<?= $data['orginal_price']?>" placeholder="Enter orginal price" class="form-control">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" value="<?= $data['selling_price']?>" placeholder="Enter selling  price" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Current Image</label>
                                        <img class="" src="../uploads/product/<?= $data['image'] ?>" height="50px" alt="">
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <br>

                                        <label>Upload Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Quantity</label>
                                        <input type="number" name="qty" value="<?= $data['qty']?>" placeholder="Enter quantity" class="form-control">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title']?>" placeholder="Enter mete title" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" placeholder="Enter mete description" class="form-control" rows="3"><?= $data['meta_description']?></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Meta Keywords</label>
                                        <textarea name="meta_keywords" placeholder="Enter mete keywords" class="form-control" rows="3"><?= $data['meta_keywords']?></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" name="update_product_btn" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php } else {
                    echo "Product not found";
                }
            } else {
                echo "Id missing from url";
            } ?>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>