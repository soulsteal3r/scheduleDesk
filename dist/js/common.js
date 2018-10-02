var Hambtrigger = document.getElementById("hambTrigger");
var bg = document.getElementById("hambBg");
var body = document.getElementById("body");
var menu = document.getElementById("hambMenu");
Hambtrigger.onclick = function(){
  if(bg.classList.contains("active")){
    bg.style.transition = ".6s";
  }else{
    bg.style.transition = "1s";
  }
  bg.classList.toggle("active");
  body.classList.toggle("ovh");
  setTimeout(function(){
    menu.classList.toggle("active");
  }, 200);
}
