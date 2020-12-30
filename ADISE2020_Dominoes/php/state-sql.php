<?php


include 'domino-function-library.php';


$state = dominoState(['jack','jill']);
printCurrentPlayerHand($state);


$JSONstate = stateToJSON($state);

insertTableFromStateWithoutGameID($JSONstate);
/*
$hand = getCurrentPlayerHand($state);
$domino = array_pop($hand);
$front = $domino["front"];
$back = $domino["back"];
$state = playDomino($state,$front,$back);

$JSONstate = stateToJSON($state);
/*
updateTableFromState($JSONstate,'4');


$state = dominoState(['n','m']);
echo "<br>";
echo "<br>";
echo "<br>";
print($state["current-player"]);
echo "<br>";
echo "<br>";
printCurrentPlayerHand($state);

$newjsonstate = selectState('4');
echo "<br>";
echo "<br>";

echo "<br>";
$state = jsonToState($newjsonstate);
var_dump($state);
*/

    function insertTableFromState($JSONstate,$gameID){ 
        if(!isset($connected)||$connected == false){
            require "../dbconnect.php";
        }
               
        $query = "INSERT INTO state (gameID,currentState) VALUES ('$gameID','$JSONstate')";
        mysqli_query ($dbcon, $query);  
    
    }

    function insertTableFromStateWithoutGameID($JSONstate){ 
        if(!isset($connected)||$connected == false){
            require "../dbconnect.php";
        }

        $query = "INSERT INTO state (currentState) VALUES ('$JSONstate')";
        mysqli_query ($dbcon, $query);
    
    }


    function updateTableFromState($JSONstate,$gameID){
        if(!isset($connected)||$connected == false){
            require "../dbconnect.php";
        }
        $query = "UPDATE state SET currentState = '$JSONstate' WHERE gameID = '$gameID' ";
        mysqli_query ($dbcon, $query);  
    }

    //returns in JSON format
    function selectState($gameID){
        if(!isset($connected)||$connected == false){
            require "../dbconnect.php";
        }
        $query = "SELECT currentState FROM state WHERE (gameID = '$gameID') ";
        $result =  mysqli_query ($dbcon, $query);;
        $array = ($result->fetch_assoc());
        return $array["currentState"];
    }

    
?>