$(document).ready(function () {
    $(".chkbox").click(function () {
      var ul = document.getElementById("selected-filter"); 
      ul.innerHTML = "";
      $(".chkbox:checked").each(function () {
        const name = $(this).val();
        ul.style.display = "inline-block"; //make ul visible
        var li = document.createElement("li"); // create <li>
        li.setAttribute("id", name);   // make id for li  
        li.appendChild(document.createTextNode(name));// add checked text label 
        ul.appendChild(li);  // add li to ul
      });
    });

    


  });
  

