<?php
/*TIPOS DE DATOS */
$nombre="Kelly Darlyn";
$talla=1.60;
$peso=50;
$musica=array("The Weeknd","Chase Atlantic");
$bandera=true;
print("nombre:".$nombre."<br>");
printf("talla:".$talla."<br>");
print_r("peso:".$peso."<br>");
echo("badera:".$bandera."<br>");
var_dump($musica);
echo "<br>";
/*----------OPERADORES +,-,*,/,% ---------*/
$a=$_GET['A'];
$b=$_GET['B'];
$a=4;
$b=3;
echo ("El resultado de la Suma es:".$a+$b."<br>");
echo ("El resultado de la Resta es:".$a-$b."<br>");
echo ("El resultado de la Multiplicación es:".$a*$b."<br>");
echo ("El resultado de la División es:".$a/$b."<br>");
echo ("El resultado de la Modulo es:".$a%$b."<br>");

/*COMPARATIVOS---->,<,=,*,==,===,<=,>=,<==>*/
var_dump($a>$b);
echo "<br>";
var_dump($a<$b);
echo "<br>";
var_dump($a>=$b);
echo "<br>";
var_dump($a<=$b);
echo "<br>";
var_dump($a==$b);
echo "<br>";
var_dump($a===$b);
echo "<br>";
var_dump($a<=>$b);
echo "<br>";
/*
llenar 2 arrays uno numerico, el otro con letra o nombres.
*/
?>
