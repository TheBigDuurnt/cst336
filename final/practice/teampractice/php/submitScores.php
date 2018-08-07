<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection();


    $userEmail = $_POST['email'];
    $score = $_POST['score'];
    
    $sql = "SELECT * FROM finalPrac WHERE email = :email";
    $np[':email'] = $userEmail;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($result){
        // UPDATE THAT RECORD WITH SCORE and ATTEMPTS
        $sql = "UPDATE finalPrac SET lastScore = :lastScore, attempts = :attempts
                WHERE email = :email";
        $np = array();
        $np[':email'] = $userEmail;
        $np[':lastScore'] = $score;
        $np[':attempts'] = $result['attempts']+1;
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
        $data['score'] = $result['lastScore'];
        $data['totalAttempts'] = $result['attempts']+1;
        echo json_encode($data);
        
    }else{
        //INSERT NEW RECORD
        $sql = "INSERT INTO finalPrac (email, lastScore, attempts) VAlUES (:email, :lastScore, :attempts)";
        $np = array();
        $np[':email'] = $userEmail;
        $np[':lastScore'] = $score;
        $np[':attempts'] = 1;
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($np);
        
        $data['score'] = "NA";
        $data['totalAttempts'] = 1;
        echo json_encode($result);
    }
    

    

?>