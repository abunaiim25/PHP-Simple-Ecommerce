<?php
session_start();
include '../config/dbcon.php';
//require('userfunctions.php');

if (isset($_SESSION['auth']))
{
    if (isset($_POST['placeOrder-btn'])) 
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

        if ($name == "" || $email == "" || $phone == "" || $pincode = "" || $address == "") 
        {
            $_SESSION['message'] = "All fields are mandatory";
            header('Location: ../checkout.php');
            exit(0);
        } else 
        {
            $tracking_no = "Naiim".rand(1111, 9999).substr($phone,2);
            $user_id = $_SESSION['auth_user']['user_id'];

            //for carts total price AND orders items
            $cartitems = "SELECT c.id as cartId, c.prod_id, c.user_id, c.prod_qty, p.id as productId, p.name, p.image, p.selling_price
            FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$user_id'
            ORDER BY c.id DESC";
            $cartitems_run = mysqli_query($conn, $cartitems);

            $totalPrice = 0;
            foreach ($cartitems_run as $item) 
            {
                $totalPrice += $item['selling_price'] * $item['prod_qty'];
            } 
          
            $insert_query = "INSERT INTO orders
            (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode,	payment_id)
            VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', '$payment_mode', '$payment_id')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) 
            {
                $order_id = mysqli_insert_id($conn); //last id get, order id get here

                foreach ($cartitems_run as $item) 
                {
                $prod_id = $item['prod_id'];
                $prod_qty = $item['prod_qty'];
                $selling_price = $item['selling_price'];

                $insert_items_query = "INSERT INTO order_items
                (order_id, prod_id, qty, price)
                VALUES ('$order_id', '$prod_id', '$prod_qty', '$selling_price')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);

                //delete product qty for (stock, out of stock)
                $product_query = "SELECT * FROM products WHERE id = '$prod_id' LIMIT 1";
                $product_query_run = mysqli_query($conn, $product_query);
                $productData = mysqli_fetch_array($product_query_run);
                $currentQty = $productData['qty'];
                $newQty = $currentQty - $prod_qty;
                $update_productQtyQuery = "UPDATE products SET qty='$newQty' WHERE id='$prod_id' ";
                $update_productQtyQuery_run = mysqli_query($conn, $update_productQtyQuery);
                }
                  //delete cart Items
                  $delete_CartQuery = "DELETE FROM carts WHERE user_id='$user_id'";
                  $delete_CartQuery_run = mysqli_query($conn, $delete_CartQuery);
  
                  $_SESSION['message'] = "Order Placed Successfully";
                  header('Location: ../my-orders.php');
                  die();
            }
        }
    }
} 
else 
{
    header('Location: ../index.php');
}
