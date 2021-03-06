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
    <?php
        $id = $_GET['id'];
        $movie_sql = "SELECT * FROM movie WHERE id=$id";
        $movie_query = mysqli_query($connection, $movie_sql);
        $movie_info = mysqli_fetch_assoc($movie_query);
    ?>
    <title><?php echo $movie_info['movie_name'] ?> | HDMovies.com</title>
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

            <div class="container">

                <h4 class="text-warning text-center mt-5 mb-4"><i>Click on the download link below…</i></h4>
                <?php
                if($movie_info['video_type'] == 'movie')
                {
                ?>
                <div class="text-center mb-4"><a class="btn btn-lg btn-success border border-secondary" href="<?php echo $base_url?>movies/<?php echo $movie_info['video_origin'] ?>/<?php echo $movie_info['movie_name'] ?>/<?php echo $movie_info['video'] ?>" download>Local Server</a></div>
                <?php
                }
                else
                {
                    $weblinks = $movie_info['video'];
                    $weblinks_array = explode(",", $weblinks);
                    $len = count($weblinks_array);
                    $i=1;
                    foreach($weblinks_array as $seperate_links)
                    {
                        $new_seperate_links = substr($seperate_links, 0, -4);
                ?>
                        <div class="text-center">
                            <a class="btn btn-dark mb-3" href="<?php echo $base_url?>movies/<?php echo $movie_info['video_origin'] ?>/<?php echo $movie_info['movie_name'] ?>/<?php echo $seperate_links?>" download><?php echo "Episode ".$i." ".$new_seperate_links ?></a>
                        </div>
                <?php
                        $i++;
                    }
                }
                ?>
            
            </div>


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