/**
 * Created by lucasgonzalez on 22/12/16.
 */
$(function(){
    $('#update-product').submit(function(ev){
        ev.preventDefault();

        var form = $(this);

        App.Form.submit(form,{
            title: 'Dados atualizado',
            type: 'success',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },function(){
            window.location = form.data('redirect');
        });

        return false;
    })
});