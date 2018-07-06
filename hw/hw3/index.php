<!DOCTYPE html>


<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
        <style>
            @import url("css/hw3style.css");
        </style>
        <title> Simple Business Card </title>
    </head>
    <body>
    <div id="main">
    <header>
           
         <h1> Simple Business Card </h1>
         <hr>
         <h2> Fill in the forms to create your business card!</h2>  
    </header>
      <div id="form">
        <form method="get">
            <!-- First Name -->
            <!-- Form 1 -->
            <label for="fName">First Name:</label>
            <input id="fName" type="text" name="fName" placeholder="First Name" value="<?=$_GET['fName']?>"/>
            <!-- Last Name -->
            <!-- Form 2 -->
            <label for="lName">Last Name:</label>
            <input id="lName" type="text" name="lName" placeholder="Last Name" value="<?=$_GET['lName']?>"/>
            <br/>
            
            <!-- Title -->
            <!-- Form 3 -->
            <fieldset>
                <legend>Choose a Title:</legend>
                <input id="developer" type="radio" name="title" placeholder="Developer" value="developer" <?php if($_GET['title'] == "developer") echo "checked";?>/>
                <label for="developer">Developer</label><br>
            
                <input id="jobSeeker" type="radio" name="title" placeholder="Job Seeker" value="jobSeeker"<?php if($_GET['title'] == "jobSeeker") echo "checked";?>/>
                <label for="jobSeeker">Job-Seeker</label><br>
            
                <input id="student" type="radio" name="title" placeholder="Student" value="student" <?php if($_GET['title'] == "student") echo "checked";?>/>
                <label for="student">Student</label><br>
            </fieldset>
            
            <!-- Favorite Animal -->
            <!-- Form 4 -->
            <fieldset>
                <legend>Choose your Favorite Animal:</legend>
                <input id="cat" type="radio" name="animal" value="cat" <?php if($_GET['animal'] == "cat") echo "checked";?>/>
                <label for="cat">Cat</label><br>
            
                <input id="dog" type="radio" name="animal" value="dog" <?php if($_GET['animal'] == "dog") echo "checked";?>/>
                <label for="dog">Dog</label><br>
            
                <input id="chicken" type="radio" name="animal" value="chicken" <?php if($_GET['animal'] == "chicken") echo "checked";?>/>
                <label for="chicken">Chicken</label>
            </fieldset>
            
            <!-- Current Year -->
            <!-- Form 5 -->
            <label for="currentYear">Current Year?</label>
            <select id="currentYear" name="year"  value="<?=$_GET['year']?>" <?php if($_GET['year']) echo "checked";?>/>
            <option value="2016" <?php if($_GET['year'] == "2016") echo "selected";?>>2016</option>
            <option value="2017" <?php if($_GET['year'] == "2017") echo "selected";?>>2017</option>
            <option value="2018" <?php if($_GET['year'] == "2018") echo "selected";?>>2018</option>
            <option value="2019" <?php if($_GET['year'] == "2019") echo "selected";?>>2019</option>
            <option value="2020" <?php if($_GET['year'] == "2020") echo "selected";?>>2020</option>
            </select>
        
            <!-- Submit --> 
            <!-- Form 6 -->
            <input id="button" type="submit" value="Create!"/>
        </form>
      </div>
      <br>
      <div id="businessCard">
          <?php
                if(!empty($_GET['fName'] && $_GET['lName'] && $_GET['title'] && $_GET['animal'] && $_GET['year']))
                {
                    $fName = $_GET['fName'];
                    $lName = $_GET['lName'];
                    $title = $_GET['title'];
                    $picture = $_GET['animal'];
                    $year = $_GET['year'];
                
                    echo "<div id='businessCardMain'>";
                    echo "<p id='nameText'>$fName $lName</p>";
                    
                    
                    
                    switch($picture){
                        case cat:
                             echo "<img id='favPic' src='img/cat.jpeg' alt='A Cat' width='150'>";
                        break;
                        case dog:
                             echo "<img id='favPic' src='img/dog.jpg' alt='A Dog' width='150'>";
                        break;
                        case chicken:
                             echo "<img id='favPic' src='img/chicken.jpg' alt='A Chicken' width='150'>";
                        break;
                    }
                    
                    echo "<p id='bioText'> Hello! My name is <i>$fName $lName</i> and this is my first business card!</p>";
                    
                    switch($title){
                        case developer:
                            echo "<p id='titleText'>Developer at CSUMB. I spend my time experimenting with HTML, CSS, and PHP. I develop websites to entertain.</p>";
                        break;
                        case student:
                            echo "<p id='titleText'>Student at CSUMB. I am currently studying in my fully-online CS course to obtain a degree in Software Engineering.</p>";
                        break;
                        case jobSeeker:
                            echo "<p id='titleText'>I am a freelance programmer with over 5+ years experience in C++, Java, and HTML</p>";
                        break;
                    }
                    
                    echo "<p id='bioText'> Phone Number: 555-5555</p>";
                    echo "<p id='yearText'><b>$year<b/></p>";
          
          
                    echo "</div>";
                }
          ?>
      </div>
      <br>
        
        <footer>
            <hr>
            CST 336. 2018&copy; Walker <br />
            <strong>DISCLAIMER:</strong> The Information on this webpage is
            used for academic purposes only! <br /><br />
            <img id="csumb" src="img/csumb.png" alt="CSUMB" width="100">
            
        </footer>    
    </div>
    </body>
</html>