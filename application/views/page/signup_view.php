<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>registre</title>
</head>
<body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <div class="container">
        <form style="width :40%; margin:auto;" method="POST" action="">
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="name" name="nom" value="<?php echo set_value('nom'); ?>" placeholder="Votre nom">
            </div>    
            <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo set_value('prenom'); ?>" placeholder="Votre prenom">
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Votre email">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Votre mot de Passe">
            </div>            
            <button type="submit" class="btn btn-primary" >S'enregistrer</button>
        </form>
    </div>
</body>
</html>

















