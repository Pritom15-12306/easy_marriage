<?php
session_start();
?>
<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">MY CART</h2>
		<div class="d-flex w-100 justify-content-center">
			<hr class="border-color" style="border:3px solid" width="15%">
		</div>
		<div class="d-flex w-100">
			<div class="container">
				<div class="col-md-12">
					<table class="table table-bordered my-5">
						<tr>
							<th>ITEM ID</th>
							<th>ITEM NAME</th>
							<th>ITEM PRICE</th>
							<th>ITEM QUANTITY</th>
							<th>ACTION</th>
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
									<td>
										<button class="btn btn-danger remove" id="<?php echo $value['id']; ?>">Remove</button>
									</td>
								</tr>

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
							<td>
								<button class="btn btn-warning clearall">Clear All</button>
							</td>
						</tr>
					</table>
					<div class="text-right">
						<button id="btnStart" type="button" class="btn save_btn " onclick="location='./?page=checkout'">CHECKOUT</button>
					</div>
				</div>
			</div>



			<!-----Checkout------>





			<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



			<script type="text/javascript">
				$(document).ready(function() {


					$(".remove").click(function() {
						var id = $(this).attr("id");

						var action = "remove";

						$.ajax({
							method: "POST",
							url: "action.php",
							data: {
								action: action,
								id: id
							},
							success: function(data) {
								alert("you have Remove item with ID " + id + "");
							}
						});
					});


					$(".clearall").click(function() {

						var action = "clear";

						$.ajax({
							method: "POST",
							url: "action.php",
							data: {
								action: action
							},
							success: function(data) {
								alert("you have cleared all item");
							}
						});
					});
				});
			</script>

			<style>
				.btn-success {
					font-size: 17px;
					background-color: orange;
					color: #000;
					padding: 6px 0px;
					width: 100%;
					max-width: 157px;
					text-align: center;
					display: inline-block;
					transition: ease-in all 0.5s;
					font-weight: 500;
					border-radius: 5px;
					height: 43px;

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
</section>