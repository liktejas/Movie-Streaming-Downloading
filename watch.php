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
    <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
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
                
                    
        <?php
            if($movie_info['video_type'] == 'movie')
            {
        ?>
            <div class="row">
                <div class="col-md-1 col-sm-3"></div>
                <div class="col-md-10 col-sm-6">
                <video id="videoPlayer" width="854" height="480" class="video-js vjs-big-play-centered embed-responsive-item mb-5" poster="<?php echo $base_url?>images/<?php echo $movie_info['img']?>" data-setup="{}">
                    <source src="<?php echo $base_url?>movies/<?php echo $movie_info['video_origin'] ?>/<?php echo $movie_info['movie_name'] ?>/<?php echo $movie_info['video'] ?>" type="video/mp4">
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                </div>
                <div class="col-md-1 col-sm-3"></div>
                </div><!--Row-->
            
        <?php
            }
            else
            {
        ?>
                <div class="row">
                    <div class="col-md-9">
        <?php
                $weblinks = $movie_info['video'];
                $weblinks_array = explode(",", $weblinks);
                $len = count($weblinks_array);
                $i=1;
                $video = 0;
                
                if(!isset($_GET['video']))
                {
                    $first_video = $weblinks_array[0];
        ?>
                <video id="videoPlayer" width="840" height="480" class="video-js vjs-big-play-centered" poster="<?php echo $base_url?>images/<?php echo $movie_info['img']?>" data-setup="{}">
                    <source src="<?php echo $base_url?>movies/<?php echo $movie_info['video_origin'] ?>/<?php echo $movie_info['movie_name'] ?>/<?php echo $first_video ?>" type="video/mp4">
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
        <?php
                }
                else
                {
                    $get_video_id = $_GET['video'];
                    $vid_id = $weblinks_array[$get_video_id];
        ?>
                <video id="videoPlayer" width="840" height="480" class="video-js vjs-big-play-centered" poster="<?php echo $base_url?>images/<?php echo $movie_info['img']?>" data-setup="{}">
                    <source src="<?php echo $base_url?>movies/<?php echo $movie_info['video_origin'] ?>/<?php echo $movie_info['movie_name'] ?>/<?php echo $vid_id ?>" type="video/mp4">
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
        <?php
                }
        ?>
                </div><!--Col-md-9-->
                <div class="col-md-3">
        <?php
                foreach($weblinks_array as $seperate_links)
                {
                    $new_seperate_links = substr($seperate_links, 0, -4);
        ?>
                    <div class="text-center mt-3">
                        <a class="mb-3 text-dark" href="<?php echo $base_url?>watch.php?id=<?php echo $id?>&video=<?php echo $video?>"><?php echo "Episode ".$i." ".$new_seperate_links ?></a>
                        <hr>
                    </div>
        <?php
                    $i++;
                    $video++;
                }
            }
        ?>
                </div><!--Col-md-3--->
                </div><!---Row--->
            </div><!---container--->

        <?php include 'footer.php'?>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://vjs.zencdn.net/7.8.3/video.js"></script>
        <script src="https://cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url?>static/js/video-player.js"></script>
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