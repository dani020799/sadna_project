<html>
    <head>
    </head>
    <body>
    <?php include_once 'header.php' ?>
        <!-- container for content-->
        <div class="container panel">
            <!--- Popular shows slider-->
            <div class="container">
                <h1> Highly Recommended Movies</h1>
                <div class="slider row flex-row flex-nowrap align-items-start" style="overflow-x: auto;">
                <?php 

                  //  $servername = "localhost";
                   // $username = "root";
                  //  $password = "";
                  //  $dbname = "MyNetflixList";
                    // Create connection
                 //   $conn = new mysqli($servername, $username, $password);


                    // Check connection
                    if (mysqli_connect_error()) {
                        // TODO: redirect to 502 page? or do that it can't load anything?
                        die("Database connection failed: " . mysqli_connect_error());
                    }
                    # echo "Connected successfully";
                    // Try to query first slider data
                /*    $sql = "SELECT *
                    FROM MyNetflixList.Shows as s JOIN 
                    (SELECT ShowID,AVG(Rating) as Avg FROM MyNetflixList.ShowStatus
                    GROUP BY ShowID
                    ORDER BY Avg DESC) as avg
                    ON s.Id = avg.ShowID
                    WHERE ReleaseYear = 2021 AND isMovie = True 
                    LIMIT 20;";
				*/	
					 $sql = "SELECT *
                    FROM MyNetflixList.Shows as s JOIN 
                    (SELECT ShowID,AVG(Rating) as Avg FROM MyNetflixList.ShowStatus
                    GROUP BY ShowID
                    ORDER BY Avg DESC) as avg
                    ON s.Id = avg.ShowID
                    WHERE  isMovie = True 
                    LIMIT 20;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $poster = ($row['Poster'] == NULL)? "public/no-poster.png" : $row['Poster'];
                            //echo "Test" . $row['Title'];
                            echo "<div class='card'>
                            <img src='". $poster ."' class='card-img-top' alt='Poster of ". $row['Title'] . "'>
                            <div class='card-body text-truncate-container'>
                                <h4>". $row['Title'] ."</h4>
                                <p class='card-text'>".$row['Description']."</p>
                            </div>
                            <a href='". "Show.php?Id=". $row['Id'] ."' class='stretched-link'></a>
                            </div>";
                        }
                    } else{
                        // echo "empty";
                    }
                   // $conn->close(); 
                ?>
                </div>
            </div>
            
            
            <!--- Israel Lastest TV shows-->
            <div class="container">
                <h1>Lastest TV Shows From Israel</h1>
                <div class="slider row flex-row flex-nowrap align-items-start" style="overflow-x: auto;">
                <?php 
                  //  $servername = "localhost";
                  //  $username = "root";
                   // $password = "";
                  //  $dbname = "MyNetflixList";
                    // Create connection
                  //  $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if (mysqli_connect_error()) {
                        // TODO: redirect to 502 page? or do that it can't load anything?
                        die("Database connection failed: " . mysqli_connect_error());
                    }
                    # echo "Connected successfully";
                    // Try to query first slider data
                    $sql = "SELECT DISTINCT s.Id, s.Title, c.Name, s.Description, s.Poster, s.ReleaseYear
                            FROM MyNetflixList.Shows AS s JOIN MyNetflixList.Countries AS c ON s.CountryID = c.Id
                            WHERE c.Name = 'Israel' AND s.isMovie = False
                            ORDER BY ReleaseYear DESC
                            LIMIT 10;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $poster = ($row['Poster'] == NULL)? "public/no-poster.png" : $row['Poster'];
                            //echo "Test" . $row['Title'];
                            echo "<div class='card'>
                            <img src='". $poster ."' class='card-img-top' alt='Poster of ". $row['Title'] . "'>
                            <div class='card-body text-truncate-container'>
                                <h4>". $row['Title'] ."</h4>
                                <p class='card-text'>".$row['Description']."</p>
                            </div>
                            <a href='". "Show.php?Id=". $row['Id'] ."' class='stretched-link'></a>
                            </div>";
                        }
                    } else{
                        // echo "empty";
                    }
                  //  $conn->close(); 
                ?>
            </div>
        </div>
        <!--- Israel Lastest Movies-->
        <div class="container">
                <h1>Lastest Movies From Israel</h1>
                <div class="slider row flex-row flex-nowrap align-items-start" style="overflow-x: auto;">
                <?php 
                  //  $servername = "localhost";
                  //  $username = "root";
                  //  $password = "";
                   // $dbname = "MyNetflixList";
                    // Create connection
                  //  $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if (mysqli_connect_error()) {
                        // TODO: redirect to 502 page? or do that it can't load anything?
                        die("Database connection failed: " . mysqli_connect_error());
                    }
                    # echo "Connected successfully";
                    // Try to query first slider data
                    $sql = "SELECT DISTINCT s.Id, s.Title, c.Name, s.Description, s.Poster, s.ReleaseYear
                            FROM MyNetflixList.Shows AS s JOIN MyNetflixList.Countries AS c ON s.CountryID = c.Id
                            WHERE c.Name = 'Israel' AND s.isMovie = True
                            ORDER BY ReleaseYear DESC
                            LIMIT 10;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $poster = ($row['Poster'] == NULL)? "public/no-poster.png" : $row['Poster'];
                            //echo "Test" . $row['Title'];
                            echo "<div class='card'>
                            <img src='". $poster ."' class='card-img-top' alt='Poster of ". $row['Title'] . "'>
                            <div class='card-body text-truncate-container'>
                                <h4>". $row['Title'] ."</h4>
                                <p class='card-text'>".$row['Description']."</p>
                            </div>
                            <a href='". "Show.php?Id=". $row['Id'] ."' class='stretched-link'></a>
                            </div>";
                        }
                    } else{
                        // echo "empty";
                    }
                   // $conn->close(); 
                ?>
            </div>
        </div>
        <div class="container">
                <h1>Lastest Movies From USA</h1>
                <div class="slider row flex-row flex-nowrap align-items-start" style="overflow-x: auto;">
                <?php 
                 //   $servername = "localhost";
                 //   $username = "root";
                  //  $password = "";
                  //  $dbname = "MyNetflixList";
                    // Create connection
                 //   $conn = new mysqli($servername, $username, $password);

                    // Check connection
                    if (mysqli_connect_error()) {
                        // TODO: redirect to 502 page? or do that it can't load anything?
                        die("Database connection failed: " . mysqli_connect_error());
                    }
                    # echo "Connected successfully";
                    // Try to query first slider data
                    $sql = "SELECT DISTINCT s.Id, s.Title, c.Name, s.Description, s.Poster, s.ReleaseYear
                            FROM MyNetflixList.Shows AS s JOIN MyNetflixList.Countries AS c ON s.CountryID = c.Id
                            WHERE c.Name = 'United States' AND s.isMovie = True
                            ORDER BY ReleaseYear DESC
                            LIMIT 30;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $poster = ($row['Poster'] == NULL)? "public/no-poster.png" : $row['Poster'];
                            //echo "Test" . $row['Title'];
                            echo "<div class='card'>
                            <img src='". $poster ."' class='card-img-top' alt='Poster of ". $row['Title'] . "'>
                            <div class='card-body text-truncate-container'>
                                <h4>". $row['Title'] ."</h4>
                                <p class='card-text'>".$row['Description']."</p>
                            </div>
                            <a href='". "Show.php?Id=". $row['Id'] ."' class='stretched-link'></a>
                            </div>";
                        }
                    } else{
                        // echo "empty";
                    }
                   // $conn->close(); 
                ?>
            </div>
        </div>
    </body>
</html> 
