<?php include 'connection.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/3039/3039386.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@500&display=swap" rel="stylesheet">
    <title>HDMovies.com</title>
    <style>
        .smart-scroll{
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
        }
        .scrolled-down{
        transform:translateY(-100%); transition: all 0.3s ease-in-out;
        }
        .scrolled-up{
        transform:translateY(0); transition: all 0.3s ease-in-out;
        }
        .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
        transition: 0.3s;
        width: 100%;
        border-radius: 5px;
        }

        .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.8);
        }

        img {
        border-radius: 5px 5px 5px 5px;
        }
        .img_container {
        padding: 2px 16px;
        }
        .new_footer{
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        input[type=search] {
        width: 280px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('<?php echo $base_url?>static/img/icons8-search-24.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        }

        input[type=search]:focus {
        width: 100%;
        }
    </style>
  </head>
  <body>
    
    <?php include 'navbar.php'?>

    
            <?php
            $get_search_string = $_GET['search'];
            $sql_movies = "SELECT * FROM movie WHERE movie_name LIKE '%$get_search_string%'";
            $sql_result  = mysqli_query($connection, $sql_movies);
            // print_r($sql_result);
            if($sql_result->num_rows > 0)
            {
            ?>
        <div class="container my-3">
            <div class="row text-center">
            
            <?php
    
            $results_per_page = 12;

            $get_search_string = $_GET['search'];
            $sql_movies = "SELECT * FROM movie WHERE movie_name LIKE '%$get_search_string%'";
            $sql_result  = mysqli_query($connection, $sql_movies);

            // $sql = "SELECT * FROM movie";
            // $result = mysqli_query($connection, $sql);
            $number_of_results = mysqli_num_rows($sql_result);

            $number_of_pages = ceil($number_of_results/$results_per_page);

            if(!isset($_GET['page']))
            {
                $page = 1;
            }
            else 
            {
                $page = $_GET['page'];
            }

            $this_page_first_result = ($page-1) * $results_per_page;

            // $sql = "SELECT * FROM movie LIMIT " . $this_page_first_result . ',' . $results_per_page;
            $sql = "SELECT * FROM movie WHERE movie_name LIKE '%$get_search_string%' LIMIT " . $this_page_first_result . ',' . $results_per_page;
            $result = mysqli_query($connection, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-2">
                    <a class="text-secondary" href="<?php echo $base_url?>movie_details.php?id=<?php echo $row['id'];?>">
                        <div class="card">
                            
                            <img src="<?php echo $base_url?>images/<?php echo $row['img'];?>" alt="<?php echo $row['movie_name']?>" height="200">
                            
                            <div class="img_container">
                                <h5 class="mt-2" style="font-family: 'Saira Condensed', sans-serif;"><b><?php echo $row['movie_name']?></b></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>

            </div><!--row-->
            </div><!--Container-->


            <div class="container mt-5">
                <ul class="pagination justify-content-center">
                <?php
                if($page == 1){
                ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                <?php
                }
                else
                {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $base_url?>search.php?search=<?php echo $get_search_string?>&page=<?php echo $page-1?>">Previous</a>
                    </li>
                <?php
                }
                ?>
                    <?php
                    for ($page=1; $page <= $number_of_pages ; $page++)
                    {
                    ?> 
                        <li class="page-item"><a class="page-link" href="<?php echo $base_url?>search.php?search=<?php echo $get_search_string?>&page=<?php echo $page?>"><?php echo $page?></a></li>    
                    <?php
                    }
                    $last_page = $page;
                    if(isset($_GET['page']))
                    {
                        $page = $_GET['page'];
                    ?>
                    <?php
                        if($page == $last_page-1)
                        {
                    ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="<?php echo $base_url?>search.php?search=<?php echo $get_search_string?>&page=<?php echo $page?>">Next</a>
                            </li>
                    <?php
                        }
                        else
                        {
                    ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $base_url?>search.php?search=<?php echo $get_search_string?>&page=<?php echo $page+1?>">Next</a>
                            </li>
                    <?php
                        }
                    }
                    else
                    {
                        if($page == 2)
                        {
                    ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="<?php echo $base_url?>search.php?search=<?php echo $get_search_string?>&page=<?php echo $page?>">Next</a>
                            </li>
                    <?php
                        }
                        else
                        {
                            $page = 2;
                    ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $base_url?>search.php?search=<?php echo $get_search_string?>&page=<?php echo $page?>">Next</a>
                            </li> 
                    <?php
                        }
                    ?>
                    <?php
                    }
                    ?> 
                </ul>
            </div>


            <?php
            } //end if
            else
            {
            ?>
                <div class="container text-center">
                <h1 class="text-danger">No Data Found</h1>
                <h3 class="mt-4">Please Enter Correct Movie/WebSeries Name</h3>
                <img src="https://image.flaticon.com/icons/png/512/2748/2748558.png" alt="" width="400">
                </div>
            <?php
            }
            ?>
            

        

    <?php include 'footer.php'?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px')

        // detect scroll top or down
        if ($('.smart-scroll').length > 0)
        { // check if element exists
            var last_scroll_top = 0;
            $(window).on('scroll', function()
            {
                scroll_top = $(this).scrollTop();
                if(scroll_top < last_scroll_top)
                {
                    $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
                }
                else
                {
                    $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
                }
                last_scroll_top = scroll_top;
            });
        }
    });
    </script>
  </body>
</html>