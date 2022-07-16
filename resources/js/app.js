import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Language: javascript



// On page load or when changing themes, best to add inline in `head` to avoid FOUC


// Whenever the user explicitly chooses light mode
//   localStorage.theme = 'light'

// Whenever the user explicitly chooses dark mode
//   localStorage.theme = 'dark'

// Whenever the user explicitly chooses to respect the OS preference
//localStorage.removeItem('theme')
//slider
window.onload = function () {

  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
    console.log('dark theme');

    document.getElementById('light').classList.remove('hidden');
  } else {
    document.documentElement.classList.remove('dark')

    console.log('light theme');
  }

  // On theme change, update localStorage


  document.addEventListener('click', function (e) {
    if (e.target.id === 'dark-mode-switch') {
      localStorage.setItem('theme', 'dark');
      document.documentElement.classList.add('dark')
      document.getElementById('dark-mode-switch').classList.add('hidden');
      document.getElementById('light').classList.remove('hidden');
      console.log('dark je suis la');
    } else if (e.target.id === 'light') {
      localStorage.setItem('theme', 'light');
      document.documentElement.classList.remove('dark')
      document.getElementById('dark-mode-switch').classList.remove('hidden');
      document.getElementById('light').classList.add('hidden');
      console.log('light je suis la');
    }
  });

  //slibar navigation  
  var retract = false;
  var slidebar;

  document.addEventListener('click', function (e) {
    if (e.target.id == "reduce_btn") {
      retract = document.getElementById("reduce_btn");
      slidebar = document.getElementById("sidebar");
     
      if (retract.hasAttribute("retract")) {
       
        slidebar.style.width = "16rem";
        retract.removeAttribute("retract");
        document.getElementById("logo_dash_l").style.display = "block";
        retract.style.transform = "rotate(180deg)"? "rotate(0deg)": "rotate(-180deg)";
       
        retract.style.transition = "transform 0.5s";
        retract.style.transitionTimingFunction = "ease-in-out";
        document.querySelectorAll(".left_slider_content").forEach(function (element) {
          element.style.display = "block";
        });

        console.log(e.target.id);

      } else {
        slidebar.classList.remove("w-64");
        slidebar.style.width = "4rem";
        slidebar.classList.add("transition-all", 'duration-500');

        retract.style.transform = "rotate(180deg)";
        retract.setAttribute("retract", "sidebar_retracted");
        document.getElementById("logo_dash_l").style.display = "none";
        document.querySelectorAll(".left_slider_content").forEach(function (element) {
          element.style.display = "none";
        });

      }
      
      slidebar.classList.add("transition-all", 'duration-500');
      retract.style.transition = "transform 0.5s";

    }
  });


}

