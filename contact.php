<?php
require('connec.php');
$pdo = new PDO(DSN, USER, PASS);
$errors = [];

if (!empty($_POST)) {
    if (isset($_POST['name']) && strlen($_POST['name']) >= 50) {
        $errors[] = 'Erreur sur le nom';
    }
    if (isset($_POST['price']) && $_POST['price'] <= 0) {
        $errors[] = 'Erreur sur le prix';
    }
    if (isset($_POST['email']) && empty($_POST['email'])) {
        $errors[] = "Erreur sur l'email";
    }
    $name = $_POST['name'];
    $price = $_POST['price'];
    $email = $_POST['email'];

    if (empty($errors)) {
        $query = 'INSERT INTO ad (name, price, email) VALUES (:name, :price, :email)';
        $statement = $pdo->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price, PDO::PARAM_INT);
        $statement->bindValue(':email', $email);

        $statement->execute();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Contact</title>
    </head>
    <body>
        <?php
            include('_nav.php');
        ?>
        <div class="container-sm m-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <?php
                         var_dump($errors);
                        ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titre</label>
                            <input type="text" name="name" required class="form-control" id="exampleInputEmail1"">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" required id="exampleInputEmail1"">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prix</label>
                            <input type="number" name="price" class="form-control" id="exampleInputPassword1" min="0">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>