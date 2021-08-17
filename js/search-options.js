// gets array of elements that we want to append the event of hide/show
const searchCloseGroups = document.querySelectorAll(".button");

// function to hide/show the desired section
const options = (e) => {
  // Gets the section that will be hidden or shown using the element
  //that triggered the event then we get the parent of it so we then search in the parent for the section that we want to hide/show using querySelector
  const box = e.currentTarget.parentElement.querySelector(".search-options");
  const img = e.currentTarget.parentElement.querySelector(".button");
  

  // our hide/show logic
  if (box.style.display === "block") {
    box.style.display = "none";
    img.style.transform="rotate(0deg)"  
  } else {
    box.style.display = "block";
    img.style.transform="rotate(180deg)"
   
  }
};

// doing a foreach on the array of elements to append for each element the event of hide/show
searchCloseGroups.forEach((searchClose) =>
  searchClose.addEventListener("click", options)
);




