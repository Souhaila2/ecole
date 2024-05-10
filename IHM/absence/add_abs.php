<?php
include_once '../../Acces_BD/eleve.php';
$result=lister();
?>
<?php 
$E=array("","","","");
$action="ajouter";
$ac= "Ajouter";

if(isset($_GET['id']))
{
$res=Rechecherab($_GET['id']);
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
    <form method="post" action="/TP/TP/gestion-ecolev/Traitement/abcense.php?action=<?=$action?>">
        <center>
            <h2>Ajouter une absence</h2>
        <table>
            
        <tr>
            <input type="hidden" name="id" value="<?= $E[0] ?>">
            
                <td>CNE :</td>
                <?php 
                
                if(isset($_GET['id']))
                {
                   ?> <td><label name="cne"><?= $E[2] ?></label></td>
                   
                   <?php
                }else
                {
?>
                <td><select name="cne">
                    <?php

                    while($e=mysqli_fetch_assoc($result))
                    //echo $e['id_visiteur'];
                    {?>
                    <option><?=$e['cne'] ?></option>
                    <?php  }
        ?>
                </select></td>
                <?php } ?>
            </tr>
        <tr>
            
                <td>Semaine :</td>
                <?php 
                
                if(isset($_GET['id']))
                {
                   ?> <td><label name="semaine"><?= $E[1] ?></label></td>
                   
                   <?php
                }else
                {
?>
                <td><input type="text" name="semaine"></td>
                <?php } ?>
            </tr>
            <tr>
                <td>Nombre d'absences :</td>
                <td><input type="text" name="nbr" value="<?= $E[3] ?>"></td>
               
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