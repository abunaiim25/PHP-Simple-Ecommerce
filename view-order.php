<?php
include('functions/userfunctions.php');
include 'includes/header.php';
include 'authenticate.php'; //if not login, user can not go cart section



if (isset($_GET['t'])) {
    $trackingNo_slug = $_GET['t'];
    $order_data = checkingTrackingNoValid($trackingNo_slug);

    if (mysqli_num_rows($order_data) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something went wrong</h4>
<?php
    die();
}

$data = mysqli_fetch_array($order_data);
?>




<div class="py-1 bg-primary">
    <div class="container">
        <a href="my-orders.php" class="text-white">My Orders /</a>
        <a href="#" class="text-white">View Order</a>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            View Order
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name'] ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email'] ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone'] ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Tracking No.</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no'] ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address'] ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Pin Code</label>
                                            <div class="border p-1">
                                                <?= $data['pincode'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $userId =  $_SESSION['auth_user']['user_id'];
                                            $order_query = "SELECT o.id as o_id, o.tracking_no, o.user_id, oi.*, oi.qty as oi_orderQty, p.* 
                                            FROM orders o, order_items oi, products p
                                            WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=prod_id AND o.tracking_no='$trackingNo_slug' ";
                                            $order_query_run = mysqli_query($conn, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                                    ?>
                                                    <tr>
                                                        <td class="align-middle"><img src="uploads/product/<?=$item['image']; ?>" alt="<?=$item['name']; ?> Image" height="100"></td>
                                                        <td class="align-middle"><?=$item['price']; ?></td>
                                                        <td class="align-middle"><?=$item['oi_orderQty']; ?></td>
                                                    </tr>
                                                   <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                   
                                   <h4>Total Price: <span class="float-end fw-bold"><?=$data['total_price']; ?></span></h4>
                                   <hr>

                                   <label class="fw-bold">Payment Mode:</label>
                                   <div class="border p-1 mb-3">
                                    <?=$data['payment_mode']; ?>
                                   </div>

                                   <label class="fw-bold">Status:</label>
                                   <div class="border p-1 mb-3">
                                    <?php
                                    if($data['status']==0)
                                    {
                                        echo "Under Process";
                                    }if($data['status']==1)
                                    {
                                        echo "Completed";
                                    }
                                    if($data['status']==2)
                                    {
                                        echo "Cancled";
                                    }?>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'includes/footer.php' ?>