var bubbleTrigger = document.getElementById("bubbleTrigger");
var bubblebg = document.getElementById("bubbleBg");
var bubblemenu = document.getElementById("bubbleMenu");
var body = document.getElementById("body");

bubbleTrigger.onclick = function(){
  if(bubblebg.classList.contains("active")){
    bubblebg.style.transition = ".6s";
  }else{
    bubblebg.style.transition = "1s";
  }
  bubblebg.classList.toggle("active");
  body.classList.toggle("ovh");
  setTimeout(function(){
    bubblemenu.classList.toggle("active");
  }, 200);
}
