
const searchInput = document.querySelectorAll("#search-input");
// const listItems = document.querySelectorAll(".filter-container ul li ");

// const listElements = [...listItems];

const search = function(event) {
  const items = event.currentTarget.parentElement.querySelectorAll(" ul li");
  
  const searchValue = this.value.toLowerCase();
  items.forEach(item => {
    const stringFound = item.innerText.toLowerCase().indexOf(searchValue) !== -1;
    if (stringFound) {
      /**
       ** Make list item visible
       **/
      item.style.display = "block";
    } else {
      /**
       ** Make list item invisible
       **/
      item.style.display = "none";
    }
  });
};

searchInput.forEach((one) =>
one.addEventListener("input", search)
);





  