<?php
//session_start();
include '../config/dbcon.php';
include '../functions/myfunctions.php';

//-------------------------------------STORE CATEGORY--------------------------------------
if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $mete_title = $_POST['mete_title'];
    $mete_description = $_POST['mete_description'];
    $mete_keywords = $_POST['mete_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    //image
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename_image = time() . '.' . $image_ext;

    //insert data
    $insert_query = "INSERT INTO categories
    (name, slug, description, mete_title, mete_description, mete_keywords, status, popular, image)
    VALUES('$name', '$slug', '$description', '$mete_title', '$mete_description', '$mete_keywords', '$status', '$popular', '$filename_image')";

    $insert_query_run = mysqli_query($conn, $insert_query);

    if ($insert_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename_image);
        redirect("add-category.php", "Category Added Successfully");
    } else {
        redirect("add-category.php", "Something Went Wrong");
    }
}
//-------------------------------------UPDATE CATEGORY--------------------------------------
else if (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $mete_title = $_POST['mete_title'];
    $mete_description = $_POST['mete_description'];
    $mete_keywords = $_POST['mete_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    //image
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        //$update_filename_image = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename_image = time() . '.' . $image_ext;
    } else {
        $update_filename_image = $old_image;
    }
    $path = "../uploads";

    //update data
    $update_query = "UPDATE categories SET
    name='$name', slug='$slug', description='$description', mete_title='$mete_title', mete_description='$mete_description', 
    mete_keywords='$mete_keywords', status='$status', popular='$popular', image='$update_filename_image'
    WHERE id='$category_id' ";

    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename_image);
            if (file_exists("../uploads/" . $old_image)) //old image delete
            {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit-category.php?id=$category_id", "Something Went Wrong");
    }
}
//-------------------------------------DELETE CATEGORY--------------------------------------
else if (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    //this code for image
    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    //delete
    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../uploads/" . $image)) //old image delete
        {
            unlink("../uploads/" . $image);
        }
        redirect("category.php", "Category Deleted Successfully");
    } else {
        redirect("category.php", "Something went wrong");
    }
}


//-------------------------------------STORE PRODUCT--------------------------------------
else if (isset($_POST['add_product_btn'])) {

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $orginal_price = $_POST['orginal_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    //image
    $image = $_FILES['image']['name'];
    $path = "../uploads/product";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename_image = time() . '.' . $image_ext;


    if ($name != "" && $slug != "" && $description != "") {
        //insert data
        $insert_query = "INSERT INTO products
        (name, category_id, slug, small_description, description, orginal_price, selling_price, qty, meta_title, meta_description, meta_keywords,  status, trending,image)
        VALUES('$name', '$category_id', '$slug', '$small_description', '$description', '$orginal_price', '$selling_price', '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$filename_image') ";

        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename_image);
            redirect("add-products.php", "Product Added Successfully");
        } else {
            redirect("add-products.php", "Something Went Wrong");
        }
    } else {
        redirect("add-products.php", "All fields are mandatory");
    }
}
//-------------------------------------UPDATE PRODUCT--------------------------------------
else if (isset($_POST['update_product_btn'])) {

    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $orginal_price = $_POST['orginal_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

     //image
     $new_image = $_FILES['image']['name'];
     $old_image = $_POST['old_image'];
     if ($new_image != "") {
         $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
         $update_filename_image = time() . '.' . $image_ext;
     } else {
         $update_filename_image = $old_image;
     }
     $path = "../uploads/product/";


    if ($name != "" && $slug != "" && $description != "") {
        //insert data
        $update_query = "UPDATE products SET
        name='$name', category_id='$category_id', slug='$slug', small_description='$small_description', description='$description', orginal_price='$orginal_price', selling_price='$selling_price', 
        qty='$qty', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', status='$status', trending='$trending', image='$update_filename_image'
        WHERE id='$product_id' ";
        
        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run) {
            if ($_FILES['image']['name'] != "") {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename_image);
                if (file_exists("../uploads/product/" . $old_image)) //old image delete
                {
                    unlink("../uploads/product/" . $old_image);
                }
            }
            redirect("edit-product.php?id=$product_id", "Product Updated Successfully");
        } else {
            redirect("edit-product.php?id=$product_id", "Something Went Wrong");
        }

    } else {
        redirect("add-products.php", "All fields are mandatory");
    }
}
//-------------------------------------DELETE PRODUCT (SWAL)--------------------------------------
else if (isset($_POST['delete_product_btn'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    //this code for image
    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    //delete
    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../uploads/product/" . $image)) //old image delete
        {
            unlink("../uploads/product/" . $image);
        }
       // redirect("products.php", "Product Deleted Successfully");
       echo 200;
    } else {
        //redirect("products.php", "Something went wrong");
        echo 500;
    }
}

//-------------------------------------ELSE--------------------------------------
else{
    header('Location: ../index.php');
}
