

<html>
    <head>
        <title>Blog TP2</title>
        <link rel="stylesheet" href="css/styles.css"/>
        <meta charset="utf-8" />
    </head>
   <body>
    <?php
     //inclure nav et ensuite session
     include("vues/navbar.php");
    ?>
    <?php if(isset($_SESSION['usager'])){ ?>
        <h1 class="message">Salut <?php echo $_SESSION['usager']['prenom'].' '.$_SESSION['usager']['nom']; ?></h1>
    <?php }else{ ?>
        <h1 class="message">Bonjour et connectez vous pour écrire vos articles</h1>
        <?php } ?>

   </body>
</html>
