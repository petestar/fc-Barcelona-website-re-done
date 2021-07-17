<main class="contact-main">
	<header>
		<section class="container">
			<h3 class="text-white">Contact Us</h3>
		</section>
	</header>
	<section class="container contact-form-section">
		<div class="row mb-3">
			<div class="col-12">
				<p class="text-muted">Please fill in all fields</p>
				<form action="javascript:;" method="post" class="contact-form p-4 rounded border" data-action="<?= base_url(); ?>/contact">
					<div class="form-row">
						<div class="form-group input-group-lg col-md-6">
							<label for="" class="text-romansilver mb-2">Your Fullname</label>
							 <input type="text" name="fullname" class="form-control fullname" placeholder="e.g., Mantril Bob">
							 <small class="error fullname-error text-danger"></small>
						</div>
						<div class="form-group input-group-lg col-md-6">
							<label for="" class="text-romansilver mb-2">Email</label>
							 <input type="email" name="email" class="form-control email" placeholder="e.g., john@doe.com">
							 <small class="error email-error text-danger"></small>
						</div>
					</div>
					<div class="form-row mb-3">
						<div class="col-12">
							<label>Message</label>
							<textarea class="form-control message" name="message" placeholder="Enter your message" rows="4"></textarea>
							<small class="error message-error text-danger"></small>
						</div>
					</div>
					<div class="alert mt-4 px-3 contact-message d-none"></div>
					<button type="submit" class="btn mt-2 btn-lg border-0 bg-primary px-5 rounded-pill text-white contact-button">
						<img src="<?= base_url(); ?>/assets/images/svgs/spinner.svg" class="mr-2 d-none contact-spinner mb-1">
						Send
					</button>
				</form>
			</div>
		</div>
		<h4>Your Location (Click Get Current Location)</h4>
		<div class="row mt-4">
			<div class="col-12">
				<div class="w-100 border rounded" id="mapping" style="height: 380px;"></div>
			</div>
		</div>
	</section>
</main>