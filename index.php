<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Book List</title>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
                <h1>Book List</h1>
                <div>
                    <a href="create.php" class="btn btn-primary">Add New Book</a>
                </div>
        </header>
        <?php 
            session_start();
            if(isset($_SESSION["edit"])){
                ?> 
                        <div class="alert alert_success">
                        <?php 
                            echo $_SESSION["edit"];
                            unset($_SESSION["edit"]);
                        ?>
                    </div>
                <?php
            }
        ?>
        <?php 
                if(isset($_SESSION["delete"])){
                ?> 
                    <div class="alert alert_success">
                        <?php 
                            echo $_SESSION["delete"];
                            unset($_SESSION["delete"]);
                        ?>
                    </div>
                <?php
            }
        ?>
        <table class="table table-bordered" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("connect.php");
                    $sql = "SELECT * FROM books";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo $row["author"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                
                                <td>
                                    <a href="view.php ?id=<?php echo $row["id"]; ?>" class="btn btn-info" >Read More</a>
                                    <a href="edit.php ?id=<?php echo $row["id"]; ?>" class="btn btn-warning" >Edit</a>
                                    <a href="delete.php ?id=<?php echo $row["id"]; ?>" class="btn btn-danger" >Dalete</a>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>