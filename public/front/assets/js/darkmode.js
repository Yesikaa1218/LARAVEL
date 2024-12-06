const toggleColourModeBtn = document.getElementById("dark-mode-toggle");

let colourMode = localStorage.getItem('colourMode'); 

if(colourMode == "dark"){
  document.documentElement.setAttribute('data-theme', 'dark');
  $("#dark-mode-toggle").html("<i class='fas fa-adjust' style='padding:5px;'></i> Light Mode");
}

toggleColourModeBtn.addEventListener("click", function () {

    if (document.documentElement.hasAttribute('data-theme', 'dark')) {
        document.documentElement.removeAttribute('data-theme', 'dark');
        $("#dark-mode-toggle").html("<i class='fas fa-adjust' style='padding:5px;'></i> Dark Mode");
        colourMode = "light";
    }
    else {        
      document.documentElement.setAttribute('data-theme', 'dark');    
      $("#dark-mode-toggle").html("<i class='fas fa-adjust' style='padding:5px;'></i> Light Mode");
      colourMode = "dark";
    }  

    localStorage.setItem("colourMode", colourMode);

});