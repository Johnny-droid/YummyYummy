/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showDropdownContent() {
    document.getElementById("myDropdown").classList.toggle("show"); 
}

window.onclick = function(event) {
    if (!event.target.matches('.button')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

