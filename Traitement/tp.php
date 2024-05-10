<?php
include './../Acces_BD/eleve.php';
session_start();
$_SESSION['message']=0;
if(isset($_GET))
{
    switch($_GET['action'])
    {
        case "ajouter" :
            Ajouter($_POST['cne'],$_POST['nom'],$_POST['prenom'],$_POST['groupe']);break;
            
        
            case "modifier": Modifier($_GET['id'],$_POST['nom'],$_POST['prenom'],$_POST['groupe']); break;
       
            case "supprimer":
                $_SESSION['message']=1;
                $_SESSION['cne']=$_GET['id'];
                ; break;
            case "valider":
                $radioVal = $_POST["MyRadio"];

                    if($radioVal == "oui")
                    {
                        Supprimer($_GET['id']);
                    }
                    else if ($radioVal == "non")
                   
                        echo("");
                 break;
                 case "absence":
                    $_SESSION['abs']=1;
                    $_SESSION['nbr']=$_GET['id'];
                    ; break; 
                    case "select":
                        if($_POST['semaine'])
                        {
                        $_SESSION['count']=$_POST['semaine'];
                        $_SESSION['sel']=1;
                        $_SESSION['abs']=1;
                         }
                        else
                        $_SESSION['sel']=0;
                        $_SESSION['abs']=1;
                        ; break; 

    }
    header('Location:./../IHM//eleve/tst.php');
}

?>