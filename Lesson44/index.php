<?php
//    function testCode() {
//        echo 'lol';
//    }
//    function TamGiac($a, $b, $c){
//        if ($a+$b>$c && $a+$c>$b && $b+$c>$a && $a>0 && $b>0 && $c>0){
//            echo "$a, $b, $c là ba cạnh của tam giác";
//        } else {
//            echo "$a, $b, $c không phải ba cạnh của tam giác";
//        }
//    }
//    TamGiac(rand(1,50), rand(1,50), rand(1,50));

function check($arr){
    $arr2 = array();
    for ($i = 0; $i < count($arr); $i++){
        if (isset($arr2[$arr[$i]])){
            $arr2[$arr[$i]]++;
        } else {
            $arr2[$arr[$i]]=1;
        }
    }
    return $arr2;
}
$arr = array();
for ($i = 0; $i <100; $i++){
    $arr[]= rand(0,100);
}
//print_r($arr);
//$arr2 = check($arr);
//foreach ($arr2 as $key => $value){
//    echo "số $key xuất hiện $value lần <br>";
//}

function oddEven($arr){
    $odd = $even = array();
    for ($i=0; $i<count($arr); $i++){
        if ($arr[$i]%2==0){
            $even[]=$arr[$i];
        } else {
            $odd[]=$arr[$i];
        }
    }
    foreach ($arr as $key => $value){
        echo "$key => $value, ";
    }
    echo '<br><br>';
    foreach ($odd as $key => $value){
        echo "$key => $value, ";
    }
    echo '<br><br>';
    foreach ($even as $key => $value){
        echo "$key => $value, ";
    }
}
oddEven($arr);

?>