
var acs ={

    things : ["img1","img2","img3"],

}

function init(){

    
    var msg  = document.getElementById("rock");
    msg.onclick = rock;

    var msg2 = document.getElementById("paper");
    msg2.onclick = paper;

    var msg3 = document.getElementById("seccor");
    msg3.onclick = seccor;
   
}


window.onload = init;

function rock(){

    var n  =Math.floor(Math.random() *3);
    var img1 = document.getElementById("pic1");
    img1.setAttribute("class",acs.things[n]);

var img = document.getElementById("pic2");
img.setAttribute("class","imgA");
    
}


function paper(){


    var n  =Math.floor(Math.random() *3);
    var img1 = document.getElementById("pic1");
    img1.setAttribute("class",acs.things[n]);

    var img = document.getElementById("pic2");
    img.setAttribute("class","imgB");
        
    }

    function seccor(){

        var n  =Math.floor(Math.random() *3);
        var img1 = document.getElementById("pic1");
        img1.setAttribute("class",acs.things[n]);

        var img = document.getElementById("pic2");
        img.setAttribute("class","imgC");
            
        }


// var s = ["rock",'paper','seccor'];


// var n =   Math.floor(Math.random() *3);

// console.log(s[n]);