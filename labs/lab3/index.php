<?php
    $backgroundImage = "img/sea.jpg";
            
            
            
    // API call goes here
    if (isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
        //print_r($imageURLs);
        echo "You searched for: " . $_GET['keyword'];
    }
?>
    
<html>

<!DOCTYPE html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url("<?=$backgroundImage; ?>");
            }
        </style>

    </head>
    <body>
      
        <br>
        <?php
            if (!isset($imageURLs)) { //form not submitted
                echo "<h2> Type a keyword to display a slideshow <br/> with random images from Pixabay.com </h2>";
            }  else { // form submitted
                //print_r($imageURLs); //checking that $imageURLs is not null
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- indicators here -->
            <ol class ="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i==0)?" class='active'": "";
                        echo "></li>";
                    }
                ?>    
            </ol>
            
            
            
            <!-- Wrapper for images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0,count($imageURLs));
                        } while (!isset($imageURLs[$randomIndex]));
                    
                        echo '<div class="carousel-item ';
                        echo ($i==0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
          <!-- CONTROLS -->
          <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        
        <?php
            } // end of else statement
        ?>
        
        <!-- HTML form goes here -->
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            
            <div id="HV-buttons">
                <input type="radio" name="layout" value="horizontal" id="h-button" />
                <label for="h-button"> Horizontal </label>
                <br/>
                <input type="radio" name="layout" value="vertical" id="v-button" />
                <label for="v-button"> Vertical </label>
            </div>
            
            <br/><br/>
         
            <select name ="category">
                <option value ="">Select One</option>
                <option value ="Ocean">Sea</option>
                <option value ="Forest">Forest</option>
                <option value ="Mountains">Mountain</option>
                <option value ="Snow">Snow</option>
            </select>
            <input type="submit" value="Submit">
        </form>
        
        <br/><br/>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>