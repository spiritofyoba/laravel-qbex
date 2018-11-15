jQuery(document).ready(function($){     

    $('.attachment-hover').on('click', function () {
        var src = $(this)
            .closest('.attachment')
            .find('img').attr('src');

        $('body')
            .append('<div class="attachment-lightbox"><img src="'+ src +'" /></div>')
            .fadeIn(300);
    });

    $(document).on('click', '.attachment-lightbox', function () {
        $(this)
            .fadeOut(300)
            .remove();
    });


    $('.commentlist li').each(function(i){
        $(this).find('div.commentNumber').text('#' + (i+1));
    });

    $('#commentform').on('click', '#submit', function(e){

        e.preventDefault();
        
        var comParent = $(this);
        
        var wrap_result = $('.wrap_result');

        wrap_result.html('');

		wrap_result.append('<div class="alert alert-success"><strong>Отправка</strong></div>')
            .fadeIn(500, function(){
                var data = $('#commentform').serializeArray();

                $.ajax({
                    url:$('#commentform').attr('action'),
                    data: data,
                    type: 'POST',
                    datatype: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                    success: function(html){
                                                                                                            
                        if(html.success){
                            wrap_result.append('<div class="alert alert-success"><strong>Сохранено!</strong></div>')
                                .delay(2000)
                                .fadeOut(500, function(){
                                    $('input#name, input#email, textarea#comment').val('');
                                    if(html.data.status == false) {
                                        wrap_result.html('<strong>Комментарий появится после проверки администратором</strong><br>').show(500);                                           
                                        setTimeout(function() { wrap_result.hide('slow'); }, 3000)
                                        $('#cancel-comment-reply-link').click();                                           
                                        return;
                                    }

                                    if(html.data.parent_id >0){
                                        comParent.parents('div#respond').prev()
                                        .after('<ul class="children">'+ html.comment + '</ul>')
                                    } else {
                                        if($.contains('#comments', 'ol.commentlist')){
                                            $('ol.commentlist').append(html.comment);
                                        } else {
                                            $('#respond').before('<div id="comments"><ol class="commentlist group">' + html.comment + '</ol></div>');
                                        }
                                    }
                                    $('#cancel-comment-reply-link').click();
                                })

                        } else {
                            wrap_result.append('<div class="alert alert-danger"><strong>Ошибка: </strong>' + html.error.join + '(<br>)</div>');
                            wrap_result.delay(3000).fadeOut(1000);
                        }
                    },

                    error: function(){
                        wrap_result.append('<div class="alert alert-danger"><strong>Ошибка: </strong></div>');
                        wrap_result.delay(2000).fadeOut(500, function(){
                            $('#cancel-comment-reply-link').click();
                        });
                    }
                });

            })					
    });

});   
