<?php
if (isset($_GET['id'])) {
    $packages = $conn->query("SELECT * FROM `services` where md5(id) = '{$_GET['id']}'");
    if ($packages->num_rows > 0) {
        foreach ($packages->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
    $review = $conn->query("SELECT r.*,concat(firstname,' ',lastname) as name FROM `rate_review` r inner join users u on r.user_id = u.id where r.package_id='{$id}' order by unix_timestamp(r.date_created) desc ");
    $review_count = $review->num_rows;
    $rate = 0;
    $feed = array();
    while ($row = $review->fetch_assoc()) {
        $rate += $row['rate'];
        if (!empty($row['review'])) {
            $row['review'] = stripslashes(html_entity_decode($row['review']));
            $feed[] = $row;
        }
    }
    if ($rate > 0 && $review_count > 0)
        $rate = number_format($rate / $review_count, 0, "");
    $files = array();
    if (is_dir(base_app . 'uploads/services_' . $id)) {
        $ofile = scandir(base_app . 'uploads/services_' . $id);
        foreach ($ofile as $img) {
            if (in_array($img, array('.', '..')))
                continue;
            $files[] = validate_image('uploads/services_' . $id . '/' . $img);
        }
    }
}
?>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="tourCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner h-100">
                        <?php foreach ($files as $k => $img) : ?>
                            <div class="carousel-item  h-100 <?php echo $k == 0 ? 'active' : '' ?>">
                                <img class="d-block w-100  h-100" src="<?php echo $img ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="w-100">
                    <hr class="border-warning">
                    <h5>Ratings (<?php echo $review_count ?>)</h5>
                    <div>
                        <div class="stars">
                            <input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?> /> <label class="star star-5" for="star-5"></label>
                            <input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?> /> <label class="star star-4" for="star-4"></label>
                            <input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?> /> <label class="star star-3" for="star-3"></label>
                            <input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?> /> <label class="star star-2" for="star-2"></label>
                            <input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?> /> <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>
                    <hr>
                    <div class="w-100 d-flex justify-content-between">
                        <button class="btn read_more"><i class="fa fa-tag"></i> <span class="ml-1"><?php echo number_format($cost) ?></span></button>

                        <button class="btn read_more" type="button" id="book">Book Service</button>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h3><?php echo $title ?></h3>
                <hr class="border-warning">
                <small class='text-muted'><?php echo $tour_location ?></small>
                <h4>Details</h4>
                <div><?php echo stripslashes(html_entity_decode($description)) ?></div>
                <hr>
                <h5>Reviews (<?php echo count($feed) ?>)</h5>
                <hr class="border-primary">
                <?php foreach ($feed as $r) : ?>
                    <div class="w-100 d-flex justify-content-between  align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo validate_image('assets/img/user.jpg') ?>" class="border mr-3 review-user-avatar" alt="">
                            <span><?php echo $r['name'] ?></span>
                        </div>
                        <span class='text-muted'><?php echo date("Y-m-d H:i A", strtotime($r['date_created'])) ?></span>
                    </div>
                    <div class="w-100 review-feedback">
                        <?php echo $r['review'] ?>
                    </div>
                    <hr class='border-light'>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $('#book').click(function() {
            if ("<?php echo $_settings->userdata('id') ?>" > 0)
                uni_modal("Book Info", "sbook_form.php?package_id=<?php echo $id ?>");
            else
                uni_modal("", "login.php", "large");
        })
    })
</script>

<style>
    .btn_tag {
        font-size: 17px;
        background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
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

    .btn_tag:hover {
        background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
        color: #fff;
        transition: ease-in-out all 0.5s;
    }

    .read_more {
        font-size: 20px;
        background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
        color: #000;
        padding: 10px 40px 10px 40;
        width: 100%;
        max-width: 157px;
        text-align: center;
        display: inline-block;
        transition: ease-in all 0.5s;
        font-weight: 500;
        border-radius: 5px;
        height: 43px;

    }

    .read_more:hover {
        background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
        color: #fff;
        transition: ease-in-out all 0.5s;
    }
</style>