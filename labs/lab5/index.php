<?php

include 'dbConnection.php';

$conn = getDatabaseConnection("ottermart");

function displayCategories() {
    global $conn;
    
    $sql ="SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records); //Can be used to view results
    
    foreach($records as $record) {
        echo "<option value='".$record["catId"]."' >" .$record["catName"] . "</option>";
    }
    
function displaySearchResults(){
    global $conn;
    
    if(isset($_GET['searchForm'])) { // checks whether user has submitted the form
        echo "<hr>";
        echo "<h3><b>Products Found: </b></h3>";
        
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if(!empty($_GET['product'])) {
            $sql .= " AND productName LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
        }
        
        if(!empty($_GET['category'])) {
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
        }
        
        if(!empty($_GET['priceFrom'])) {
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        if(!empty($_GET['priceTo'])) {
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }
        
        if(isset($_GET['orderBy'])) {
            if($_GET['orderBy'] == "price") {
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);  // We NEED to include $namedParameters here
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);       
        
         foreach ($records as $record) {
             echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";   
             
             echo  $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />";
         } 
            
    
    }
}


}

?>
<!DOCTYPE html>
<html>
    
    <head>
        <title> OtterMart Product Search</title>
        <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
        <link href="css/lab5styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>

            <h1> Ottermart Product Search</h1>
            <img id="csumbBanner" src="img/csumbBanner.jpg" alt="CSUMBBanner" width="400">
            <br /><br /><br /><br />
        <form>
            <fieldset>  
            <b>Product:</b> <input type="text" name="product" />
            
            <br>
            <b>Category:</b>
                <select name="category">
                    <option value="">Select One</option>
                    
                    <?=displayCategories()?>
                    
                </select>
            <br>
            <b>Price:</b> From <input type="text" name="priceFrom" size="7" />
                   To   <input type="text" name="priceTo" size="7" />
            </fieldset>
            <br>
            <fieldset>
            <b> Order result by:</b>
            <br>
            
            <input type="radio" name="orderBy" value="price"/> Price <br>
            <input type="radio" name="orderBy" value="name"/> Name
            </fieldset>
            <br><br>
            <input id="submit" type="submit" value="Search" name="searchForm" />
        </form>
        
        <br />
        
        </div>
        
        
        <?= displaySearchResults() ?>
        <br>
        
        <footer>
        <hr>
            CST 336. 2018&copy; Walker <br />
            <strong>DISCLAIMER:</strong> The Information on this webpage is
            used for academic purposes only! <br /><br />
            <img id="csumb" src="img/csumb.png" alt="CSUMB" width="100">
        
        </footer>  
        <br />
        <br />
    </body>
</html>