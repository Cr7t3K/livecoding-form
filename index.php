<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Index</title>
    </head>
    <body>
        <?php
            include('_nav.php');
            require('connec.php');

            $pdo = new PDO(DSN, USER, PASS);
            $query = "SELECT * FROM ad";

            $statement = $pdo->query($query);
            $ads = $statement->fetchAll(PDO::FETCH_CLASS);
        ?>

        <div class="container mt-5 d-flex flex-wrap justify-content-around">

            <?php foreach ($ads as $ad): ?>
                <div class="card m-4" style="width: 250px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $ad->name ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $ad->email ?></h6>
                        <p class="card-text"><?= $ad->price ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </body>
</html>