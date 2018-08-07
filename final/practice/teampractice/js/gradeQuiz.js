$(document).ready(function(){
    
 
    
    var score = 0;
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var answer1 = $("input[name='a1']").val();
        var answer2 = $("input[name='a2']").val().trim();
        
        var answer3 = $("input[name='a3']").val().trim();
        var userEmail = $("#email").val().trim();
        
        console.log(answer1);
        console.log(answer2);
        console.log(answer3);
        console.log(userEmail);
        
    //Q1
        if(answer1 == "54"){
            correctAnswer($("#question1-feedback"));
        }else{
            incorrectAnswer($("question1-feedback"));
        }
        
        $("#question1-feedback").append("The correct answer is <stong>54</strong>");
    //Q2 
        if(answer2 == "sacramento"){
            correctAnswer($("#question2-feedback"));
        }else{
            incorrectAnswer($("question2-feedback"));
        }
        
        $("#question2-feedback").append("The correct answer is <stong>Sacramento</strong>");
        
    //Q3
        if(answer3 == "trump"){
            correctAnswer($("#question3-feedback"));
        }else{
            incorrectAnswer($("question3-feedback"));
        }
        
        $("#question3-feedback").append("The correct answer is <stong>Trump</strong>");
        
        
        $('#score').html("Your score is: " + score);
        $('#waiting').html("<img src='img/loading.gif' alt='submitting data'/>");
        $("input[type='submit']").css("display", "none");


        //Submits and stores score, retrieves average score
        $.ajax({
            type : "post",
            url  : "php/submitScores.php",           
            dataType : "json",
            data : {"score" : score,
                    "email" : userEmail
                    },            
            success : function(data){
                console.log(data);
                
                
                $("#feedback").css("display", "block");
                $("#times").html("Total Attempts: " + data.totalAttempts);
                $("#average").html("Last Score: " + data.score);
                
                $("input[type='submit']").css("display", "none");
                
                
            },
            complete: function(data,status) { //optional, used for debugging purposes
              // alert(status);
              console.log(data, status);
            }

        });//AJAX
        
    }); //formSubmit
    
    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    
}); //documentReady       