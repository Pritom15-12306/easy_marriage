<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">WEDDING PACKAGES</h2>
		<div class="d-flex w-100 justify-content-center">
			<hr class="border-color" style="border:3px solid" width="15%">
		</div>
		<div class="w-0">
			<?php
			$packages = $conn->query("SELECT * FROM `packages` order by rand() ");
			while ($row = $packages->fetch_assoc()) :
				$cover = '';
				if (is_dir(base_app . 'uploads/package_' . $row['id'])) {
					$img = scandir(base_app . 'uploads/package_' . $row['id']);
					$k = array_search('.', $img);
					if ($k !== false)
						unset($img[$k]);
					$k = array_search('..', $img);
					if ($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_' . $row['id'] . '/' . $img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count = $review->num_rows;
				$rate = 0;
				while ($r = $review->fetch_assoc()) {
					$rate += $r['rate'];
				}
				if ($rate > 0 && $review_count > 0)
					$rate = number_format($rate / $review_count, 0, "");
			?>

				<div class="card d-flex w-100 rounded-0 mb-3 package-item">
					<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
					<div class="card-body">
						<h5 class="card-title truncate-1"><?php echo $row['title'] ?></h5>
						<div class=" w-100 d-flex justify-content-start">
							<form action="">
								<div class="stars stars-small">
									<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?> /> <label class="star star-5" for="star-5"></label>
									<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?> /> <label class="star star-4" for="star-4"></label>
									<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?> /> <label class="star star-3" for="star-3"></label>
									<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?> /> <label class="star star-2" for="star-2"></label>
									<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?> /> <label class="star star-1" for="star-1"></label>
								</div>
							</form>
						</div>
						<p class="card-text truncate"><?php echo $row['description'] ?></p>
						<div class="w-100 d-flex justify-content-between">
							<button class="btn read_more"><i class="fa fa-tag"></i> <?php echo number_format($row['cost']) ?> </button>
							<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm read_more">View Package </a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	</div>
</section>

<style>
	.read_more {
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

	.read_more:hover {
		background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
		color: #fff;
		transition: ease-in-out all 0.5s;
	}

	.border-color {
		color: #44e6fd;
	}
</style>