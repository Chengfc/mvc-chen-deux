<?php
//define("SERVER", "localhost");
//define("USERNAME", "root");
//define("PASSWORD", "root");
//define("DBNAME", "blog");

define("SERVER", "localhost");
define("USERNAME", "e2295521");
define("PASSWORD", "sgHIjyFolRmNg9CQLIXO");
define("DBNAME", "e2295521");
function connectDB()
{
    $db = mysqli_connect(SERVER,USERNAME,PASSWORD,DBNAME);
    if(!$db){
        die ("Erreur de connexion. MySQLI : ".mysqli_connect_error());
    }
    mysqli_query($db,"SET NAMES 'utf-8' ");
    return $db;
}

$dbConnc = connectDB();
function user_login($username,$password){
    global $dbConnc;
    $crypted_password = md5($password);
    $requete = "SELECT * FROM usagers where username='$username' and password='$crypted_password'";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function articles(){
    global $dbConnc;
    $requete = "SELECT * FROM articles ORDER BY ID DESC";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function showArticle($id){
    global $dbConnc;
    $requete = "SELECT * FROM articles where id=$id";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function deleteArticle($id){
    global $dbConnc;
    $requete = "DELETE FROM articles WHERE id=$id";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function updateArticle($id,$titre,$texte){
    global $dbConnc;
    $requete = "UPDATE articles SET titre='$titre' , texte='$texte' WHERE id = $id";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function createArticle($idAuteur,$titre,$texte){
    global $dbConnc;
    $requete = "INSERT INTO articles (idAuteur,titre,texte) VALUES ($idAuteur,'$titre','$texte')";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function search_articles($word){
    global $dbConnc;
    $requete = "SELECT * FROM articles where texte like '%$word%' or titre like '%$word%'";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}
function register($firstname,$lastname,$username,$password){
    global $dbConnc;
    $requete = "INSERT INTO usagers (prenom,nom,username,password) VALUES ('$firstname','$lastname','$username',md5('$password'))";
    $resultat = mysqli_query($dbConnc,$requete);
    return $resultat;
}