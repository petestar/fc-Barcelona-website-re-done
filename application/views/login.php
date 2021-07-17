<main>
	<section class="container login-container">
		<div class="row align-items-center justify-content-center py-4">
			<div class="col-12 col-md-5 col-lg-4 mb-4">
				<h1 class="">User Login</h1>
				<form action="javascript:;" method="post" class="login-form rounded mb-3" data-action="<?= base_url(); ?>auth">
					<div class="alert mt-4 px-3 login-message d-none"></div>
					<div class="form-row">
						<div class="form-group input-group-lg col-12">
							<label for="" class="text-muted mb-2">Email</label>
							 <input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
							 <small class="error email-error text-danger"></small>
						</div>
						<div class="form-group input-group-lg col-12">
							<label for="" class="mb-2 text-muted">Password
							</label>
							<input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
							<small class="error password-error text-danger"></small>
						</div>
					</div>
					<button type="submit" class="btn btn-lg border-0 bg-primary px-5 rounded-pill text-white login-button btn-block">
						<img src="<?= base_url(); ?>/assets/images/svgs/spinner.svg" class="mr-2 d-none login-spinner mb-1">
						Login
					</button>
				</form>
				<p class="alert alert-info">
					Don't have an account? <a href="<?= base_url(); ?>signup">Signup Here</a>
				</p>
			</div>
		</div>	
	</section>
</main>