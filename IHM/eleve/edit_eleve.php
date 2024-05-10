<?php 
include_once '../../Acces_BD/eleve.php';
$res=Rechecher($_GET['id']);
$E = mysqli_fetch_array($res);
?>

<center>
    <form action="/TP/TP/gestion-ecole/Traitement/eleve.php?action=modifier&id=<?= $E[0] ?>" method="post">
        <table>
            <tr>
                <td>CNE</td>
                
                <td><?= $E[0] ?></td>
            </tr>
           
            <tr>
                <td>NOM</td>
                <td><input type="text" name="nom" value="<?= $E[1] ?>"></td>
            </tr>
            <tr>
                <td>PRENOM</td>
                <td><input type="text" name="prenom" value="<?= $E[2] ?>"></td>
            </tr>
            <tr>
                <td>Groupe</td>
                <td><input type="text" name="groupe" value="<?= $E[3] ?>"></td>
            </tr>
           
                <td><input type="submit" value="Modifier"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
    </form>

</center>