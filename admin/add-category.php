<?php
include 'includes/header.php';
?>


<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">

                   <form action="code.php" method="POST" enctype="multipart/form-data">
                   <div class="row">
                        <div class="col-md-6 mt-2">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter category name" class="form-control">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Slug</label>
                            <input type="text" name="slug" placeholder="Enter category slug" class="form-control">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Description</label>
                            <textarea name="description" placeholder="Enter category description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Upload Image</label>
                           <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Meta Title</label>
                            <input type="text" name="mete_title" placeholder="Enter mete title" class="form-control">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Meta Description</label>
                            <textarea name="mete_description" placeholder="Enter mete description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Meta Keywords</label>
                            <textarea name="mete_keywords" placeholder="Enter mete keywords" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Status</label>
                            <input type="checkbox" name="status">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Populer</label>
                            <input type="checkbox" name="popular">
                        </div>

                        <div class="col-md-12 mt-2">
                            <button type="submit" name="add_category_btn" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php' ?>