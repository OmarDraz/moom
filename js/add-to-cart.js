$(document).ready(function () {  


    $('.create-btn').click(function (e) { 
        e.preventDefault();
        var action ="action";
        var name = e.currentTarget.parentElement.parentElement.querySelector('h3').innerText;
        var img =e.currentTarget.parentElement.parentElement.parentElement.querySelector('.img-container img').getAttribute('src');
        var price = e.currentTarget.parentElement.parentElement.querySelector('.price p').innerText;
        $.ajax({
            url:'includes/cart-add.php',
            method:'POST',
            data:{action:action,name:name,img:img,price:price},
            success:function(response){
                
                $(".nav-icons span").text(response);
                alert("the product addeddd successfully");
            }
        });
    });
    $('.add-to-cart').click(function (e) { 
        e.preventDefault();
        var data ="data";
        var single_name = document.querySelector('.ajax-name').innerHTML;
        var single_img =document.querySelector('.carousel-inner .active img ').getAttribute('src');
        var single_price = document.querySelector('.ajax-price').innerText;
        $.ajax({
            url:'includes/cart-add.php',
            method:'POST',
            data:{data:data,single_name:single_name,single_img:single_img, single_price:single_price},
            success:function(response){
                $(".nav-icons span").text(response);
                alert("the product added successfully");     
            }
        });
    });  
});

