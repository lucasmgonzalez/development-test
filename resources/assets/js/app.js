
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./app/loader');

window.App = {

    init: function(){
        $.material.init();
    },

    Form: {
        //todo refatorar para ter mensagem de erro custom - melhor colocar isso tudo num objeto...
        submit : function(form, success_message, success_callback, error_callback){
            var action = form.attr('action');

            var data = form.serialize();

            var submitButton = $('[type=submit]',form);
            submitButton.button('loading');

            //Reset errors
            $('.help-block.error',form).remove();
            $('.form-group.has-error').removeClass('has-error');

            $.post(action,data,function(response){
                if(success_message instanceof Object){
                    swal(success_message,success_callback)
                }else{
                    swal({
                        title: success_message,
                        type: "success"
                    },success_callback);
                }
            }).fail(function(response){
                submitButton.button('reset');
                var text;
                switch (response.status){
                    case 422:
                        text = 'Algum campo do formulário não foi preenchido corretamente'
                        var errors = response.responseJSON;
                        $.each(errors, function(key,value){
                            var error = $('<span></span>').addClass('help-block error').text(value[0]);
                            $('[name='+key+']',form).parents('.form-group').addClass('has-error').append(error);
                        });
                        break;
                    case 400:
                    case 403:
                    case 500:
                    default:
                        text = response.responseText;
                        break;
                }

                swal({
                    title:'Ooops... Algo deu errado',
                    text: text,
                    type:'error'
                },error_callback);
            });
        }
    }
};

$(function(){

    App.init();

});
