// Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var guessedWords;
    // initialize
    if(sessionStorage.getItem('guessedWords')) {
        guessedWords = JSON.parse(sessionStorage.getItem('guessedWords'));
        
    } else {
        guessedWords=[];
    }

var words = [{ word: "snake", hint: "It's a reptile"},
             { word: "monkey", hint: "It's a mammal"},
             { word: "beetle", hint: "It's an Insect"},
             { word: "opossum", hint: "It's a Marsupial"},
             { word: "mario", hint: "It's a me"}];

// Array of Available Letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];



// Listener ------------------------------------------------------------------->

window.onload = startGame();

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
})

$(".replayBtn").on("click", function(){
    location.reload();
})

$(".hint").click(function(){
    showHint(true);
    remainingGuesses -= 1;
    updateMan();
    disableButton($(this));
});     
     
     
// Functions ------------------------------------------------------------------>

function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}
            
function startGame() {
    pickWord();
    initBoard();
    createLetters();
    updateBoard();
    createHint();
    wordsGuessed();
}
            
function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length)
    selectedWord = words[randomInt].word.toUpperCase();  
    selectedHint = words[randomInt].hint;
}      

// Create the letters inside the letters div
function createLetters(){
    for (var letter of alphabet){
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>")
    }
}

function checkLetter(letter){
    var positions = new Array();
    
    for (var i=0; i < selectedWord.length; i++){
        if (letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if (positions.length > 0){
        updateWord(positions, letter);
        
        // If winning guess
        if (!board.includes('_')) {
            endGame(true);
        }
       
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    // if losing guess
    if (remainingGuesses <= 0){
        endGame(false);
    }
}

function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    updateBoard();
}

function updateBoard(){
    $("#word").empty();
    for(var letter of board) {
        document.getElementById("word").innerHTML += letter+ " ";
    }
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6-remainingGuesses) + ".png")
    
}

function endGame(win) {
     $("#letters").hide();
    
    if(win) {
        $('#won').show();
        guessedWords.push(selectedWord);
        sessionStorage.setItem('guessedWords', JSON.stringify(guessedWords));
        
    } else {
        $('#lost').show();
    }
}

// disables already used buttons
function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function createHint() {
    $("#hint").append("<button class='hint btn btn-primary'>" + 'Hint' + "</button>");
    $("#hint").append("<br/>");
}

function showHint(selected) {
    if(selected){
        $("#hint").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    }
}

function wordsGuessed() {
    if(guessedWords.length > 0) {
        $("#guessedWords").append("<b>Guessed Words: </b>");

        for(var word of guessedWords) {
            $("#guessedWords").append("<span class='guessedWords'>" + word + " " + "</span>");
        }
    }
}