<main class="chat-room">
	<div class="container">
		<div class="row">
			<section class="col-12">
				<h1>Barca chat for barca fans</h1>
				<p class="alert alert-info">From <a href="https://www.scaledrone.com/blog/webrtc-chat-tutorial/" target="__blank">Scaledrone WebRTC Chat Tutorial</a> (7 September 2017) 🐹</p>
				<div class="content w-100 border px-3 pt-4 rounded">
					<div class="messages"></div>
					<form class="footer w-100" onsubmit="return false;">
						<div class="form-row no-gutters">
							<div class="col-10">
								<div class="form-group input-group-lg">
							  		<input type="text" class="form-control bg-light rounded-pill" placeholder="Your message..">
								</div>
							</div>
							<div class="col-2">
								<button class="btn btn-lg bg-basecolor text-white rounded-pill" type="submit">
							  		<i class="icofont-play"></i>
							  	</button>
							</div>
						</div>
					</form>
				</div>
				<template data-template="message">
					<div class="message">
					  	<div class="message__name"></div>
					  	<div class="message__bubble"></div>
					</div>
				</template>
			</section>
		</div>
	</div>
</main>