<?php
$E=array("","","","");
$action="ajouter";
$ac= "Ajouter";

if(isset($_GET['id']))
{
include_once '../../Acces_BD/eleve.php';
$res=Rechecher($_GET['id']);
$E = mysqli_fetch_array($res);
$action="modifier";
$ac= "Modifier";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/TP/TP/gestion-ecolev/Traitement/eleve.php?action=<?= $action ?>">
        <center>
            <h2><?= $ac ?> un Elève</h2>
        <table>
        <tr>
                <td>CNE :</td>
                <td><input type="text" name="cne" value="<?= $E[0] ?>"></td>
                
            </tr>
        <tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" value="<?= $E[1] ?>"></td>
                
            </tr>
            <tr>
                <td>Prenom :</td>
                <td><input type="text" name="prenom" value="<?= $E[2] ?>"></td>
               
            </tr>
            <tr>
                <td>Groupe</td>
                <td><input type="text" name="groupe" value="<?= $E[3] ?>"></td>
               
            </tr>
            <tr>
                <td><input type="submit" value="<?= $ac ?>"></td>
                <td><input type="reset" value="Annuler"></td>
               
            </tr>
        </table>
</center>
    </form>
</body>
</html>