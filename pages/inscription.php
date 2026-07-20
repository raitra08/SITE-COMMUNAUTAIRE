<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE INSCRIPTION</title>
</head>
<body>
    <h3>Bienvenue, veuillez remplir ces champs si vous voulez vous inscrire:</h3>
    <form action="inscription_traitement.php" method="POST" enctype="multipart/form-data">
    
        <label>Nom :</label>
        <input type="text" name="nom" required>
    
        <br><br>
    
        <label>Image profil :</label>
        <input type="file" name="image">
    
        <br><br>
    
        <button type="submit">
            Valider
        </button>
    
    </form>
</body>
</html>