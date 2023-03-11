<?php
include('functions/userfunctions.php');
include 'includes/header.php';
include 'authenticate.php'; //if not login, user can not go this page
?>


<div class="py-1 bg-primary">
    <div class="container">
        <div class="text-white">Checkout</div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">

            <form action="functions/placeorder.php" method="POST">
                <div class="row">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name"  placeholder="Enter your full name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" name="email"  placeholder="Enter your email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="number" name="phone"  placeholder="Enter your phone" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode"  placeholder="Enter your pin code" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address</label>
                                <textarea name="address"  class="form-control"  id="" rows="5"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-5">
                        <h5>Order Details</h5>
                        <hr>

                        <?php
                        $cartitems = getCartItems();
                        $totalPrice = 0;

                        foreach ($cartitems as $item) {
                        ?>
                            <div class="mb-1 border">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/product/<?= $item['image'] ?>" alt="<?= $item['name'] ?> Image" height="50px">
                                    </div>
                                    <div class="col-md-5">
                                        <h5><?= $item['name'] ?></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5><?= $item['selling_price'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5><?= $item['prod_qty'] ?></h5>
                                    </div>

                                </div>
                            </div>
                        <?php
                            $totalPrice += $item['selling_price'] *  $item['prod_qty'] ;
                        }
                        ?>
                        <hr>
                        <h5 class="mt-2">Total Price: <span class="float-end fw-bold">  <?=$totalPrice?>  </span></h5>
                        <div>
                            <input type="hidden" name="payment_mode" value="COD">
                            <input type="hidden" name="payment_id" value="10">
                            <button type="submit" name="placeOrder-btn" class="btn btn-primary w-100">Confirm and place order | COD</button>
                        </div>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>