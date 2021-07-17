<section style="padding: 120px 0 80px;">
	<div class="container">
		<?php if(empty($allNews)): ?>
			<div class="alert alert-info d-block text-center">No News Yet</div>
		<?php else: ?>
    		<div class="row">
				<?php foreach($allNews as $news): ?>
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