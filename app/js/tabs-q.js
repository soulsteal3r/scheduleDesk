var content = document.getElementsByClassName("login__block-content");
var block = document.getElementsByClassName("login__block-q");
var trigger = document.getElementsByClassName("icon-keyboard_arrow_right");

for(var p = 0; p < trigger.length; p++){
  (function(p){
    trigger[p].onclick = function(){
      for(var o = 0; o < trigger.length; o++){
        if(block[o].classList.contains("active") || content[o].classList.contains("active")){
          block[o].classList.remove("active");
          content[o].classList.remove("active");
        }
      }
      block[p].classList.toggle("active");
      content[p].classList.toggle("active");
    };
  })(p);
}
