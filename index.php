<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >
                        <h4>Student Details
                        <a  href="login.php" class="btn btn-primary float-end" style="margin-left: 5px;">logout</a>
                        <a   href="student-create.php" class="btn btn-primary float-end">Add Students</a>
                        </h4>
                        
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Img</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php 


                                            // function Connect(){
                                            //     $conn = mysqli_connect('localhost', 'root', '', 'blog');
                                            //     return $conn;
                                            // }

                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query(Connect(), $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['id']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                <td>
                                                <img src="image/author-1.jpg<?= $student['img']; ?>" width="75px" height="75px">

                                                </td>
                                                <td>
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>