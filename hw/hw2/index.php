<!DOCTYPE html>
<?php
include 'inc/functions.php';
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
        <style>
            @import url("css/hw2styles.css");
        </style>
        <title> Roll Off : Personal Website </title>
    </head>
    <body>
    <div id="main">
        <header>
           
           <h1> Roll-Off! </h1>
           <hr>
           
        </header>
        <h3> Roll a <i>20</i> before a <i>1</i> or its game over!</h3>
        <?php

        play();

        ?>
            
        <form>
            <input id="button" type="submit" value="Play Again!"/>
        </form>
        
        <a id="links" href="https://www.amazon.com/Dark-Spark-Decals/b/ref=w_bl_sl_ap_je_web_16013562011?ie=UTF8&node=16013562011&field-lbr_brands_browse-bin=Dark+Spark+Decals">Click here</a> for image credits.
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