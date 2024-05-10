<?php
include 'connexion.php';
$link=connect("localhost","root","","ecole");
/*if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";*/

function Ajouter ($cne,$nom,$prenom,$groupe)
{
    global $link;
    $req="insert into eleve (cne,nom,prenom,groupe)values('$cne','$nom','$prenom','$groupe')";
    mysqli_query($link,$req);

}
function lister()
{
    global $link;
    $req="select * from eleve";
    return mysqli_query($link,$req);
}
function chercher ($cne)
{
global $link;
//SELECT a.cne , e.nom , e.prenom , a.nbr from eleve e ,absence a WHERE a.cne=e.cne AND a.semaine=2 ORDER BY a.nbr
$req = "select semaine ,nbr from absence  where cne='$cne'";
 return mysqli_query($link, $req);
}
function sel ($cne,$semaine)
{
global $link;
//SELECT a.cne , e.nom , e.prenom , a.nbr from eleve e ,absence a WHERE a.cne=e.cne AND a.semaine=2 ORDER BY a.nbr
$req = "select SUM(nbr) FROM absence WHERE  cne='$cne' and semaine='$semaine'";
 return mysqli_query($link, $req);
}
function Rechecher($cne)
{
global $link;
$req = "select * from eleve  where cne='$cne'";
 return mysqli_query($link, $req);
}

function Modifier($cne,$nom,$prenom,$groupe)
{
global $link;
$req = "update eleve set nom='$nom',prenom='$prenom',groupe='$groupe' where cne='$cne'";
 mysqli_query($link, $req);
}

function Supprimer($cne)
{
global $link;
$req = "delete from eleve  where cne='$cne'";
 mysqli_query($link, $req);
}
function delete($cne)
{
global $link;
$req = "delete from absence  where cne='$cne'";
 mysqli_query($link, $req);
}
function Rechecherab($id)
{
    global $link;
    $req = "select * from absence  where id='$id'";
     return mysqli_query($link, $req);
    }
?>