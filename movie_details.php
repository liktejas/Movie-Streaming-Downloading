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
        

        <div class="container border border-secondary">
            
            <h1 class="display-3 text-center mb-4"><?php echo $movie_info['movie_name'] ?></h1>
            <img class="rounded mx-auto d-block img-thumbnail mb-3" src="<?php echo $base_url?>images/<?php echo $movie_info['img'] ?>" alt="">
            <h4 class="text-center mb-3">Download <?php echo $movie_info['video_type'] ?> <?php echo $movie_info['movie_name'] ?> – HDMoviesHub</h4>
            <h4 class="text-center text-danger mb-4">---:Movie Information:---</h4>
            <h5 class="text-center mb-4">Name: <b><?php echo $movie_info['movie_name'] ?></b></h5>
            <h5 class="text-center mb-4">Genre: <b><?php echo $movie_info['genre'] ?></b></h5>
            <h5 class="text-center mb-4">Type: <b><?php echo $movie_info['video_type'] ?></b></h5>
            <h5 class="text-center mb-4">Category: <b><?php echo $movie_info['video_origin'] ?></b></h5>
            <h5 class="text-center mb-4 text-success"><?php echo $movie_info['movie_name'] ?> <?php echo $movie_info['video_type'] ?> Download</h5>
            <div class="text-center"><a class="btn btn-lg btn-dark mb-3" href="<?php echo $base_url?>download.php?id=<?php echo $movie_info['id']?>">📥 Download 📥</a></div>
            <div class="text-center"><a class="btn btn-lg btn-warning mb-3" href="<?php echo $base_url?>watch.php?id=<?php echo $movie_info['id']?>">📺 Watch Online 📺</a></div>
            <h3 class="text-center mb-4">Wrapping Up ❤️</h3>
            <h5 class="text-center">Thanks for visiting <span class="text-info"><b>HDMovies.com</b></span> the zone for <span class="text-primary">HD Movies</span> & <span class="text-primary">WebSeries</span>.</h5>
            <h5 class="text-center">Kindly comment down for requesting any movie or series we love to upload it for you. Enjoy!</h5>
            <br>
            <hr style="background: black;">
            <?php
            if(isset($_POST['submit_comment']))
            {
                $name = $_POST['name'];
                $comment = $_POST['comment'];

                $insert_comment_sql = "INSERT INTO comments (movie_id, name, comment) VALUES ($id, '$name', '$comment')";
                // print_r($insert_comment_sql);
                // exit();
                $insert_comment = mysqli_query($connection, $insert_comment_sql);
                if($insert_comment == '1')
                {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Comment Posted!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
                else
                {
            ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed to Post Comment</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }//if-else
            }//isset
            
            ?>
            
            <form action="" method="post" class="mb-4">
                
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h3 class="text-danger">---:Leave a Comment:---</h3>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name" required>
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" rows="5" class="form-control mb-2" placeholder="Write your Comment Here..." required></textarea>
                        <input type="submit" name="submit_comment" value="Post Comment" class="btn btn-success">
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </form>
            

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-11 mb-3">
                    <h3 class="text-danger mb-3">---:Comments:---</h3>
                    <?php
                    $fetch_comments_sql = "SELECT * FROM comments WHERE movie_id=$id";
                    $fetch_comments = mysqli_query($connection, $fetch_comments_sql);
                    if($fetch_comments->num_rows > 0)
                    {
                        while($row = mysqli_fetch_assoc($fetch_comments))
                        {
                            $name_initial = $row['name'][0];
                    ?>
                            <img src="static/thumbnails/<?php echo $name_initial?>.png" alt="" width="40" ><b><?php echo $row['name']?></b><br>
                            <p>&emsp;&emsp;<?php echo $row['comment']?></p>
                    <?php
                        }
                    ?>
                    
                    <?php
                    }
                    else
                    {
                    ?>
                        <h4 class="text-warning">No Post Until Now</h4>
                    <?php
                    }
                    ?>
                    <p></p>
                </div>
                
            </div>

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

    
    