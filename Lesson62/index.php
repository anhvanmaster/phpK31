<h3>hướng đối tượng</h3>
<?php

class Animal
{
    var $name;
    var $age;
    function moving(){
    	echo 'toi la dogn va toi dang di chuyen'.'<br>';
    }
}
class Song
{
	var $name;
	var $author;    
}
$pig = new Animal();
$pig->name = "heo";
$pig->age = 2;
$pig->moving();
var_dump($pig);
$quocca = new Song();
$quocca->author = "tien quan ca";
$quocca->name = "UNKOWN";
var_dump($quocca);
/*class Human
{
	var $name;
	var $birthDay;
	var $sex;
	var $helth;
	var $homeTown;
	var $id;
	var $mauDa;
	var $toc;
	var $chieuCao;
	var $canNang;
}*/

?>