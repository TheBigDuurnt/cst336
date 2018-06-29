 <?php

 
        /* Function that controls application */
        function play(){
            $array = array(); 
            while(true){
                $result = displayDie($randomValue);
                array_push($array, $result); 
                if($result == 20 || $result == 1){
                    print_r($array);
                    echo "Number Of Rolls: " . count($array); 
                    break;
                }
            }
        }
        
        /*displays results of win or loss */
        function displayResult($randomValue){
            echo "<div id='output'>";
            switch($randomValue){
                case 1 : 
                    echo "<h2> Critical Fail! You Lose! </h2>";
                    break;
                case 20 : 
                    echo "<h2> Critical Hit! You Win! </h2>";
                    break;
            
            echo "</div>";        
            }
        }
        /* creates random number and calls displayResult() if $randomValue = 1 or 20 */
        function displayDie($randomValue){
            $randomValue = rand(1,20);
            if($randomValue == 1) {
                  echo '<img src="img/naturalOne.jpg" alt="naturalOne" title="Critical Fail" width="500" />';
                  displayResult($randomValue);
                  return $randomValue;
                  /** echo $randomValue; **/ 
            } else 
            if($randomValue == 20) {
                 echo '<img src="img/naturalTwenty.jpg" alt="naturalTwenty" title="Critical Hit" width="500" />';
                 displayResult($randomValue);
                 return $randomValue;
                 /** echo $randomValue; **/ 
            }
            else {
                return $randomValue;
                
            }
        }


?>