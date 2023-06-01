

function init(){

    var fireButton = document.getElementById("fireButton");
    fireButton.onclick = handlefireButton;
};


window.onload = init;


function handlefireButton(){

    var guessInput = document.getElementById("guessInput");
    var guess = guessInput.value;
    controller.prosessGuess(guess);

    guessInput.value = "";
};

var view = {
    displayMessage : function(msg){

        var msgArea = document.getElementById("msgarea");
        msgArea.innerHTML = msg;
    },

    displayHit : function(location){

        var cell = document.getElementById(location);
        cell.setAttribute("class", "hit");
    }, 

    displayMiss : function(location){

        var cell = document.getElementById(location);
        cell.setAttribute("class", "miss");


    },

       

};



var model = {

    boardSize : 7,
    numShip : 3,
    shipSunk : 0,
    shipLength : 3,

    ships : [{locations : ["06","16","26"], hits :["","",""]}, 
              {locations : ["24","34","44"], hits :["","",""]},
              {locations : ["10","11","12"], hits :["","",""] }],


    fire : function(guess){
        for(var i=0; i<this.numShip; i++){

            var ship = this.ships[i];
            var index = ship.locations.indexOf(guess);
            if(index>=0){

                ship.hits[index] = "hit";
                view.displayHit(guess);
                view.displayMessage("hit");
                if(this.isSunk(ship)){
                    alert("you sank my ship");
                    this.shipSunk++
                }
                return true;
            }
            
            

        }
        view.displayMiss(guess);
            view.displayMessage("miss");
        return false;


    },

    isSunk : function(ship){
        for(var i =0; i<ship.Length;i++){
            if(ship.hits[i] !== "hit"){
                return false;
            }
            return true;
        }
    },

};





function parseGuess(guess) {
    var alphabet = ["A", "B", "C", "D", "E", "F", "G"];
    if (guess === null || guess.length !== 2) {
    alert("Oops, please enter a letter and a number on the board.");
    } else {
    firstChar = guess.charAt(0);
    var row = alphabet.indexOf(firstChar);
    var column = guess.charAt(1);
    
    if (isNaN(row) || isNaN(column)) {
    alert("Oops, that isn't on the board.");
    } else if( row < 0 || row >= model.boardSize ||
        column < 0 || column >= model.boardSize) {
        //alert("Oops, that's off the board!");
        

        }else{
                return row + column;
        }
    
    
    }
    return null;
    
};


var controller ={
 guesses :0,

 prosessGuess : function(guess){
    var location  = parseGuess(guess);
    if(location){
        this.guesses++;
        var hit = model.fire(location);
        if(hit && model.shipSunk === model.numShip){
            alert("You sank all my battleships, in " + 
            this.guesses + " guesses");

        }
    }
 }


};


// controller.prosessGuess("A0");
// controller.prosessGuess("A6");
// controller.prosessGuess("B6");
// controller.prosessGuess("C6");
// controller.prosessGuess("C4");
// controller.prosessGuess("D4");
// controller.prosessGuess("E4");
// controller.prosessGuess("B0");
// controller.prosessGuess("B1");
// controller.prosessGuess("B2");
   
    



// model.fire("06");
// model.fire("16");
// model.fire("26");
// model.fire("24");
// model.fire("34");
// model.fire("44");

// view.displayMessage("tap");

// view.displayMiss("00");
// view.displayHit("34");
// view.displayMiss("55");
// view.displayHit("12");
// view.displayMiss("25");
// view.displayHit("26");

