<div class="">
	<section class="" style="padding: 80px 0 0;">
		<div class="container">
			<h3 class="text-dark">Signup Here</h3>
			<p class="text-romansilver">Please Fill In All Fields.</p>
			<div class="row">
				<div class="col-12">
					<form action="javascript:;" method="post" class="signup-form p-4 rounded border" data-action="<?= base_url(); ?>signup">
						<div class="form-row">
							<div class="form-group input-group-lg col-md-6">
								<label for="" class="text-romansilver mb-2">Email</label>
								 <input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
								 <small class="error email-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg col-md-6">
								<label for="" class="text-romansilver mb-2">Username</label>
								 <input type="text" name="username" class="form-control username" placeholder="e.g., mantrilbore">
								 <small class="error username-error text-danger"></small>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group input-group-lg col-md-6">
								<label for="" class="mb-2 text-romansilver">Password
								</label>
								<input type="password" name="password" class="form-control password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error password-error text-danger"></small>
							</div>
							<div class="form-group input-group-lg col-md-6">
								<label for="" class="mb-2 text-romansilver">Confirm Password
								</label>
								<input type="password" name="confirmpassword" class="form-control confirmpassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
								<small class="error confirmpassword-error text-danger"></small>
							</div>
						</div>
						<button type="submit" class="btn mt-2 btn-lg border-0 bg-primary px-5 rounded-pill text-white signup-button">
							<img src="<?= base_url(); ?>assets/images/svgs/spinner.svg" class="mr-2 d-none signup-spinner mb-1">
							Signup
						</button>
						<div class="alert mt-4 px-3 signup-message d-none"></div>
					</form>
					<p class="alert alert-info mt-4">
						Already have an account? <a href="<?= base_url(); ?>login">Login Here</a>
					</p>
				</div>
			</div>
		</div>
	</section>
</div>

