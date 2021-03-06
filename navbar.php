<?php include 'connection.php'?>
<!-- Navbar -->
<nav class="navbar smart-scroll navbar-expand-lg navbar-light border border-secondary" style="background-color: #fff;">
        <span class="navbar-brand mb-0 h1" style="font-family: 'Lemonada', cursive;"><img src="https://image.flaticon.com/icons/svg/3039/3039386.svg" alt="" width="30" height="30"> HDMovies.com</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: 'Exo 2', sans-serif;">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $base_url?>">Home 🏠<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Movies/Webseries 🎥
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo $base_url?>filter_origin.php?origin=bollywood">Bollywood</a>
                <a class="dropdown-item" href="<?php echo $base_url?>filter_origin.php?origin=hollywood">Hollywood</a>
                <a class="dropdown-item" href="<?php echo $base_url?>filter_origin.php?origin=South Indian">South Indian</a>
                
            </li>
            
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Genre 🌐
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                $sql = "SELECT genre FROM movie";
                $q = mysqli_query($connection, $sql);
                $res = mysqli_fetch_assoc($q);
                while($res = mysqli_fetch_assoc($q))
                {
                    // echo $res['genre'];
                ?>
                <a class="dropdown-item" href="<?php echo $base_url?>filter_genre.php?genre=<?php echo $res['genre']?>"><?php echo $res['genre'];?></a>
                <?php
                }
                ?>
                <!-- <a class="dropdown-item" href="#">Action</a> -->
                
            </li>
            
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>

    <div class="container">
        <center>
        <form action="" method="post">
            <input type="search" name="search" id="search" class="my-3" placeholder="Search Movies/WebSeries" required autocomplete="off">
        </form>
        </center>    
    </div>
    <?php
        if(isset($_POST['search']))
        {
            $search = $_POST['search'];
            echo '<script>';
            echo 'window.location="'.$base_url.'search.php?search='.$search.'"';
            echo '</script>';
        }
    ?>
    