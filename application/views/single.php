<main class="news-read">
	<section class="container">
		<div class="row">
			<div class="col-12 col-md-8 mb-4">
				<?php if(empty($news)): ?>
					<div class="alert alert-info">News Not Found</div>
				<?php else: ?>
					<picture>
						<img src="<?= base_url(); ?>/assets/images/news/<?= empty($news->image) ? '' : $news->image; ?>" class="img-fluid w-100">
					</picture>
					<h4 class="mb-3 mt-4">
						<?= empty($news->title) ? '' : $news->title; ?>
					</h4>
					<p class="text-muted">
						<?= empty($news->description) ? '' : $news->description; ?>
					</p>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-4">
				<?php if(empty($allNews)): ?>
					<div class="alert alert-info">No Recent News Found</div>
				<?php else: ?>
					<?php foreach($allNews as $news): ?>
						<?php $newsid = empty($news->id) ? 0 : $news->id; ?>
						<?php if($id !== $newsid): ?>
								<?php $title = empty($news->title) ? '' : $news->title; ?>
								<?php $formattitle = implode(explode(' ', $title), '-'); $formattitle = str_replace(',', '', $formattitle); ?>
								<div class="card mb-3">
									<div class="card-body pb-0">
										<a href="<?= base_url(); ?>news/<?= $newsid; ?>/<?= $formattitle; ?>">
											<img src="<?= base_url(); ?>/assets/images/news/<?= empty($news->image) ? '' : $news->image; ?>" class="img-fluid w-100">
										</a>
										<p class="mt-3">
											<a href="<?= base_url(); ?>news/<?= $newsid; ?>/<?= $formattitle; ?>" class="text-muted" style="text-decoration: underline;"><?= substr($title, 0, 25); ?></a>
										</p>
									</div>
								</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>