<?php

  // FUNCTIONS ////////////////////////////////////////////////
  function getPictureURL() {
        include 'dbConnection.php';
        $conn = getDatabaseConnection("pets");
        
        $sql = "SELECT pictureURL FROM pets";
                
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $record;
    }
  
  function getPetList() {
        include 'dbConnection.php';
        $conn = getDatabaseConnection("pets");
        
        $sql = "SELECT *
                FROM pets";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $record;
    }
  ////////////////////////////////////////////////////////////////
?>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="https://csumb.edu">CSUMB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="pets.php">Adoptions</a>
                    <a class="nav-item nav-link" href="about.php">About Us</a>
                </div>
            </div>
        </nav>
        
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>