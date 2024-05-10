<?php
include_once '../../Acces_BD/abcense.php';
$result=lister();

session_start();
?>
<center>
    <h2>Liste des absences</h2>
    <table border="1" style="width: 300px;border-collapse: collapse;">
        <tr >
        <th hidden><input type="hidden" name="id"></th>
          <th>CNE</th>
           
           <th>Semaine</th>
           <th>nombre d'absences</th>
           
           <th colspan="2"> <a href="add_abs.php"><img src="" alt="">Ajouter</a> </th>
        </tr>
        
<?php

while($e=mysqli_fetch_assoc($result))
{?>
    <tr>
          <td hidden><?=$e['id'] ?></td>
           <td><?=$e['cne'] ?></td>
           <td><?= $e['semaine'] ?></td>
           <td><?= $e['nbr'] ?></td>
          
           
           <th><a href="add_abs.php?id=<?= $e['id'] ?>"><img src="../images/edit.png" alt=""></a></th>
           <th><a href="/TP/TP/gestion-ecolev/Traitement/abcense.php?action=supprimer&cne=<?= $e['cne'] ?>&sem=<?= $e['semaine'] ?>&id=<?= $e['id'] ?>"><img src="../images/supp.png" alt=""></a></th>
          
        </tr>

        <?php  }
        ?>

</table><br>
<a href="/TP/TP/gestion-ecolev/index.php"><img src="./home.png" alt=""> Retour</a>
<h3><b> Afficher les listes des élèves triee selon l'ordre croissant de leurs absences </b></h3>
<form action="/TP/TP/gestion-ecolev/Traitement/abcense.php?action=valider" method="post">

<label for=""><b> Semaine</label></b>
<input type="text" name="semaine" >
<input type="submit" value="Valider">
<input type="reset" value="Annuler">

</form>
<font color="red">
		<?php
        

       if (isset($_SESSION['message'])&& $_SESSION['message']==1)
       {
         $_SESSION['message']=0;
        $res=search($_SESSION['semaine'])
        ?>
         <br>
         <table border="2" style="width: 300px;border-collapse: collapse;">
        <tr >
          <th>CNE</th>  
          <th>Nom Prenom</th> 
           <th>nombre d'absences</th>  
        </tr>
        
<?php

while($e=mysqli_fetch_assoc($res))

{?>
    <tr>
          
           <td><?=$e['cne'] ?></td>
           <td><?=$e['nom']."  ".$e['prenom'] ?></td>
           <td><?= $e['nbr'] ?></td> 
        </tr>

        <?php  }
        ?>

</table><br>
      <?php
    }
       else
       echo "";
       // $_SESSION(['message'])=0;
        
        ?>
       
		</font>
    <div color="black"><b>
      
		<?php
        //$cne=$_SESSION['cne'];

       if (isset($_SESSION['msjsupp'])&& $_SESSION['msjsupp']==1)
       {
        $_SESSION['msjsupp']=0;?>
       <div  style="background-color:pink ;border:1px solid; width:50%"><p > Voulez vous <span style="color:red">supprimer</span> l'absence de la semaine de <?=$_SESSION['sem']?> l'élève de cne  <?=$_SESSION['cne']?>?</p>
        
        
        <form action="/TP/TP/gestion-ecolev/Traitement/abcense.php?action=delete" method="post">
           <label for="">Oui</label> <input type="radio" name="MyRadio" id="" value ="oui">
           <label for="">Non</label> <input type="radio" name="MyRadio" id="" value ="non">
            <input type="submit" value="Valider">
        </form></div> 
      <?php
    }
       else
       echo "";
       // $_SESSION(['message'])=0;
        
        ?>
        
       </b>
  </div>

</center>

<style>
  div {
    div {
  background-color: lightblue;
}
  }
</style>