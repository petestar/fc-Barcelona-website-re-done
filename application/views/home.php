<main>
	<section>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		    </ol>
		    <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100 slider-image" src="<?= base_url(); ?>/assets/images/slides/them.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100 slider-image" src="<?= base_url(); ?>/assets/images/slides/messi.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100 slider-image" src="<?= base_url(); ?>/assets/images/slides/griez.jpg" alt="Third slide">
			    </div>
		    </div>
		    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
		    </a>
		</div>
	</section>
	<section class="culers-section">
        <div class="container">
        	<header class="text-md-center">
        		<div class="row justify-content-center">
        			<div class="col-12 col-md-8 col-lg-6">
        				<h1 class="mb-3 text-dark">Only For Culers</h1>
			            <p class="text-muted mb-4">Barça and the English club agree to a deal on the Portuguese footballer until 30 June 2022</p>
        			</div>
        		</div>    
	        </header>
	        <main class="row">
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/1.jpg">
                    </picture>
	            </div>
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/2.webp">
                    </picture>
	            </div>
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/3.webp">
                    </picture>
	            </div>
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/4.webp">
                    </picture>
	            </div>
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/5.webp">
                    </picture>
	            </div>
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/6.webp">
                    </picture>
	            </div>
	            <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <picture class="">
                        <img class="img-fluid" src="<?= base_url(); ?>assets/images/culers/7.webp">
                    </picture>
	            </div>
	        </main>
        </div>
    </section>
    <section style="padding: 0 0 80px;">
    	<div class="container">
    		<header class="text-md-center mb-3">
    			<h1>Barcelona News</h1>
    			<div class="row justify-content-center">
    				<div class="col-12 col-md-5">
    					<p>"AGUEROOOOOOOOOOOOOOOOOO! Welcone to your new home, legend! And Eric, welcome back home! ❤❤❤💪💪" <a href="<?= base_url(); ?>news">(See all news)</a></p>
    				</div>
    			</div>
    		</header>
    		<?php if(empty($allNews)): ?>
				<div class="alert alert-info d-block text-center">No News Yet</div>
			<?php else: ?>
	    		<div class="row">
	    			<?php $slicedNews = count($allNews) > 6 ? array_slice($allNews, 0, 6) : $allNews; ?>
					<?php foreach($slicedNews as $news): ?>
						<div class="col-12 col-md-4 mb-4">
							<div class="card border-0">
								<div class="card-body px-0">
									<div class="card-img mb-3">
										<img src="<?= base_url(); ?>assets/images/news/<?= empty($news->image) ? '' : $news->image; ?>" class="img-fluid border">
									</div>
									<?php $title = empty($news->title) ? '' : $news->title; ?>
									<?php $formattitle = implode(explode(' ', $title), '-'); $formattitle = str_replace(',', '', $formattitle); ?>
									<?php $id = empty($news->id) ? '' : $news->id; ?>
									<h4><a href="<?= base_url(); ?>news/<?= $id; ?>/<?= $formattitle; ?>" class="text-dark"><?= substr($title, 0, 25); ?></a> </h4>
									<p class="text-muted">
										<a href="<?= base_url(); ?>news/<?= $id; ?>/<?= $formattitle; ?>" class="text-muted" style="text-decoration: underline;"><?= empty($news->description) ? '' : substr($news->description, 0, 50).'...'; ?></a>
									</p>
									<div class="text-muted mb-3">
										<small>Posted <?= CI_Timeago::make($news->createdat ?? date('Y-m-d')); ?> <em>By </em> <?= empty($news->author) ? 'Barcelona' : ucwords($news->author); ?></small>
									</div>
									<a href="<?= base_url(); ?>news/<?= $id; ?>/<?= $formattitle; ?>" class="btn btn-primary px-4 rounded-pill">Read News</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
	    		</div>
	    	<?php endif; ?>
    	</div>
    </section>
</main>