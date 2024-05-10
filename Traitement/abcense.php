<?php
include './../Acces_BD/abcense.php';
session_start();

if(isset($_GET))
{
    switch($_GET['action'])
    {
           case "ajouter" :
            Ajouter($_POST['cne'],$_POST['semaine'],$_POST['nbr']);break;
            
        
            case "modifier": Modifier($_POST['id'],$_POST['nbr']); break;
       
            case "supprimer":
                $_SESSION['msjsupp']=1;
                $_SESSION['cne']=$_GET['cne'];
                $_SESSION['id']=$_GET['id'];
                $_SESSION['sem']=$_GET['sem'];
                ; break;
                case "delete":
                    $radioVal = $_POST["MyRadio"];

                    if($radioVal == "oui")
                    {
                        Supprimer($_SESSION['id']);
                    }
                    else if ($radioVal == "non")
                    
                        echo("");
                    
                    ; break;
            case "valider":
                $_SESSION['message']=1;
                $_SESSION['semaine']=$_POST['semaine'];
                 break;

    }
    header('Location:./../IHM//absence/absences.php');
}

?>
