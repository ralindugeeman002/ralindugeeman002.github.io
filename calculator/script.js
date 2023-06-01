function m(){
    var num1 = document.getElementById("t1").value;
    var num2 = document.getElementById("t2").value;
    var as1 = document.getElementById("as1");

    var answer = parseInt(num1) + parseInt(num2);

    as1.innerHTML = "Answer is=" + answer;


}