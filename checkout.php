<?php
if (isset($_POST['order_btn'])) {

    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $item_id = $_POST['item_id'];
    $total_price = $_POST['total_price'];
    $payment_mode = $_POST['payment_mode'];
    $cart_query = mysqli_query($conn, "SELECT * FROM `items`");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['price'] . ') ';
        };
    };

    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `orders`(customer_name, email, phone, address, item_id, total_price, payment_mode) VALUES('$customer_name','$email','$phone','$address', '$item_id', '$total_price', '$payment_mode')") or die('query failed');

    if ($detail_query) {
        echo "Done";
    }
}

?>



?>

<section class="page-section bg-dark" id="home">
    <div class="container">
        <h2 class="text-center">Checkout Form</h2>
        <div class="d-flex w-100 justify-content-center">
            <hr class="border-color" style="border:3px solid" width="15%">
        </div>
        <div class="w-0">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-7 mx-auto">
                        <div class="card mt-2 mx-auto p-4 bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <form action="" method="post" id="checkout_form">
                                        <table class="table table-bordered my-5">
                                            <tr>
                                                <th>ITEM ID</th>
                                                <th>ITEM NAME</th>
                                                <th>ITEM PRICE</th>
                                                <th>ITEM QUANTITY</th>
                                            </tr>

                                            <?php

                                            $total_price = 0;

                                            if (!empty($_SESSION['cart'])) {

                                                foreach ($_SESSION['cart'] as $key => $value) { ?>
                                                    <tr>
                                                        <td><?php echo $value['id']; ?></td>
                                                        <td><?php echo $value['name']; ?></td>
                                                        <td><?php echo $value['price']; ?></td>
                                                        <td><?php echo $value['quantity']; ?></td>

                                                        <?php $total_price = $total_price + $value['quantity'] * $value['price']; ?>



                                                    <?php }
                                            } else { ?>
                                                    <tr>
                                                        <td class="text-center" colspan="5">Your cart is now empty</td>
                                                    </tr>
                                                <?php }




                                                ?>

                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td>Total Price</td>
                                                    <td><?php echo number_format($total_price, 2); ?></td>
                                                </tr>
                                        </table>
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name">Enter Your Name</label>
                                                        <input id="form_name" type="text" name="customer_name" id="name" class="form-control" placeholder="Ashvik Trehan" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_lastname">Enter Your Phone</label>
                                                        <input id="form_lastname" type="text" name="phone" id="phone" class="form-control" placeholder="017********" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_email">Enter Your Email</label>
                                                        <input id="form_email" type="email" name="email" id="subject" class="form-control" placeholder="trehan@gmail.com" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_need">Enter Your Address</label>
                                                        <input id="form_email" type="address" name="address" id="address" class="form-control" placeholder="Dhanmondi,Dhaka,Bangladesh" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_email">Enter Item ID</label>
                                                        <input id="form_email" type="text" name="item_id" id="item_id" class="form-control" placeholder="1, 2, 3, 4, 5, 6, 7, 8, 9, 10" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_need">Enter Total Price</label>
                                                        <input id="form_email" type="text" name="total_price" id="total_price" class="form-control" placeholder="10000" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <label for="form_message">Payment Method</label>
                                                        <select id="form_message" name="payment_mode" class="form-control">
                                                            <option value="CashOnDelivery">Cash On Delivery</option>

                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <input type="submit" class="btn save_btn" value="ORDER NOW" name="order_btn">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.8 -->
                    </div>
                    <!-- /.row-->
                </div>
            </div>
            <!-- Javascript files-->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/jquery-3.0.0.min.js"></script>
            <!-- sidebar -->
            <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="js/custom.js"></script>

            <script>

            </script>
            <style>
                body {
                    font-family: 'Lato', sans-serif;
                }

                h1 {
                    margin-bottom: 40px;
                }

                label {
                    color: #333;
                }

                .btn-send {
                    font-weight: 300;
                    text-transform: uppercase;
                    letter-spacing: 0.2em;
                    width: 80%;
                    margin-left: 3px;
                }

                .help-block.with-errors {
                    color: #ff5050;
                    margin-top: 5px;

                }

                .card {
                    margin-left: 10px;
                    margin-right: 10px;
                }

                .border-color {
                    color: #c778ba;
                }

                .save_btn {
                    background-color: #c778ba;
                    color: #fff;
                    padding: 10 18px;
                }

                .save_btn:hover {
                    background-color: #44e6fd;
                    color: #000;

                }
            </style>
        </div>
    </div>