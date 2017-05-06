<?php

//recieve Javascript array via json magic
$ringArray = jsonString2Obj($_POST['json']);

// pass the variables to the function
get_ringArray_index($ringArray, "band", "color", "stone", "cut");

// take each selection out of the array, into a variable
function get_ringArray_index($ringArray, $band, $color, $stone, $cut){
	
	// place junk into variables
	$bandSelection = $ringArray->$band;
	$colorSelection = $ringArray->$color;
	$stoneSelection = $ringArray->$stone;
	$cutSelection = $ringArray->$cut;
	
	// add to db
	global $db;

	$query = 'INSERT INTO orders (band, color, stone, cut)
			  VALUES (:bandSelection, :colorSelection, :stoneSelection, :cutSelection)';
	$statement = $db->prepare($query);
	$statement->bindValue(':bandSelection', $bandSelection);
	$statement->bindValue(':colorSelection', $colorSelection);
	$statement->bindValue(':stoneSelection', $stoneSelection);
	$statement->bindValue(':cutSelection', $cutSelection);
	$statement->execute();
	$statement->closeCursor();
	
	echo "Success!";
	
	// display the junk in the console. 
//	echo $bandSelection;
//	echo $colorSelection;
//	echo $stoneSelection;
//	echo $cutSelection;

}

// display the json array
//print_r($ringArray);

// helps with the json. not sure what part though
function jsonString2Obj($str){
    return json_decode(stripslashes($str));
}


?>