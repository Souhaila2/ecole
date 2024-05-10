<?php
include_once '../../Acces_BD/eleve.php';

$result=lister();
session_start();
?>
<center>
    <h2>Liste des élèves</h2>
    <table border="1" style="width: 600px;border-collapse: collapse;">
        <tr >
        <th>CNE</th>
           
           <th>Nom</th>
           <th>Prenom</th>
           <th>Groupe</th>
           
           <th colspan="3"> <a href="add_eleve.php"><img src="../images/add.jfif" alt="">Ajouter</a> </th>
        </tr>
        
<?php

while($e=mysqli_fetch_assoc($result))
//echo $e['id_visiteur'];
{?>
    <tr>
           <td><?=$e['cne'] ?></td>
           <td><?= $e['nom'] ?></td>
           <td><?= $e['prenom'] ?></td>
           <td><?= $e['groupe'] ?></td>
          
           
           <th><a href="add_eleve.php?id=<?= $e['cne'] ?>"><img src="../images/edit.png" alt=""></a></th>
           <th><a href="/TP/TP/gestion-ecolev/Traitement/eleve.php?action=supprimer&id=<?= $e['cne'] ?>"><img src="../images/supp.png" alt=""></a></th>
           <td><a href="/TP/TP/gestion-ecolev/Traitement/eleve.php?action=absence&id=<?= $e['cne'] ?>">Absences</a></td>
        </tr>

        <?php  }
        ?>

</table><br>
<a href="/TP/TP/gestion-ecolev/index.php"><img src="../images/home.png" alt=""> Retour</a><br><br>
<font>
<?php
        //$cne=$_SESSION['cne'];

       if (isset($_SESSION['abs'])&& $_SESSION['abs']==1)
       {
       
        ?>
    
    <form action="/TP/TP/gestion-ecolev/Traitement/eleve.php?action=select" method="post">

        <label for=""><b> Semaine</label></b>
        <input type="text" name="semaine" >
        <input type="submit" value="Valider">
        <input type="reset" value="Annuler">

    </form>
 <font>
<?php
       }
        //$cne=$_SESSION['cne'];
     
       if (isset($_SESSION['sel'])&& $_SESSION['sel']==1)
       {
        $_SESSION['sel']=0;
      //  echo $_SESSION['nbr'] .$_SESSION['count'];
         $sel=sel($_SESSION['nbr'],$_SESSION['count']);
         $count=0;
        // $e=mysqli_fetch_assoc($sel);
        
         while($e=mysqli_fetch_array($sel))
                 {
                     if($e[0] != null)
                       $count=$e[0];
                     else $count=0;
                }  ?>  
        <div ><p style="border:2px solid; width:40%"><b> Dans la semaine <span style="color:red"><?=$_SESSION['count']?></span> l'élève ayant le CNE <span style="color:red"><?=$_SESSION['nbr']?></span> a <span style="color:red"><?=$count?></span> absences</b></p>
       </div>
        
      <?php
                
    }
  
    else
       echo "";
       ?></font> 
       <?php
       // $_SESSION(['message'])=0;
       if (isset($_SESSION['abs'])&& $_SESSION['abs']==1)
       {
        $_SESSION['abs']=0;
        ?>

    <h2>Liste des absences de l'élève <?=$_SESSION['nbr']?></h2>
    <table border="1" >
        <tr>
        <th>Semaine</th>
        <th>nombre d'abcenses</th>
    </tr>
    <?php
    $result=chercher($_SESSION['nbr']);
    while($e=mysqli_fetch_assoc($result))
//echo $e['id_visiteur'];
{?>

    <tr>
           
           <td><?= $e['semaine'] ?></td>
           <td><?= $e['nbr'] ?></td>
           
        </tr>

        <?php    }
        ?>
    </table>
    <?php
       }
       else
       echo "";
    ?>



</font>
<font color="black">
		<?php
        //$cne=$_SESSION['cne'];

       if (isset($_SESSION['message'])&& $_SESSION['message']==1)
       {
        $_SESSION['message']=0;
        ?>  
        <div><p > Voulez vous <span style="color:red"><b> supprimer</b></span> l'élève de cne <?=$_SESSION['cne']?>?</p>

         <br>
        <form action="/TP/TP/gestion-ecolev/Traitement/eleve.php?action=valider&id=<?=$_SESSION['cne'] ?>" method="post">
           <label for="">Oui</label> <input type="radio" name="MyRadio" id="" value ="oui">
           <label for="">Non</label> <input type="radio" name="MyRadio" id="" value ="non">
            <input type="submit" value="Valider">
        </form>
      <?php
    }
       else
       echo "";
       // $_SESSION(['message'])=0;

        ?>
       
		</font>
</center>