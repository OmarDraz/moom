
var total=document.querySelectorAll('.total-row');
total.forEach(item => {
   var price= item.parentElement.querySelector('.product-info small span ').innerHTML;
   var qty = item.parentElement.querySelector(".qty-input").value;
   
  
    item.innerHTML=price*qty;
});

var sum = 0;
total.forEach(one => {
    sum+=Number(one.innerHTML)
});

document.querySelector('.total-colum').innerHTML=sum;





