var body = document.getElementById("body");

//Bubble menu <=575
var bubbleTrigger = document.getElementById("bubbleTrigger");
var bubbleBg = document.getElementById("bubbleBg");
var bubbleMenu = document.getElementById("bubbleMenu");

//Hamb menu  >= 576 & <= 991
var hambTrigger = document.getElementById("hambTrigger");
var hambMenu = document.getElementById("hambMenu");

bubbleTrigger.onclick = function(){
  if(bubbleBg.classList.contains("active")){
    bubbleBg.style.transition = ".6s";
  }else{
    bubbleBg.style.transition = "1s";
  }
  bubbleBg.classList.toggle("active");
  bubbleTrigger.classList.toggle("active");
  body.classList.toggle("ovh");
  setTimeout(function(){
    bubbleMenu.classList.toggle("active");
  }, 200);
}

hambTrigger.onclick = function(){
  hambTrigger.classList.toggle("active");
  hambMenu.classList.toggle("active");
}
