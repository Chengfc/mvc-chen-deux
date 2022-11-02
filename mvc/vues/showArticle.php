<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/styles.css" />
        <meta charset="utf-8" />
    </head>
<body>
<?php 

    include('vues/navbar.php');
    if(isset($donnees["errorMsg"])){
        echo "<h3 class='alert'>".$donnees["errorMsg"]."</h3>";
    }
    while($article = mysqli_fetch_assoc($donnees["article"])){
        echo "<h1>".htmlspecialchars($article['titre'],ENT_QUOTES,'utf-8')."</h1>";
        echo "<p>".htmlspecialchars($article['texte'],ENT_QUOTES,'utf-8')."</p>";
    }
?>
</body>
</html>