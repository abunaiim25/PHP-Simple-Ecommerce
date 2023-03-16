<?php
include('functions/userfunctions.php');
include 'includes/header.php';
include 'authenticate.php'; //if not login, user can not go cart section
?>


<div class="py-1 bg-primary">
    <div class="container">
        <div class="text-white">My Orders</div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No.</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $orders = getOrders();

                            if (mysqli_num_rows($orders) > 0) 
                            {
                                foreach ($orders as $item) 
                                {
                                    ?>
                                    <tr>
                                        <td> <?=$item['id'] ?></td>
                                        <td> <?=$item['tracking_no'] ?></td>
                                        <td> <?=$item['total_price'] ?></td>
                                        <td> <?=$item['created_at'] ?></td>
                                        <td><a href="view-order.php?t=<?=$item['tracking_no'] ?>" class="btn btn-success btn-sm">View Details</a></td>
                                    </tr>
                                    <?php
                                }
                            } 
                            else 
                            {
                                ?>
                                <tr>
                                    <td colspan="5"> No orders yet.</td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>