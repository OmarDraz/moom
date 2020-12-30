$('.nav ul li').click(function(){
 $(this).addClass("active").siblings().removeClass('active');
})

const tab = document.querySelectorAll('.tab');

function tabs(panelIndex){
    tab.forEach(function(node){
        node.style.display="none";
    });
    tab[panelIndex].style.display="block";
}
tabs(0);


let bio = document.querySelector('.bio');
function bioText(){
    bio.oldText=bio.innerText;
    bio.innerText =bio.innerText.substring(0,80) + ' . . . . . ' ;
    bio.innerHTML += '<span onclick="addlength()" id="see-more-bio">See More</span> '
}
bioText();

function  addlength(){
    bio.innerHTML=bio.oldText;
    bio.innerHTML +=  '<span onclick="bioText()" id="see-more-less">See Less</span> ';
}
