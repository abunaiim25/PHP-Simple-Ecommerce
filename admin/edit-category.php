<?php
include 'includes/header.php';
?>


<div class="container py-4">
    <div class="row">
        <div class="col-md-12">

            <?php if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $category = getById("categories", $id);

                if(mysqli_num_rows($category) > 0) {  
                    $data = mysqli_fetch_array($category);
             ?>
           
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Edit Categories
                                <a href="category.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="category_id" value="<?= $data['id'] ?>">

                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter category name" class="form-control">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter category slug" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Description</label>
                                        <textarea name="description"  placeholder="Enter category description" class="form-control" rows="3"><?= $data['description'] ?></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Current Image</label>
                                        <img class="" src="../uploads/<?= $data['image'] ?>" height="50px" alt="">
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <br>

                                        <label>Upload Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Meta Title</label>
                                        <input type="text" name="mete_title" value="<?= $data['mete_title'] ?>" placeholder="Enter mete title" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Meta Description</label>
                                        <textarea name="mete_description" placeholder="Enter mete description" class="form-control" rows="3"><?= $data['mete_description'] ?></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Meta Keywords</label>
                                        <textarea name="mete_keywords" placeholder="Enter mete keywords" class="form-control" rows="3"><?= $data['mete_keywords'] ?></textarea>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Status</label>
                                        <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Populer</label>
                                        <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular" >
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" name="update_category_btn" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php } else {
                    echo "Category not found";
                }
            } else {
                echo "Id missing from url";
            } ?>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>