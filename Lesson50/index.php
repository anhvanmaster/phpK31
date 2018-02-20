<?php
require 'library.php';
$arr = randomArray(10);
$arr1 = [1,2,3,4,5,6];
$arr2 = [7,8,9,10,11];
$arr3 = [12,13,14,15,16];
$arr4 = [17,18,19,20,21];
$arr5 = [22,23,24,25,26];
$arr6 = [27,28,29,30,31];
$arr7 = ['a' => 1,
		'b' => 2,
		'c' => 3,
		'd' => 4,
		'e' => 5];
$str = 'A"n"h"V"a"n';
$str1 = "Nguyen Anh Van";
$str2 = "Nguyen Van Huy";
$str3 = "Nguyen Bach Duong";
$str4 = "Trinh Minh Tam";
$str5 = "Tien Xoan";
echo '<pre>';
// var_dump($arr2);
/*var_dump(each($arr));
var_dump(end($arr));
var_dump(each($arr1));
var_dump(end($arr1));
var_dump(each($arr2));
var_dump(end($arr2));
var_dump(each($arr3));
var_dump(end($arr3));
var_dump(each($arr4));
var_dump(end($arr4));*/
/*$result = compact('arr2','arr1');
var_dump($result);
$result = compact('arr3','arr1');
var_dump($result);
$result = compact('arr4','arr1');
var_dump($result);
$result = compact('arr5','arr1');
var_dump($result);
$result = compact('arr6','arr1');
var_dump($result);*/
/*extract($arr7);
echo $a.$b.$c.$d.$e;*/
/*var_dump(in_array(1, $arr7));
var_dump(in_array(2, $arr7));
var_dump(in_array(3, $arr7));
var_dump(in_array(4, $arr7));
var_dump(in_array(6, $arr7));*/
/*echo addcslashes($str, $str[0]);
echo addcslashes($str, $str[1]);
echo addcslashes($str, $str[2]);
echo addcslashes($str, $str[3]);
echo addcslashes($str, $str[4]);*/
/*echo crypt($str1,$str);
echo crypt($str2,$str);
echo crypt($str3,$str);
echo crypt($str4,$str);
echo crypt($str5,$str);*/
/*echo md5($str1);
echo md5($str2);
echo md5($str3);
echo md5($str4);
echo md5($str5);*/
/*echo sha1($str1);
echo sha1($str2);
echo sha1($str3);
echo sha1($str4);
echo sha1($str5);*/
/*$hashed = password_hash($str1, PASSWORD_DEFAULT);
echo $hashed. '<br>';
var_dump(password_verify($str1, $hashed));
$hashed = password_hash($str2, PASSWORD_DEFAULT);
echo $hashed. '<br>';
var_dump(password_verify($str2, $hashed));
$hashed = password_hash($str3, PASSWORD_DEFAULT);
echo $hashed. '<br>';
var_dump(password_verify($str3, $hashed));
$hashed = password_hash($str4, PASSWORD_DEFAULT);
echo $hashed. '<br>';
var_dump(password_verify($str4, $hashed));
$hashed = password_hash($str5, PASSWORD_DEFAULT);
echo $hashed. '<br>';
var_dump(password_verify($str5, $hashed));*/
/*echo implode(" ", $arr1);
echo implode(" ", $arr2);
echo implode(" ", $arr3);
echo implode(" ", $arr4);
echo implode(" ", $arr5);*/
// var_dump(explode(" ", $str1));
// var_dump(explode( " ",$str2));
// var_dump(explode( " ",$str3));
// var_dump(explode( " ",$str4));
// var_dump(explode( " ",$str5));
/*echo htmlspecialchars("<script>alert(123)</script>");
echo htmlspecialchars("<div>day la special tag</div>");
echo htmlspecialchars("<b> chu dam </b>");
echo htmlspecialchars("<del>dalkdl</del>");
echo htmlspecialchars("<i>cjhchdjc</i>");*/
$str1 = '<script>alert(123)</script>';
$str2 = "<div>day la special tag</div>";
$str3 = "<b> chu dam </b>";
$str4 = "<del>dalkdl</del>";
$str5 = "<i>cjhchdjc</i>";
/*echo htmlentities($str1);
echo htmlentities($str2);
echo htmlentities($str3);
echo htmlentities($str4);
echo htmlentities($str5);*/
/*echo html_entity_decode($str1);
echo html_entity_decode($str2);
echo html_entity_decode($str3);
echo html_entity_decode($str4);
echo html_entity_decode($str5);*/
/*var_dump(array_intersect($arr1, $arr));
var_dump(array_intersect($arr2, $arr));
var_dump(array_intersect($arr3, $arr));
var_dump(array_intersect($arr4, $arr));
var_dump(array_intersect($arr5, $arr));*/
/*var_dump(array_key_exists(1, $arr1));
var_dump(array_key_exists(1, $arr2));
var_dump(array_key_exists(1, $arr3));
var_dump(array_key_exists(1, $arr4));
var_dump(array_key_exists(1, $arr5));*/

?>