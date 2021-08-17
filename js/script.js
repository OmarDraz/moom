
// JavaScript Document
 $(document).ready(function() {
    $('#autowidth').lightSlider({
        autoWidth:true,
        loop: true,
        onSliderLoad: function() {
            $('#autowidth').removeClass('cS-hidden');
        } 
    });

    $('#login').click(function(){
        $('#popup-bg').addClass('popup-bg-active');
    });
  });
 
  const login_btn = document.getElementById('#login');
const popup_bg = document.getElementById('#popup-bg');

if(login_btn){
login_btn.addEventListener('click', () => {
    console.log('s');
    popup_bg.classList.add('popup-bg-active');
});
}

if(popup_bg){
    popup_bg.addEventListener('click', () => {
        popup_bg.classList.remove('popup-bg-active');
    });
}
    $('.filter-icon').click(function(){
        $('#popup-filter').show();
    })

    $('.closebutton').click(function(){
        $('#popup-filter').hide();
    })