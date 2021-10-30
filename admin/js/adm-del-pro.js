$(document).ready(function(){

    var origin = window.location.origin;
    var path = window.location.pathname.split( '/' );
    var URL = origin+'/'+path[1]+'/';
 
 // delete product
        $('.delete_product').click(function(){
            var tr = $(this);
            var pro_code = $(this).attr('data-code');         
            if(confirm('Are you Sure want to delete this')){
                $.ajax({
                    url: './admin/products.php',
                    type: 'POST',
                    data: {delete_id:pro_code},
                    dataType: 'json',
                    success: function(response){
                        var res = response;
                        if(res.hasOwnProperty('success')){
                            tr.parent().parent('tr').remove();
                            
                        }else if(res.hasOwnProperty('error')){
                            // $('#updateProduct').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                        }
                    }
                });
            }
        });
});