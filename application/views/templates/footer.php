
<!-- Jquery -->
<script src="<?= base_url(); ?>assets/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Popper -->
<script src="<?= base_url(); ?>assets/bootstrap/popper.min.js" type="text/javascript"></script>
<!-- Bootstrap JS -->
<script src="<?= base_url(); ?>assets/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- general -->
<script src="<?= base_url(); ?>assets/js/general.js" type="text/javascript"></script>
<!-- login -->
<script src="<?= base_url(); ?>assets/js/login.js" type="text/javascript"></script>
<!-- signup -->
<script src="<?= base_url(); ?>assets/js/signup.js" type="text/javascript"></script>
<!-- contact -->
<script src="<?= base_url(); ?>assets/js/contact.js" type="text/javascript"></script>
<!-- chat -->
<script src="<?= base_url(); ?>assets/js/chat.js" type="text/javascript"></script>
<!-- news -->
<script src="<?= base_url(); ?>assets/js/news.js" type="text/javascript"></script>
<!-- dropzone.min.js -->
<script src="<?= base_url(); ?>assets/dropzone/dropzone.js" type="text/javascript"></script>
<!-- canvas -->
<script src="<?= base_url(); ?>assets/js/canvas.js" type="text/javascript"></script>
<script type="text/javascript">
	Dropzone.autoDiscover = false;
	const uploadForm = document.getElementById('upload-form');

	if (uploadForm) {
		var myDropzone = new Dropzone("#upload-form", { 
			url: "<?= base_url(); ?>gift/upload",
			paramName: "file", // The name that will be used to transfer the file
			maxFilesize: 10, // MB
		});

		myDropzone.on("addedfile", function(file) {
			if (file.status !== 'added') {
				myDropzone.removeFile(file);
			}
		});
	}

	<?php if(!empty($allNews)): ?>
    	<?php foreach($allNews as $news): ?>
    		<?php $newsid = empty($news->id) ? 0 : $news->id; ?>
	    	var addnewsImageButton = $('.add-news-image-<?= $newsid; ?>');
		    if (addnewsImageButton) {
		    	addnewsImageButton.click(function(event) {
		    		if (confirm('Are You Sure?')) {
			    		var newsid = $(this).attr('data-id');
			    		var uploadInput = $('.news-image-input-'+newsid);
			    		var loader = $('.add-news-image-loader-'+newsid);

			            uploadInput.trigger('click');
				        uploadInput.change(function(event) {
				    		loader.removeClass('d-none').fadeIn();
				    	    var files = event.target.files
				    		var formData = new FormData();
				    		formData.append('newsimage', files[0]);

				    		var request = $.ajax({
					            method: 'post',
					            url: uploadInput.attr('data-url'),
					            data: formData,
					            processData: false,
					            contentType: false,
					            dataType: 'json'
					        });

					        request.done(function(response){
					        	if (response.status === 1) {
					        		var imagePreview = $('.news-image-preview-'+newsid);
						            imagePreview.file = files[0];    
						            var reader = new FileReader();
						            reader.onload = (function(picture) { 
						                return (function(event) { 
						                    picture.attr('src', event.target.result);
						                    loader.addClass('d-none').fadeOut(); 
						                });
						            })(imagePreview);
						            reader.readAsDataURL(files[0]);
					        	}else {
					        		loader.addClass('d-none').fadeOut();
					        		alert(response.info);
					        	}
					        });

					        request.fail(function(response) {
					        	loader.addClass('d-none').fadeOut();
					        	alert('An error. Try again');
					        });
				    	});
				    }
		        });
		    }
		<?php endforeach; ?>
	<?php endif; ?>
</script>
<?php if(strpos(uri_string(), 'contact') !== false): ?>
	<script type="text/javascript">
		let map, InfoWindow;
		function drawGoogleMap() {
		  	map = new google.maps.Map(document.getElementById('mapping'), {
		    	center: { lat: -34.397, lng: 150.644 },
		    	zoom: 8,
		  	});

		  	InfoWindow = new google.maps.InfoWindow();
		  	const button = document.createElement('button');
		  	button.textContent = 'Get Current Location';
		  	button.classList.add('map-control');
		  	map.controls[google.maps.ControlPosition.TOP_CENTER].push(button);

		  	button.addEventListener('click', () => {
			    if (!navigator.geolocation) handleGeolocationError(false, InfoWindow, map.getCenter());

		        navigator.geolocation.getCurrentPosition((position) => {
			        const latlng = {
			            lat: position.coords.latitude,
			            lng: position.coords.longitude,
			        };
		            InfoWindow.setPosition(latlng);
		            InfoWindow.setContent('Location found');
		            InfoWindow.open(map);
		            map.setCenter(latlng);
		        }, () => {
		            handleGeolocationError(true, InfoWindow, map.getCenter());
		        });
			        
		    });
		}

		const handleGeolocationError = ((browserSupportsGeolocation, InfoWindow, position) => {
		  	InfoWindow.setPosition(position);
		  	InfoWindow.setContent(browserSupportsGeolocation ? 'Geolocation service unavailable.' : 'Your browser does not support Geolocation.');
		  	InfoWindow.open(map);
		});
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfPOvu93fUCGEbeTTszz141aom9dsQJ4g&callback=drawGoogleMap&libraries=&v=weekly" async></script>
<?php endif; ?>
</html>