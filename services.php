<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">OUR BEST SERVICES</h2>
		<div class="d-flex w-100 justify-content-center">
			<hr class="border-color" style="border:3px solid" width="15%">
		</div>
		<div class="w-0">
			<?php
			$services = $conn->query("SELECT * FROM `services` order by rand() ");
			while ($row = $services->fetch_assoc()) :
				$cover = '';
				if (is_dir(base_app . 'uploads/services_' . $row['id'])) {
					$img = scandir(base_app . 'uploads/services_' . $row['id']);
					$k = array_search('.', $img);
					if ($k !== false)
						unset($img[$k]);
					$k = array_search('..', $img);
					if ($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/services_' . $row['id'] . '/' . $img[2] : "";
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
				<div class="row">
					<div class="col-md-12 sercicess">
						<div class="card  w-100 rounded-5 mb-3 services-item">
							<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="400px;" style="object-fit:cover">
							<div class="card-body">
								<h5 class="card-title truncate-1"><?php echo $row['title'] ?></h5>
								<div class="w-100 d-flex justify-content-between">

									<a href="./?page=view_services&id=<?php echo md5($row['id']) ?>" class="btn btn-sm read_more">View Services</a>


								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	</div>
</section>

<style>
	.card-body h5 {
		font-size: 30px;
		font-weight: 700;
		text-align: center;
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

	.border-color {
		color: #44e6fd;
	}
</style>