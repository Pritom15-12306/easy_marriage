<section class="page-section bg-dark" id="home">
    <div class="container">
        <h2 class="text-center">Your Opinion</h2>
        <div class="d-flex w-100 justify-content-center">
            <hr class="border-color" style="border:3px solid" width="15%">
        </div>
        <div class="card-body">
            <form action="" id="feedback-form">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="d-flex w-100 ">
                    <div class="form-group w-50 mr-5 ">
                        <label for="husband_name" class="control-label">Husband Name</label>
                        <textarea name="husband_name" id="" cols="30" rows="2" class="form-control form no-resize" required placeholder="Naimul"><?php echo isset($husband_name) ? $husband_name : ''; ?></textarea>
                    </div>
                    <div class="form-group w-50 ml-5">
                        <label for="wife_name" class="control-label">Wife Name</label>
                        <textarea name="wife_name" id="" cols="30" rows="2" class="form-control form no-resize" required placeholder="Jhumu"><?php echo isset($wife_name) ? $wife_name : ''; ?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label for="feedback" class="control-label">Feedback</label>
                    <textarea name="feedback" id="" cols="30" rows="10" class="form-control form no-resize " required placeholder="Your Opinion..."><?php echo isset($feedback) ? $feedback : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="" class="control-label">Images</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img[]" multiple accept="image/*" onchange="displayImg(this,$(this))" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <?php if (isset($upload_path) && is_dir(base_app . $upload_path)) : ?>
                    <?php

                    $file = scandir(base_app . $upload_path);
                    foreach ($file as $img) :
                        if (in_array($img, array('.', '..')))
                            continue;


                    ?>
                        <div class="d-flex w-100 align-items-center img-item">
                            <span><img src="<?php echo base_url . $upload_path . '/' . $img ?>" width="150px" height="100px" style="object-fit:cover;" class="img-thumbnail" alt=""></span>
                            <span class="ml-4"><button class="btn btn-sm btn-default text-danger rem_img" type="button" data-path="<?php echo base_app . $upload_path . '/' . $img ?>"><i class="fa fa-trash"></i></button></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </form>
        </div>
        <div class="card-footer">
            <button class="btn save_btn" form="feedback-form">Send Feedback</button>

        </div>

    </div>


    <script>
        function displayImg(input, _this) {
            console.log(input.files)
            var fnames = []
            Object.keys(input.files).map(k => {
                fnames.push(input.files[k].name)
            })
            _this.siblings('.custom-file-label').html(JSON.stringify(fnames))

        }

        function delete_img($path) {
            start_loader()

            $.ajax({
                url: _base_url_ + 'classes/Master.php?f=delete_p_img',
                data: {
                    path: $path
                },
                method: 'POST',
                dataType: "json",
                error: err => {
                    console.log(err)
                    alert_toast("An error occured while deleting an Image", "error");
                    end_loader()
                },
                success: function(resp) {
                    $('.modal').modal('hide')
                    if (typeof resp == 'object' && resp.status == 'success') {
                        $('[data-path="' + $path + '"]').closest('.img-item').hide('slow', function() {
                            $('[data-path="' + $path + '"]').closest('.img-item').remove()
                        })
                        alert_toast("Image Successfully Deleted", "success");
                    } else {
                        console.log(resp)
                        alert_toast("An error occured while deleting an Image", "error");
                    }
                    end_loader()
                }
            })
        }
        $(document).ready(function() {
            $('.rem_img').click(function() {
                _conf("Are sure to delete this image permanently?", 'delete_img', ["'" + $(this).attr('data-path') + "'"])
            })
            $('#feedback-form').submit(function(e) {
                e.preventDefault();
                $('.err-msg').remove();
                start_loader();
                $.ajax({
                    url: _base_url_ + "classes/Master.php?f=save_feedback",
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    dataType: 'json',
                    error: err => {
                        console.log(err)
                        alert_toast("An error occured", 'error');
                        end_loader();
                    },
                    success: function(resp) {
                        if (typeof resp == 'object' && resp.status == 'success') {

                            alert_toast("feedback sent", 'success')
                            $('#feedback-form').get(0).reset()
                            location.href = "./?page=feedback";
                        } else {

                            alert_toast("An error occured", 'error');
                            end_loader();
                            console.log(resp)
                        }
                    }
                })
            })


        })
    </script>

</section>


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

    .border-color {
        color: #44e6fd;
    }
</style>