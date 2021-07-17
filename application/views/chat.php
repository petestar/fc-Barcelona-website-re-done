<main class="chat-room">
	<div class="container">
		<div class="row">
			<section class="col-12">
				<h1>Barca chat for barca fans</h1>
				<p class="alert alert-info mb-3">From <a href="https://www.scaledrone.com/blog/webrtc-chat-tutorial/" target="__blank">Scaledrone WebRTC Chat Tutorial</a> (7 September 2017) 🐹</p>
				<p class="text-muted">This is the WebRTC chat. I got it from a website which is listed on the code below. The WebRTC chat is used for the website users to chat with each other on the website through a data channel. The channel creates a link which will allow the other user to join the chat. The chat link is created once the user goes to the chat page. Then  the user on the website have to send the link to the other user to join the chat.</p>
				<p class="text-muted">My point is to allow the users to chat with each other through the website. This can be done anywhere they are. It will enable fans to stay intouch anywhere and anytime. The communication doesnt stop.</p>
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