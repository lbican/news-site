<?php
include 'functions.php';
session_start();

if(isset($_GET['id']) && $_SESSION['rights'] >= 1){
    if(is_numeric($_GET['id'])){
        $id = $_GET['id'];
        
        $dbc = connectToDatabase() or die("ERROR!");
        if($dbc){
            $query = "DELETE FROM news WHERE id = ". $id . "";
            $result = mysqli_query($dbc, $query);
            header("refresh:0; url=admin.php");
        }

    }
}
else{
    header("refresh:0; url=index.php");
}

?>