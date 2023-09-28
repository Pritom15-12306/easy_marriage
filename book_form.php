<div class="container-fluid">
    <form action="" id="book-form">
        <div class="form-group">
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>">
            <input type="date" class='form form-control' name='schedule' required>
            <input inputmode=”numeric” class='form form-control mt-4' name='mobile_number' placeholder="Enter Mobile Number" required>
            <div class="d-flex flex-row-reverse ">
                <button type="button" class="btn btn-secondary mt-4 ml-2" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn save_btn mt-4 ">Save</button>

            </div>
        </div>
    </form>
</div>
<script>
    $(function() {
        $('#book-form').submit(function(e) {
            e.preventDefault();
            start_loader()
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=book_tour",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: err => {
                    console.log(err)
                    alert_toast("an error occured", 'error')
                    end_loader()
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        alert_toast("Book Request Successfully sent.")
                        $('.modal').modal('hide')
                    } else {
                        console.log(resp)
                        alert_toast("an error occured", 'error')
                    }
                    end_loader()
                }
            })
        })
    })
</script>

<style>
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