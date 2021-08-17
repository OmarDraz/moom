const viewClicksmall = document.querySelector(" .span1 ");
const viewClicklarge = document.querySelector(".span2 ");

const viewIcon = document.querySelector(".product-container");
function Viewchange1() {
  viewIcon.style.gridTemplateColumns = "repeat(auto-fit,minmax(350px,1fr))"; // change 
  viewClicklarge.style.color = "#000";
  viewClicksmall.style.color = "#008bff";
  viewClicksmall.style.fontSize = "22px";
  viewClicklarge.style.fontSize ="18px";
}
viewClicksmall.addEventListener("click", Viewchange1);

function Viewchange2() {
  viewIcon.style.gridTemplateColumns = "repeat(auto-fit,minmax(250px,1fr))";
  viewClicklarge.style.color = "#008bff";
  viewClicksmall.style.color = "#000";
  viewClicksmall.style.fontSize = "18px";
  viewClicklarge.style.fontSize ="22px";
}
viewClicklarge.addEventListener("click", Viewchange2);
