(function ($){
    function delete_cart(id){
        $.ajax({
            url: '/cart/delete',
            type: 'POST',
            data: {
                id: id
            },
            success: function(data){
                if(data.status == 'success'){
                    $('#cart_'+id).remove();
                    $('#cart_total').html(data.total);
                }
            }
        });
    }
});