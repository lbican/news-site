<?php
include "functions.php";


function generateDashboard()
{

  $dbc = connectToDatabase();

  if ($dbc) {
    $queryNews = "SELECT COUNT(*) AS numNews, COUNT(DISTINCT(news.category)) AS numCategories
      FROM news;";
    $queryUsers = "SELECT COUNT(*) AS numUsers FROM users";

    $result = mysqli_query($dbc, $queryNews);
    if ($result) {
      if ($row = mysqli_fetch_array($result)) {
        $numNews = $row['numNews'];
        $numCategories = $row['numCategories'];

        echo '
        <div class="card m-2 col-lg-4 col-sm-12 admin-card">
          <img src="func-img/news.svg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Broj vijesti</h5>
            <h2 class="card-text">' . $numNews . '</h2>
            <a href="add-news.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Dodaj vijest</a>
          </div>
          </div>';

        echo '
        <div class="card m-2 col-lg-4 col-sm-12 admin-card">
          <img src="func-img/organize.svg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Broj kategorija</h5>
            <h2 class="card-text">' . $numCategories . '</h2>
            <a href="#" class="btn btn-primary disabled"><i class="fa-solid fa-plus"></i> Dodaj kategoriju</a>
          </div>
          </div>';
      }
    }

    $result = mysqli_query($dbc, $queryUsers);
    if ($result) {
      if ($row = mysqli_fetch_array($result)) {
        $users = $row['numUsers'];
        echo '
        <div class="card m-2 col-lg-4 col-sm-12 admin-card">
          <img src="func-img/user.svg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Broj korisnika</h5>
            <h2 class="card-text">' . $users . '</h2>
            <a href="#" class="btn btn-primary disabled"><i class="fa-solid fa-magnifying-glass"></i> Pregledaj korisnike</a>
          </div>
          </div>';
      }
    }
  }
  mysqli_close($dbc);
}

#FETCH USER TABLE
function showUsers()
{
  $dbc = connectToDatabase();

  if ($dbc) {
    $query = "SELECT * FROM users;";
    $result = mysqli_query($dbc, $query);
    $rankStr = "return confirm('Jeste li sigurni da želite promijeniti razinu prava?')";
    #Fetch RESULTS
    if ($result) {
      echo '
      <table>';
      echo '
        <thead>
          <tr>
            <th>Korisničko ime</th>
            <th>Email</th>
            <th>Razina prava</th>
            <th>Akcija</th>
          </tr>
        </thead>
        <tbody>';
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $rights = $row['rights'];
        $rightsLevel = "unknown.";

        switch ($rights) {
          case 0:
            $rightsLevel = "Korisnik";
            break;
          case 1:
            $rightsLevel = "Publisher";
            break;
          case 2:
            $rightsLevel = "Admin";
            break;
        }

        echo '
          <tr>
            <td>' . $username . '</td>
            <td>' . $email . '</td>
            <td>' . $rightsLevel . '</td>';
        if ($_SESSION['rights'] == 2) {
          if ($rights == 2) {
            echo '
            <td> 
              <form action="rights.php?id=' . $id . '" method="post" onsubmit="' . $rankStr . '">
                <button type="submit" name="demote" class="btn btn-warning m-1">
                <i class="fa-solid fa-chevron-down"></i> Smanji razinu na Publisher
                </button>
              </form>
            </td>
            </tr>';
          }

          if ($rights == 1) {
            echo '
            <td> 
              <form action="rights.php?id=' . $id . '" method="post" onsubmit="' . $rankStr . '">
                <button type="submit" name="promote" class="btn btn-success m-1">
                  <i class="fa-solid fa-chevron-up"></i> Promoviraj u Admin
                </button>
                <button type="submit" name="demote" class="btn btn-warning m-1">
                  <i class="fa-solid fa-chevron-down"></i> Smanji razinu na Korisnik
                </button>
              </form>
            </td>
            </tr>';
          }

          if ($rights == 0) {
            echo '
            <td> 
              <form action="rights.php?id=' . $id . '" method="post" onsubmit="' . $rankStr . '">
                <button type="submit" name="promote" class="btn btn-success m-1">
                  <i class="fa-solid fa-chevron-up"></i> Promoviraj u Publisher
                </button>
              </form>
            </td>
            </tr>';
          }
        } else {
          echo '
            <td> 
              Nemate dovoljna prava.
            </td>
            </tr>';
        }
      }
      echo '</tbody>';
      echo '</table>';
    }
  }

  mysqli_close($dbc);
}

#FETCH NEWS TABLE
function showNews()
{
  $dbc = connectToDatabase();

  if ($dbc) {
    $query = "SELECT * FROM news ORDER BY news.date DESC";
    $result = mysqli_query($dbc, $query);

    #Fetch RESULTS
    if ($result) {
      echo '
      <table>';
      echo '
        <thead>
          <tr>
            <th>Naslov</th>
            <th>Opis</th>
            <th>Autor</th>
            <th>Datum</th>
            <th>Kategorija</th>
            <th>Slika</th>
            <th>Arhiva</th>
            <th>Akcija</th>
          </tr>
        </thead>
        <tbody>';
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $sdesc = $row['short_desc'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];
        $category = $row['category'];
        $photo = $row['photo'];
        $archive = $row['archive'] == 1 ? 'DA' : 'NE';
        $checkStr = "return confirm('Jeste li sigurni da želite obrisati ovaj članak?')";

        echo '
          <tr>
            <td><b>' . implode(' ', array_slice(explode(' ', $title), 0, 5)) . "..." . '</b></td>
            <td>' . implode(' ', array_slice(explode(' ', $sdesc), 0, 10)) . "..." . '</td>
            <td>' . $author . '</td>
            <td>' . $date . '</td>
            <td>' . $category . '</td>
            <td><img class="small-img rounded" src ="' . $photo . '"></td>
            <td>' . $archive . '</td>
            <td>
              
              <form action="delete.php?id=' . $id . '" method="post" onsubmit="' . $checkStr . '">
                <a class = "btn btn-primary m-1" href = "add-news.php?id=' . $id . '"><i class="fa-solid fa-pen-to-square"></i> Uredi</a>
                <input type="submit" class = "btn btn-danger m-1" name="submit" id="delete" value="Obriši">
              </form>
              
            </td>
          </tr>';
      }
      echo '</tbody>';
      echo '</table>';
    }
  }

  mysqli_close($dbc);
}
