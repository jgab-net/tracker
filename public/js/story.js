$(function(){

    $('#storyStart').on('click', function(){
        var $button = $(this).button('');

        $.ajax({
            method:'GET',
            url:environment.baseURL+'/api/stories/'+$button.data('id')+'/start',
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

    $('#storyPause').on('click', function(){
        var $button = $(this).button('');

        $.ajax({
            method:'GET',
            url:environment.baseURL+'/api/stories/'+$button.data('id')+'/pause',
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

    $('#storyStop').on('click', function(){
        var $button = $(this).button('');

        $.ajax({
            method:'GET',
            url:environment.baseURL+'/api/stories/'+$button.data('id')+'/stop',
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