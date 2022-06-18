<?php

include "functions.php";

// FETCH ARTICLE AND DISPLAY CARD ON MAIN-PAGE
// If limit is set to true, it only echoes 3 articles.
function fetchArticles($type, $limit)
{
    $dbc = connectToDatabase();

    if ($dbc) {
        if ($limit) {
            $query = "SELECT * FROM news WHERE category = '" . $type . "' ORDER BY news.date DESC LIMIT 3;";
        } else {
            $query = "SELECT * FROM news WHERE category = '" . $type . "'ORDER BY news.date DESC;";
        }
        $result = mysqli_query($dbc, $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {

                $id = $row['id'];
                $title = $row['title'];
                $desc = $row['short_desc'];
                $date = $row['date'];
                $datetime = date("M d, Y. H:i", strtotime($date));
                $photo = $row['photo'];

                if($limit)
                {echo '<div class="col-lg-4 pb-2">';}
                else{
                    echo '<div class="col-lg-3 pb-2">'; 
                }
                 
                echo '<a href = "article.php?id=' . $id . '" class="news-link"><div class="card h-100 ">
                    <img src= ' . $photo . ' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $title . '</h5>
                        <p class="card-text">' . $desc . '</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">' . $datetime . '</small>
                    </div>
                </div>
                </a>
            </div>';
            }
        }
    }
    mysqli_close($dbc);
}


// Fetch ARTICLE from DATABASE by ID AND DISPLAY
function getArticle($id)
{
    $dbc = connectToDatabase();

    if ($dbc) {
        $query = "SELECT * FROM news WHERE id = $id LIMIT 3;";
        $result = mysqli_query($dbc, $query);
        if ($result) {
            if ($row = mysqli_fetch_array($result)) {

                $title = $row['title'];
                $desc = $row['short_desc'];
                $content = $row['content'];
                $date = $row['date'];
                $datetime = date("M d, Y. H:i", strtotime($date));
                $photo = $row['photo'];
                $author = $row['author'];

                $since = timeSince($datetime);
                
                echo '
                <article class="container-fluid">
                    <div class="sizer mx-auto">
                        <h3 class="px-3">' . $title . '</h3>
                        <span class="text-muted px-3">' . $since . '</span>
                        <p class="px-3 py-0 m-0">Autor: ' . $author . '</p>
                    </div>
                    <img class="w-100 my-2 " src="' . $photo . '">
                    <div class="sizer pb-5 pt-3 mx-auto">
                        <p class="fw-bold">' . $desc . '</p>
                        <p>' . $content . '</p>
                    </div>
                </article>';
            }
            else{
                echo '<img class="w-100 my-2 " src="func-img/404.png">';
            }
        }
        
    }
    mysqli_close($dbc);
}


