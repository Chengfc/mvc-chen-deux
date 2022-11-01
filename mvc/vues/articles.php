
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
<h1>Articles</h1>
<div class="searchform">
<form action="index.php?commande=search" method="POST">
    <input type="text" name="word" />
    <button class='btn-search' type="submit">Recherche</button>
</form>
</div>
<?php
        if(is_null($_POST['word'])){
        while($article = mysqli_fetch_assoc($donnees["articles"])){ ?>
            <article>
            <h1><a href="index.php?commande=showArticle&idArticle=<?php echo $article['id']; ?>" ><?php echo htmlspecialchars($article['titre'],ENT_QUOTES,'utf-8'); ?></a></h1>
            
            <p>
                <?php echo htmlspecialchars($article['texte'],ENT_QUOTES,'utf-8'); ?>
            </p>
            <a href='index.php?commande=showArticle&idArticle=<?php echo $article['id'];  ?>'>Lire</a>
            <?php if($article['idAuteur'] == $_SESSION['usager']['id']) { ?>
                    <a href='index.php?commande=updateArticlePage&idArticle=<?php echo $article["id"]; ?> '>Modifier</a>
                    <a href='index.php?commande=deleteArticle&idArticle=<?php echo $article["id"]; ?>'>Supprimer</a>
            <?php } ?>
        </article>
   <?php }
   }else{ 
        while($article = mysqli_fetch_assoc($donnees["searched_articles"])){ ?>
         <article>
            <h1><a href="index.php?commande=showArticle&idArticle=<?php echo $article['id']; ?>" ><?php echo htmlspecialchars($article['titre'],ENT_QUOTES,'utf-8'); ?></a></h1>
            
            <p>
            <?php echo htmlspecialchars($article['texte'],ENT_QUOTES,'utf-8'); ?>
            </p>
            <a href='index.php?commande=showArticle&idArticle=<?php echo $article['id'];  ?>'>Lire</a>
            <?php if($article['idAuteur'] == $_SESSION['usager']['id']) { ?>
                    <a href='index.php?commande=updateArticlePage&idArticle=<?php echo $article["id"]; ?>'>Modifier</a>
                    <a href='index.php?commande=deleteArticle&idArticle=<?php echo $article["id"]; ?>'>Supprimer</a>
            <?php } ?>
        </article>
        
   <?php }} ?>
          
</body>
</html>