<form>
    <!--Question 1-->
    What year was CSUMB founded? 
    <input type="text" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />

    <!--Question 2-->
    What is the name of CSUMB's mascot?<br />
    <input type="radio" name="question2" id="q2-1"  value="A"/><label for='q2-1'>Otto <br />
    <input type="radio" name="question2" id="q2-2"  value="B"/><label for='q2-2'>Albus <br />
    <input type="radio" name="question2" id="q2-3"  Value="C"/><label for='q2-3'>Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />
    
    
    <!--Question 3 -->
    For the Horde or For the Alliance?<br />
    <input type="radio" name="question3" id="q3-1"  value="A"/><label for='q3-1'>For the Horde! <br />
    <input type="radio" name="question3" id="q3-2"  value="B"/><label for='q3-2'>For the Alliance! <br />
    <div id="question3-feedback" class="answer"></div><br />
    
    <!--Question 4 -->
    2 + 2 = ?<br />
    <input type="radio" name="question4" id="q4-1"  value="A"/><label for='q4-1'>3 <br />
    <input type="radio" name="question4" id="q4-2"  value="B"/><label for='q4-2'>4 <br />
    <div id="question4-feedback" class="answer"></div><br />
    
    <input type="submit" value="Submit" />
    
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>

<!--Will display the quiz score-->
<div id="scores"></div>