$('.quick-view').click(function (e) { 
    e.preventDefault();
        var m="m";
        var card_id = e.currentTarget.parentElement.querySelector('.card_id').value;
        $.ajax({
            url:'includes/quick-view.php',
            method:'POST',
            data:{m:m,card_id:card_id},
            success:function(response){
                $('.popup-view').show();
                $('.popup-view-content div').html(response);   
            }
        });
    

});

$('.close-quick').click(function (e) { 
    $('.popup-view').hide(); 
    
});

