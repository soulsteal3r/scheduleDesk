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

//Schedule page (tabs)

var tabs = document.getElementsByClassName("slide__top--tab");

var tabWrapper = document.getElementsByClassName("slide__content--tabWrapper");

for(var j=0; j<tabs.length; j++){
  (function(j){
    tabs[j].onclick = function(){
      for(var q=0; q<tabs.length; q++){
        if(!tabs[j].classList.contains("active-tab") || j!=q){
          tabs[q].classList.remove("active-tab");
          tabWrapper[q].classList.remove("active-tabWrapper");
        }
      }
      if(!tabs[j].classList.contains("active-tab")){
        tabs[j].classList.add("active-tab");
        tabWrapper[j].classList.add("active-tabWrapper");
      }

    }
  })(j);
}
