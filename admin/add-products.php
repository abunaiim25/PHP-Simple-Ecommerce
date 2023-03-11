<?php
include 'includes/header.php';
?>


<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-6 mt-2">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter category name" class="form-control">
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
                                            <option value="<?= $item['id'] ?>">
                                             <?= $item['name'] ?> </option>
                                    <?php  }
                                    } else {
                                        echo "No Category Available";
                                    } ?>
                                </select>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Slug</label>
                                <input type="text" name="slug" placeholder="Enter category slug" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <div class="row ">
                                    <div class="col-md-6 col-6  mt-2">
                                        <label>Status</label><br>
                                        <input type="checkbox" name="status">
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 mt-2">
                                        <label>Trending</label><br>
                                        <input type="checkbox" name="trending">
                                    </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label>Small Description</label>
                                <textarea name="small_description" placeholder="Enter small description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label> Description</label>
                                <textarea name="description" placeholder="Enter description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Orginal Price</label>
                                <input type="text" name="orginal_price" placeholder="Enter orginal price" class="form-control">
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Selling Price</label>
                                <input type="text" name="selling_price" placeholder="Enter selling  price" class="form-control">
                            </div>

                            <div class="col-md-12 mt-2">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Quantity</label>
                                <input type="number" name="qty" placeholder="Enter quantity" class="form-control">
                            </div>


                            <div class="col-md-6 mt-2">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter mete title" class="form-control">
                            </div>

                            <div class="col-md-12 mt-2">
                                <label>Meta Description</label>
                                <textarea name="meta_description" placeholder="Enter mete description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label>Meta Keywords</label>
                                <textarea name="meta_keywords" placeholder="Enter mete keywords" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-12 mt-2">
                                <button type="submit" name="add_product_btn" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>