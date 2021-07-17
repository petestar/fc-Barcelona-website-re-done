<main>
	<section class="container">
		<header class="text-md-center mb-3 pt-3">
			<h2>Manage News (<a href="<?= base_url(); ?>logout">Logout</a>)</h2>
			<a href="javascript:;" class="rounded-pill btn btn-sm btn-primary px-4" data-toggle="modal" data-target="#add-news">Add News</a>
		</header>
		<?php require VIEWPATH . '/news/add.php'; ?>
		<section class="">
			<?php if(empty($allNews)): ?>
				<div class="alert alert-info d-block text-center">No News Yet</div>
			<?php else: ?>
	    		<div class="row">
					<?php foreach($allNews as $news): ?>
						<?php $id = empty($news->id) ? 0 : $news->id; ?>
						<div class="col-12 col-md-4 mb-4">
							<div class="card">
								<div class="card-img position-relative">
						            <div class="position-absolute d-flex justify-content-between px-3 align-items-center" style="left: 0; bottom: 0; right: 0; z-index: 3; height: 50px; line-height: 50px; background-color: rgba(0, 0, 0, 0.4);">
						                <div class="text-white">(640 x 400)</div>
						                <a href="javascript:;" class="d-flex position-relative add-news-image-<?= $id; ?> text-white" data-id="<?= $id; ?>">
						                    Change image
						                </a>
						            </div>
						            <form action="javascript:;" enctype="multipart/form-data" style='display: none;'>
						            	<input type="file" name="newsimage" accept="image/*" class="news-image-input-<?= $id; ?>" data-url="<?= base_url(); ?>news/image/upload/<?= $id; ?>">
						            </form>
						            

						            <div class="add-news-image-loader-<?= $id; ?> d-none position-absolute p-3 rounded-circle text-center border" style="bottom: 50%; right: 50%; z-index: 4; transform: translate(50%, 50%); background-color: rgba(0, 0, 0, 0.75); width: 70px; height: 70px; line-height: 35px;" data-id="<?= $id; ?>">
						                <img src="<?= base_url(); ?>assets/images/svgs/spinner.svg">
						            </div>
						            <div style="height: 210px;">
						                <img src="<?= base_url(); ?>assets/images/news/<?= empty($news->image) ? 'd.webp' : $news->image; ?>" class="img-fluid news-image-preview-<?= $id; ?> h-100 w-100" style="object-fit: cover;">
						            </div>
						        </div>
								<div class="card-body">
									<?php $title = empty($news->title) ? '' : $news->title; ?>
									<h5 class="text-dark">
										<?= substr($title, 0, 25); ?>
									</h5>
									<p class="text-muted">
										<a href="javascript:;" class="text-muted" style="text-decoration: underline;" data-toggle="modal" data-target="#edit-news-<?= $id; ?>"><?= empty($news->description) ? '' : substr($news->description, 0, 50).'...'; ?></a>
									</p>
									<div class="text-muted d-flex justify-content-between">
										<small><em>By </em> <?= empty($news->author) ? 'Barcelona' : ucwords($news->author); ?></small>
									</div>
								</div>
								<div class="card-footer d-flex justify-content-between">
									<small>Posted <?= CI_Timeago::make($news->createdat ?? date('Y-m-d')); ?></small>
									<div class="d-flex">
										<a href="javascript:;" class="text-danger mr-2 delete-news" data-url="<?= base_url(); ?>news/delete/<?= $id; ?>">
											<small><i class="icofont-trash"></i></small>
										</a>
										<a href="javascript:;" class="text-warning" data-toggle="modal" data-target="#edit-news-<?= $id; ?>">
											<small><i class="icofont-edit"></i></small>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
	    		</div>
	    		<?php foreach($allNews as $news): ?>
	    			<?php require VIEWPATH . '/news/edit.php'; ?>
	    		<?php endforeach; ?>
	    	<?php endif; ?>
		</section>
	</section>
</main>