<?php
 require_once('..'.DIRECTORY_SEPARATOR.'class' . DIRECTORY_SEPARATOR . 'mes.php');

 setlocale(LC_ALL, "pt_BR","pt_BR.utf-8","portuguese");


 $dt = new Datetime();

 $mes1 = new Mes("Janeiro", 31);
 $mes2 = new Mes("Fevereiro", 28);
 $mes3 = new Mes("Março", 30);
 $mes4 = new Mes("Abril", 31);
 $mes5 = new Mes("Maio", 30);
 $mes6 = new Mes("Junho", 31);
 $mes7 = new Mes("Julho", 30);
 $mes8 = new Mes("Agosto", 31);
 $mes9 = new Mes("Setembro", 30);
 $mes10 = new Mes("Outubro", 31);
 $mes11 = new Mes("Novembro", 30);
 $mes12 = new Mes("Dezembro", 31);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Bem vindo ao calendário NovaM3</title>

    <!-- Custom Theme Style -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

<div class="mes"> 
  <ul>
    <span class="dataa">Data Atual: <?php echo ucwords(strftime("%A, %d de %B de %Y")); ?></span>
    <a href="calendario11.php"><button onclick="proximo()" class="prev">&#10094;</button></a>
    <button onclick="antes()" class="next">&#10095;</button>
    <li> <?php echo $mes12->getNome() ?> <br><span style="font-size:18px"> <?php  echo ucwords(strftime("%Y")); ?> </span></li>
  </ul>
</div>

<ul class="diassemana">
  <li>Seg</li>
  <li>Ter</li>
  <li>Qua</li>
  <li>Qui</li>
  <li>Sex</li>
  <li>Sab</li>
  <li>Dom</li>
</ul>

<ul class="dias"> 
  
  <?php

  for($i=1; $i<=$mes12->getDias(); $i++){
    echo "<li> $i </li>";
  }


  ?>
  
</ul>


</body>
</html>