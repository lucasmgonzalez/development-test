/**
 * Created by lucasgonzalez on 22/12/16.
 */
$(function(){
    $('#create-product').submit(function(ev){
        ev.preventDefault();

        var form = $(this);

        App.Form.submit(form,{
            title: 'Produto criado',
            type: 'success',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },function(){
           window.location = form.data('redirect');
        });

        return false;
    })
});