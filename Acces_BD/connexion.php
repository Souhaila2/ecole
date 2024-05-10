<?php

function connect ($lc,$r,$ps,$db)
{
$link=mysqli_connect($lc,$r,$ps,$db);
return $link;
}


?>