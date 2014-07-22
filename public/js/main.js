$(function(){

    $.ajaxPrefilter(function(options, originalOptions, jqXHR){
        if (environment.token) {
            jqXHR.setRequestHeader('X-Auth-Token', environment.token);
        }
    });

    $(document).ajaxError(function (event, jqXHR) {
        if (jqXHR && jqXHR.status === 401) {
            window.location = environment.baseURL+'/login';
        }

        if(jqXHR && jqXHR.responseJSON){
            new Messages().addLaravelMessage(jqXHR.responseJSON).show();
        }
    });


    $('#synchronize').on('click', function(){

        var $button = $(this).button('loading');

        $.ajax({
            method:'GET',
            url:environment.baseURL+'/api/sync',
            success:function(data){
                toastr.success(data.message);

                setTimeout(function(){
                    window.location.reload();
                }, 1000);

            }
        }).always(function(){
            $button.button('reset');
        });

    });

});