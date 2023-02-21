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
            $categories = [
                    'Informatique',
                    'Musique',
                    'Auto',
                    'Moto'
            ]
        ?>
        <div class="container-sm m-5">
            <div class="card">
                <div class="card-body">
                    <form action="final.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titre</label>
                            <input type="text" name="title" class="form-control" required id="exampleInputEmail1"">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Catégorie</label>
                            <select class="form-select" aria-label="Default select example" name="category" >
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category ?>">
                                        <?= $category ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" rows="4" cols="50"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prix</label>
                            <input type="number" name="price" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>