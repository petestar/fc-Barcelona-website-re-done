(function ($) {

	'use strict';

    $('.add-news-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
    	var button = $('.add-news-button');
    	var spinner = $('.add-news-spinner');
    	var message = $('.add-news-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 0 && response.field === 'title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), response.info);

            }else if (response.status === 0 && response.field === 'author') {
                handleButton(button, spinner);
                handleErrors($('.author'), $('.author-error'), response.info);

            }else if (response.status === 0 && response.field === 'description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), response.info);

            } else if (response.status === 1) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html(response.info).fadeIn();
                window.location.reload();

            } else if (response.status === 0) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html(response.info).fadeIn();

            } else {
                handleButton(button, spinner);
                alert('Network Error. Try Again');
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error. Try Again');
        });
    });

    $('.edit-news-form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var button = $('.edit-news-button');
        var spinner = $('.edit-news-spinner');
        var message = $('.edit-news-message');
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        message.hasClass('d-none') ? '' : message.fadeOut();

        var request = $.ajax({
            method: form.attr('method'),
            url: form.attr('data-action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json'
        });

        request.done(function(response){
            if (response.status === 0 && response.field === 'title') {
                handleButton(button, spinner);
                handleErrors($('.title'), $('.title-error'), response.info);

            }else if (response.status === 0 && response.field === 'author') {
                handleButton(button, spinner);
                handleErrors($('.author'), $('.author-error'), response.info);

            }else if (response.status === 0 && response.field === 'description') {
                handleButton(button, spinner);
                handleErrors($('.description'), $('.description-error'), response.info);

            } else if (response.status === 1) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html(response.info).fadeIn();
                window.location.reload();

            } else if (response.status === 0 && response.field === undefined) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-success').addClass('alert-danger');
                message.html(response.info).fadeIn();

            } else {
                handleButton(button, spinner);
                alert('Network Error. Try Again');
            }
        });

        request.fail(function() {
            handleButton(button, spinner);
            alert('Network Error. Try Again');
        });
    });

    $('.delete-news').on('click', function() {
        var caller = $(this);
        if(confirm('Are You Sure To Delete?')) {
            var request = $.ajax({
                method: 'post',
                url: caller.attr('data-url'),
                processData: false,
                contentType: false
            });

            request.done(function(response) {
                if (response.status === 1) {
                    alert(response.info);
                    window.location.reload();
                } else if (response.status === 0) {
                    alert(response.info);
                }
            });

            request.fail(function() {
                alert('Network Error. Try Again.');
            });
        }
    });

})(jQuery);
