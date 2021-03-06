<?php
    session_start();
    include 'connection.php';
    if(empty($_SESSION['superadmin_name']))
    {
        header("Location:superadmin.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet "href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/3039/3039386.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title>HDMovies.com</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light border border-secondary" style="background-color: #fff;">
    <span class="navbar-brand mb-0 h1" style="font-family: 'Lemonada', cursive;"><img src="https://image.flaticon.com/icons/svg/3039/3039386.svg" alt="" width="30" height="30"> HDMovies.com</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: 'Exo 2', sans-serif;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $base_url?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#addmoviemodal">Add Movie</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $base_url?>alogout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Add Movie Modal -->
    <div class="modal fade" id="addmoviemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label for="movie_id">Movie ID:</label>
                <input type="text" name="movie_id" id="movie_id" class="form-control" placeholder="Movie ID" required>
            </div>
            <div class="form-group">
                <label for="movie_name">Movie Name:</label>
                <input type="text" name="movie_name" id="movie_name" class="form-control" placeholder="Movie Name" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" class="form-control" placeholder="Genre" required>
            </div>
            <div class="form-group">
                <label for="video_type">Video Type:</label>
                <select name="video_type" id="video_type" class="form-control" required>
                    <option value="">Select Video Type</option>
                    <option value="movie">Movie</option>
                    <option value="web series">Web Series</option>
                </select>
            </div>
            <div class="form-group" id="div_video">
                <label for="video">Video:</label>
                <!-- <input type="text" name="video" id="video" class="form-control" placeholder="Video (If Multiple Videos then Seperate by ',(comma)' "> -->
                <textarea name="video" id="video" class="form-control" cols="30" rows="10" placeholder="Video (If Multiple Videos then Seperate by ',(comma)' "></textarea>
            </div>
            <div class="form-group">
                <label for="video_origin">Video Origin:</label>
                <select name="video_origin" id="video_origin" class="form-control" required>
                    <option value="">Select Video Origin</option>
                    <option value="bollywood">Bollywood</option>
                    <option value="hollywood">Hollywood</option>
                    <option value="South Indian">South Indian</option>
                </select>
            </div>
            <div class="form-group">
                <label for="folder">Folder:</label>
                <input type="text" name="folder" id="folder" class="form-control" placeholder="Folder" required>
            </div>
            <div class="form-group">
                <label for="movie_image">Movie Image:</label>
                <input type="file" name="movie_image" id="movie_image" class="form-control" required>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_movie" class="btn btn-primary">Add Movie</button>
        </div>
        </form>
        </div>
    </div>
    </div>


    <!--Edit Movie Modal -->
    <div class="modal fade" id="editmoviemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Movie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label for="edit_movie_id">Movie ID:</label>
                <input type="text" name="movie_id" id="edit_movie_id" class="form-control" placeholder="Movie ID" required>
            </div>
            <div class="form-group">
                <label for="edit_movie_name">Movie Name:</label>
                <input type="text" name="movie_name" id="edit_movie_name" class="form-control" placeholder="Movie Name" required>
            </div>
            <div class="form-group">
                <label for="edit_genre">Genre:</label>
                <input type="text" name="genre" id="edit_genre" class="form-control" placeholder="Genre" required>
            </div>
            <div class="form-group">
                <label for="edit_video_type">Video Type:</label>
                <select name="video_type" id="edit_video_type" class="form-control" required>
                    <option value="">Select Video Type</option>
                    <option value="movie">Movie</option>
                    <option value="web series">Web Series</option>
                </select>
            </div>
            <div class="form-group" id="edit_div_video">
                <label for="edit_video">Video:</label>
                <!-- <input type="text" name="video" id="edit_video" class="form-control" placeholder="Video (If Multiple Videos then Seperate by ',(comma)' "> -->
                <textarea name="video" id="edit_video" class="form-control" cols="30" rows="10" placeholder="Video (If Multiple Videos then Seperate by ',(comma)' "></textarea>
            </div>
            <div class="form-group">
                <label for="edit_video_origin">Video Origin:</label>
                <select name="video_origin" id="edit_video_origin" class="form-control" required>
                    <option value="">Select Video Origin</option>
                    <option value="bollywood">Bollywood</option>
                    <option value="hollywood">Hollywood</option>
                    <option value="South Indian">South Indian</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit_folder">Folder:</label>
                <input type="text" name="folder" id="edit_folder" class="form-control" placeholder="Folder" required>
            </div>
            <div class="form-group">
                <label for="edit_movie_image">Movie Image:</label>
                <input type="file" name="movie_image" id="edit_movie_image" class="form-control" required>
            </div>
            <input type="hidden" name="id" id="edit_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit_movie" class="btn btn-info">Edit Movie</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!--Delete Movie Modal -->
    <div class="modal fade" id="deletemoviemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Movie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            Do you want to Delete this movie?
                        <input type="hidden" name="id" id="delete_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="delete_movie" class="btn btn-info">Delete Movie</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Add Movie -->
    <?php
        if(isset($_POST['add_movie']))
        {
            $movie_id = $_POST['movie_id'];
            $movie_name = $_POST['movie_name'];
            $genre = $_POST['genre'];
            $video = $_POST['video'];
            $video_origin = $_POST['video_origin'];
            $video_type = $_POST['video_type'];
            $folder = $_POST['folder'];
            // $movie_image = $_POST['movie_image'];

            //Movie Image
            $movie_image = $_FILES['movie_image'];
			$movie_image_filename = $movie_image['name'];
			$movie_image_fileerror = $movie_image['error'];
			$movie_image_filetmp = $movie_image['tmp_name'];

			$t=time();
			$d = date("Y-m-d",$t);
			$td = $t.$d;

			$movie_image_filename1 = $td."_".$movie_image_filename;

			$movie_image_fileext = explode(".", $movie_image_filename1);
			$movie_image_filecheck = strtolower(end($movie_image_fileext));

			$movie_image_fileextstored = array('png','jpg','jpeg');

			if(in_array($movie_image_filecheck, $movie_image_fileextstored));
			{
				$movie_image_destinationfile = 'images/'.$movie_image_filename1;
				move_uploaded_file($movie_image_filetmp, $movie_image_destinationfile);
				$movie_image_img = $movie_image_filename1;
			}

            $insert_movie_data = "INSERT INTO movie (movie_id, movie_name, genre, video, video_origin, img, video_type, folder) VALUES ('$movie_id','$movie_name','$genre','$video','$video_origin','$movie_image_img','$video_type','$folder')";
            $insert_result = mysqli_query($connection, $insert_movie_data);
            // print_r($insert_result);
            if($insert_result == '1')
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Movie Added Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            else
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Add Movie</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }
    ?>
    <!-- Edit Movie -->
    <?php
        if(isset($_POST['edit_movie']))
        {
            $id = $_POST['id'];
            $movie_id = $_POST['movie_id'];
            $movie_name = $_POST['movie_name'];
            $genre = $_POST['genre'];
            $video = $_POST['video'];
            $video_origin = $_POST['video_origin'];
            $video_type = $_POST['video_type'];
            $folder = $_POST['folder'];

            //Edit Movie Image
            $movie_image = $_FILES['movie_image'];
			$movie_image_filename = $movie_image['name'];
			$movie_image_fileerror = $movie_image['error'];
			$movie_image_filetmp = $movie_image['tmp_name'];

			$t=time();
			$d = date("Y-m-d",$t);
			$td = $t.$d;

			$movie_image_filename1 = $td."_".$movie_image_filename;

			$movie_image_fileext = explode(".", $movie_image_filename1);
			$movie_image_filecheck = strtolower(end($movie_image_fileext));

			$movie_image_fileextstored = array('png','jpg','jpeg');

			if(in_array($movie_image_filecheck, $movie_image_fileextstored));
			{
                $movie_image_destinationfile = 'images/'.$movie_image_filename1;
                $q = "SELECT img FROM movie WHERE id='$id'";
                $res = mysqli_query($connection,$q);
                $r = mysqli_fetch_array($res);
                $old_movie_image = $r['img'];
                unlink('images/'.$old_movie_image);
				move_uploaded_file($movie_image_filetmp, $movie_image_destinationfile);
				$movie_image_img = $movie_image_filename1;
			}

            $update_movie_data = "UPDATE movie SET movie_id='$movie_id', movie_name='$movie_name', img='$movie_image_img', genre='$genre', video='$video', video_origin='$video_origin', video_type='$video_type', folder='$folder' WHERE id='$id'";
            
            $update_result = mysqli_query($connection, $update_movie_data);
            // print_r($update_result);
            // exit();
            if($update_result == '1')
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Movie Updated Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            else
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Update Movie</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }
    ?>
    <!-- Delete Movie -->
    <?php
        if(isset($_POST['delete_movie']))
        {
            $id = $_POST['id'];
            $q = "SELECT img FROM movie WHERE id='$id'";
            $res = mysqli_query($connection,$q);
            $r = mysqli_fetch_array($res);
            $old_movie_image = $r['img'];
            unlink('images/'.$old_movie_image);
            $delete_query = "DELETE FROM movie WHERE id='$id'";
            $delete_movie = mysqli_query($connection,$delete_query);
            if($delete_movie == '1')
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Movie Deleted Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            else
            {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Delete Movie</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }
    ?>
    <h1 class="text-center mt-2" style="font-family: 'Exo 2', sans-serif;"><u>Movie List</u></h1>
    <div class="container mt-3">
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center" id="movie_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Movie&nbsp;ID</th>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Image</th>
                    <th>Video&nbsp;Type</th>
                    <!-- <th>Video</th> -->
                    <th>Video&nbsp;Origin</th>
                    <th>Folder</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fetch_movie_data = "SELECT * FROM movie";
                $result_movie_data = mysqli_query($connection, $fetch_movie_data);
                if(mysqli_num_rows($result_movie_data) > 0)
                {
                    while($res = mysqli_fetch_array($result_movie_data))
                    {
                ?>
                <tr>
                    <td class="pt-4"><p><?php echo $res['id']?></p></td>
                    <td class="pt-4"><p><?php echo $res['movie_id']?></p></td>
                    <td><p class="pt-4"><?php echo $res['movie_name']?></p></td>
                    <td><p class="pt-4"><?php echo $res['genre']?></p></td>
                    <td><img src="<?php echo $base_url?>images/<?php echo $res['img'] ?>" alt="movie_image" width="50"></td>

                    <td><p class="pt-4"><?php echo $res['video_type']?></p></td>
                    <!-- <td><p class="pt-4"><?php echo $res['video']?></p></td> -->
                    <td><p class="pt-4"><?php echo $res['video_origin']?></p></td>
                    <td><p class="pt-4"><?php echo $res['folder']?></p></td>

                    <td class="pt-4">
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#editmoviemodal" data-id="<?php echo $res['id'] ?>" data-movie_id="<?php echo $res['movie_id']?>" data-movie_name="<?php echo $res['movie_name']?>" data-genre="<?php echo $res['genre']?>" data-video="<?php echo $res['video']?>" data-video_origin="<?php echo $res['video_origin']?>" data-video_type="<?php echo $res['video_type']?>" data-folder="<?php echo $res['folder']?>" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                    </td>
                    
                    <td class="pt-4">
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deletemoviemodal" data-id="<?php echo $res['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php
                    }
                }
                else
                {
                ?>
                    <tr>
                        <td colspan="9"><?php echo 'No Data Available'?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editmoviemodal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var movie_id = button.data('movie_id')
            var movie_name = button.data('movie_name')
            var genre = button.data('genre')
            var video = button.data('video')
            var video_origin = button.data('video_origin')
            var video_type = button.data('video_type')
            var folder = button.data('folder')
            
            // if(video == '')
            // {
            //     $('#edit_div_video').hide();
            // }
            // else
            // {
            //     $('#edit_div_video').show();
            // }
           
            var modal = $(this)
            modal.find('.modal-body #edit_id').val(id)
            modal.find('.modal-body #edit_movie_id').val(movie_id)
            modal.find('.modal-body #edit_movie_name').val(movie_name)
            modal.find('.modal-body #edit_genre').val(genre)
            modal.find('.modal-body #edit_video').val(video)
            modal.find('.modal-body #edit_video_origin').val(video_origin)
            modal.find('.modal-body #edit_video_type').val(video_type)
            modal.find('.modal-body #edit_folder').val(folder)
            })

            $('#deletemoviemodal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
           
            var modal = $(this)
            modal.find('.modal-body #delete_id').val(id)
            })

            $('#movie_table').DataTable();

            // $('#div_video').hide();
            // $('#video_type').change(function(){
			// 	var video_type = $(this).val();
			// 	if(video_type == 'movie')
			// 	{
			// 		$('#div_video').show();
			// 	}
			// 	else
			// 	{
			// 		$('#div_video').hide();
			// 	}
				// alert(place);
				// alert("The text has been changed.");
			// });
        });
    </script>
  </body>
</html>