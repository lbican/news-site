<?php 

//Used for main database connection
function connectToDatabase(){
    $servername = "localhost:3306";
    $user = "root";
    $pass = "";
    $db = "news_db";

    $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error! " . mysqli_connect_error());
    return $dbc;
}

//Calculates time since given datetime and builds an informative string
function timeSince($datetime){
    $start_date = new DateTime(date("M d, Y. H:i"));
    $since_start = $start_date->diff(new DateTime($datetime));
    $since = "prije ";
    if ($since_start->days > 0) {
        $since .= $since_start->days . " dana ";
        if ($since_start->h) {
            $since .= $since_start->h . " sati ";
        }
        $since .= $since_start->i . " minuta ";
    } else if ($since_start->h) {
        $since .= $since_start->h . " sati ";
        if ($since_start->i > 0) {
            $since .= " i " . $since_start->i . " minuta";
        }
    } else {
        $since .= $since_start->i . " minuta";
    }

    return $since;
}

//NO LONGER USED!
function getFirstTwoWords(&$content){
    $content;
    $dot = ".";

    $position = stripos ($content, $dot); //find first dot position

    if($position) { //if there's a dot in our soruce text do
        $offset = $position + 1; //prepare offset
        $position2 = stripos ($content, $dot, $offset); //find second dot using offset
        $first_two = substr($content, 0, $position2); //put two first sentences under $first_two
        $content = substr($content, $position2+5);
        return  $first_two . '.'; //add a dot

    }

    else {  //if there are no dots
        //do nothing
    }
}
?>