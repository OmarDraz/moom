$(document).ready(function () {
    
    $('.chkbox').click(function(){
        $('.loader').show();
        var action = 'action';
        var lang = get_selected_filter("lang");
        var category = get_selected_filter("category")
        var subcategory = get_selected_filter("subcategory");
        var maxprice = $('#maxnum_range').val();
        var minprice = $('#minnum_range').val();
        $.ajax({
            url:'includes/filter.php',
            method:'POST',
            data:{action:action,category:category,subcategory:subcategory,lang:lang,maxprice:maxprice,minprice:minprice},
            success:function(response){
                $(".product-container").html(response);
                $('.loader').hide();
            }
        })
    });
   


function get_selected_filter(text){
    var filter_data=[];
    $('.'+text+':checked').each(function () {
        const name =$(this).val();
        filter_data.push(name);   
    });
    return filter_data;
}
});


    