<?php
include('functions/userfunctions.php');
include 'includes/header.php';
include 'authenticate.php'; //if not login, user can not go cart section
?>


<div class="py-1 bg-primary">
    <div class="container">
        <div class="text-white">Cart</div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id='myCart_autoReload'>

                        <?php
                        $cartitems = getCartItems();

                        if (mysqli_num_rows($cartitems) > 0) {
                        ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Remove</h6>
                                </div>
                            </div>

                            <?php
                            foreach ($cartitems as $item) {
                            ?>
                                <div class="card shadow-sm mb-3 p-2" id="product_data">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/product/<?= $item['image'] ?>" alt="<?= $item['name'] ?> Image" height="50px">
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $item['name'] ?></h5>
                                        </div>
                                        <div class="col-md-2">
                                            <h5><?= $item['selling_price'] ?> TK</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="hidden" name="" id="pordId" value="<?= $item['prod_id'] ?>">
                                            <div class="input-group mb-3" style="width: 130px;">
                                                <button class="input-group-text updateQty" id="decrement-btn">-</button>
                                                <input type="text" disabled value="<?= $item['prod_qty'] ?>" class="form-control bg-white text-center" id="input-qty">
                                                <button class="input-group-text updateQty" id="increment-btn">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-sm" id="deleteCart-btn" value="<?= $item['cartId'] ?>"><i class="fa fa-trash me-2"></i> Remove</button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="card card-body shadow">
                                <h4 class="py-3 text-center">Your cart is empty</h4>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>