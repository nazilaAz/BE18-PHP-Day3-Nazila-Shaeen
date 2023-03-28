<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals</title>
    <link rel="stylesheet" href="components/Css/style.css">
    <?php include "components/boot.php"; ?>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand txtFont" href="index.php">Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">Our meals</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form class="form-group" action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3 pt-2">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="desc" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="desc" rows="3" name="desciption"></textarea>
                </div>
            </div>
            <div class="row mb-3 pb-3">
                <label for="image" class="form-label">Upload Picture</label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" id="image" name="image">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-info" name="submit">Add to menu</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>