
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<?php 
session_start();
include('vues/navbar.php');
if(isset($donnees["errorMsg"])){
    echo "<h3 class='alert'>".$donnees["errorMsg"]."</h3>";
}
?>
 <form action="index.php?commande=createArticle" class="create-article-form" method="POST">
   <div class="create-article-input">
    <label for="titre" class="article-title-label">Titre</label>
    <input type="text" name="titre" />
   </div>
    <div class="create-article-input">
    <label for="texte" class="article-title-input">Texte</label>
    <textarea name="texte"></textarea>
    </div>
    <button class="btn" type="submit">Créer un article</button>
 </form>
</body>

</html>