<nav>
    
    <ul class="main-nav">
    <?php 
        // menu navbar navigation
        echo "<li><a href='index.php'> Accueil</a></li>";
        echo '<li><a href="index.php?commande=Articles">Articles</a></li>';
 
   
    if(isset($_SESSION['usager'])){
        echo '<li><a href="index.php?commande=createArticlePage">Créer article</a></li>';
        echo '<li><a href="index.php?commande=Logout">Déconnexion</a></li>';
    }else{
        echo '<li><a href="index.php?commande=Login">Connexion</a></li>';
        echo '<li><a href="index.php?commande=RegisterPage">Inscrire</a></li>';
    }
    ?>
    </ul>

</nav>