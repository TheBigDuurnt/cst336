<?php
    include 'php/dbConnection.php';
    include 'html/BSJQ.html';
    

    $conn = getDatabaseConnection();
?>

<!DOCTYPE html>
<html>
    <body>
        <form>
            What is  9 x 6?<input type="number" name="a1" required/><br/>
            <div id="question1-feedback" class="answer"></div><br />
            
            What is CA's state capital?<input type="text" name="a2" required/><br/>
            <div id="question2-feedback" class="answer"></div><br />
            
            Who is the POTUS?<input type="text" name="a3" required/><br/><br/>
            <div id="question3-feedback" class="answer"></div><br />
            
            Email: <input type="text" id="email" name="email" required/>
            <input type="submit" name="quizSubmission" value="Submit"/><br/>
            
        </form>
        
        <div id="score">
        </div>
        
        
        <div id="feedback"></div>
        <div id="times"></div>
        <div id="average"></div>
        
        <script type="text/javascript" src="js/gradeQuiz.js"></script>
    </body>
</html>