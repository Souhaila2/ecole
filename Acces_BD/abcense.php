<?php
include 'connexion.php';
$link=connect("localhost","root","","ecole");
/*if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";*/

function Ajouter ($cne,$semaine,$nbr)
{
    global $link;
    $req="insert into absence (cne,semaine,nbr)values('$cne','$semaine','$nbr')";
    mysqli_query($link,$req);
}

function lister()
{
    global $link;
    $req="select * from absence";
    return mysqli_query($link,$req);
}

function Rechecher($id)
{
global $link;
$req = "select * from absence  where id='$id'";
 return mysqli_query($link, $req);
}
function search($semaine)
{
global $link;
//SELECT a.cne , e.nom , e.prenom , a.nbr from eleve e ,absence a WHERE a.cne=e.cne AND a.semaine=2 ORDER BY a.nbr
$req = "select a.cne , e.nom , e.prenom , a.nbr from eleve e ,absence a where a.cne=e.cne and semaine='$semaine' order by nbr";
 return mysqli_query($link, $req);
}

function chercher ($cne)
{
global $link;
//SELECT a.cne , e.nom , e.prenom , a.nbr from eleve e ,absence a WHERE a.cne=e.cne AND a.semaine=2 ORDER BY a.nbr
$req = "select semaine ,nbr from absence  where cne='$cne'";
 return mysqli_query($link, $req);
}

function Modifier($id,$nbr)
{
global $link;
$req = "update absence set nbr='$nbr' where id='$id'";
 mysqli_query($link, $req);
}

function Supprimer($id)
{
global $link;
$req = "delete from absence  where id='$id'";
 mysqli_query($link, $req);
}

?>