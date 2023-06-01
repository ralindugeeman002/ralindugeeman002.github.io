function signUp(){

 window.location ="signUp.php";

}

function LogIn(){

    window.location = "index.php";
}



function signUp2(){

var email = document.getElementById("em");
var password = document.getElementById("pw2");
var username  = document.getElementById("un2");


var f = new FormData();

 f.append("em",email.value);
 f.append("pw",password.value);
 f.append("un",username.value);


 var  r = new XMLHttpRequest();

  r.onreadystatechange = function(){

    if(r.readyState == 4){
        var t =r.responseText;

        
        if(t == "success"){


            document.getElementById("msgdiv2").innerHTML = t;
        
            document.getElementById("msgdiv2").className = "d-block alt2";

            window.location = "index.php";


        }else{
            document.getElementById("msgdiv2").innerHTML =t;
            document.getElementById("msgdiv2").className = "d-block alt1";
            
        }

        
        
    }
  }

  r.open("POST","signUpProcess.php",true);
  r.send(f);

    

}

function signingo(){

    window.location = "index.php";
}

function signIn(){


    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var r = document.getElementById("remember")

    var f = new FormData();

    f.append("un",un.value);
    f.append("pw",pw.value);
    f.append("r",r.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){

        if(r.readyState == 4 ){
            var t = r.responseText;
            if(t == "success"){
                
                document.getElementById("msg").innerHTML = t;
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block alt2";


                window.location = "home.php";


            }else{

                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block alt1";
            }
        }
    }

    r.open("POST","signInProcess.php",true);
    r.send(f);
}

function signout(){


    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){

        if(r.readyState == 4){
            var t =r.responseText;
            if(t == "success"){
                window.location.reload() 
            }else{
                alert(t);
            }
        }
    }

    r.open("GET","signoutprocess.php",true);
    r.send();
}

var bm;
function forgotPassword(){


    var em = document.getElementById("un");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){

        if(r.readyState == 4){

            var t = r.responseText;
            if(t == "success"){
                alert("verification code sent to your email");
                var m = document.getElementById("forgotPasswordModal")
                bm = new bootstrap.Modal(m);
                bm.show();
            }else{
                alert(t);
            }
        }
    }


    r.open("GET","forgotPasswordprocess.php?e=" + em.value, true);
    r.send();





}

function showPassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function showPassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}


function resetpw(){

 var e = document.getElementById("un");
 var np = document.getElementById("npi");
 var rnp = document.getElementById("rnp");
 var vcode = document.getElementById("vc");

 var f = new FormData();

 f.append("em",e.value);
 f.append("n", np.value);
 f.append("r", rnp.value);
 f.append("v", vcode.value);



 var r = new XMLHttpRequest();


 r.onreadystatechange =function(){

    if(r.readyState == 4){

        var t = r.responseText;

        if(t == "success"){
            bm.hide();
            alert("password reset successfully");
        }else{
            alert(t);
        }
    }
 }


 r.open("POST","resetpasswordProcess.php",true);
 r.send(f);


}

function wishlist(){

    window.location = "wishlist.php";
}

function addtowishlist(ID){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){

        if(r.readyState ==4){
            var t = r.responseText;
            if(t == "remove"){
                document.getElementById("square" + ID).style.className = "bi-plus-square";
                window.location.reload();
            }else if(t == "added"){
                document.getElementById("square" + ID).style.className = "bi-plus-square-fill";
                window.location.reload();

            }else{
                alert(t);
            }

            
        }
    }


    r.open("GET","addtowishlistprocess.php?ID=" + ID,true);
    r.send();




}


function cart(){

    window.location = "cart.php";
}


function addtocart(ID){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){

        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Add to Cart"){

                document.getElementById("btn_change" + ID).innerHTML =t;
                document.getElementById("btn_change" + ID).style.className = " btn-danger";
                window.location.reload();
                
                
            }else if(t == "Remove From Cart"){
                document.getElementById("btn_change" + ID).innerHTML =t;
                document.getElementById("btn_change" + ID).style.className ="btn-dark";
                window.location.reload();
                
                

                
                
            }else{
                alert(t);
            }
        }
    }

    r.open("GET","addtocartprocess.php?ID=" + ID,true);
    r.send();
}

function search1(x){


    var s = document.getElementById("s");
    var s1 = document.getElementById("s1");
    var s2 = document.getElementById("s2");
    var s3 = document.getElementById("s3");
    var s4 = document.getElementById("s4");

    var f = new FormData();

    f.append("s",s.value);
    f.append("s1",s1.value);
    f.append("s2",s2.value);
    f.append("s3",s3.value);
    f.append("s4",s4.value);
    f.append("page",x);
    


    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){

        if(r.readyState == 4){
            var t = r.responseText;
            document.getElementById("textarea").innerHTML = t;
        }
    }

    r.open("POST","advancesearchprocess.php",true);
    r.send(f);
}














