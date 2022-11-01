<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/styles.css" />
        <meta charset="utf-8" />
    </head>
    <body>
    <?php 
session_start();
include('vues/navbar.php');
if(isset($donnees["errorMsg"])){
    echo "<h3 class='alert'>".$donnees["errorMsg"]."</h3>";
}
?>
<form class="update-article-form" action="index.php?commande=updateArticle&idArticle=<?php echo $_REQUEST['idArticle'] ?>" method="POST">
<div class="update-article-input">
   <label for="titre" class="update-title-label">Titre</label>
    <input type="text" name="titre" />
   </div>
    <div class="update-article-input">
    <label for="texte" class="update-title-input">Texte</label>
    <textarea name="texte"></textarea>
    </div>
    <button class="btn" type="submit">Modifier</button>
</form>
</body>
</html>