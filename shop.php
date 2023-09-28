<section class="page-section bg-dark" id="home">
    <div class="container">
        <h2 class="text-center">BUY OUR POPULAR PRODUCTS</h2>
        <div class="d-flex w-100 justify-content-center">
            <hr class="border-color" style="border:3px solid" width="15%">
        </div>
        <div class="d-flex w-100">
            <div class="container">
                <div class="col-md-12 shop_page">
                    <div class="row show_cart my-5">

                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(document).ready(function() {

                    show_cart();

                    function show_cart() {
                        $.ajax({
                            method: "POST",
                            url: "show_cart.php",
                            success: function(data) {
                                $(".show_cart").html(data);
                            }
                        });
                    }


                    $(document).on("click", ".add", function() {
                        var id = $(this).attr("id");
                        var name = $("#name" + id + "").val();
                        var price = $("#price" + id + "").val();
                        var quantity = $("#quantity" + id + "").val();

                        $.ajax({
                            method: "POST",
                            url: "add_to_cart.php",
                            data: {
                                id: id,
                                name: name,
                                price: price,
                                quantity: quantity
                            },
                            success: function(data) {
                                alert("you have add new item");
                            }
                        });
                    });

                });
            </script>

            <style>
                .shop_page {
                    position: relative;
                    top: 100px;
                }
            </style>
        </div>
</section>

<style>
    .border-color {
        color: #c778ba;
    }
</style>