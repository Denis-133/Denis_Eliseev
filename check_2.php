<?php
$time = date("YmdHis");
touch($time.'.csv');

$data = $_POST;
 $text1 = $data['text'];
 $text1 = mb_strtolower($text1, 'UTF-8');
 $text1 = str_replace(['!', '?', '–','.',','], '', $text1);
 $text1 = preg_replace('/^([" "]+)|([" "]){2,}/m', " ", $text1);
 echo "<pre>";
 echo "$text1";
 echo "</pre>";
 $arr = explode(' ',$text1);
 $arr = array_map('trim', $arr);
 $array_slov = array_unique($arr);
 foreach ($arr as $key1 => $slovo) {
     $slovo = trim($slovo);
 if ($slovo == false or $slovo == "") {
     unset($arr[$key1]);
 } 
 }
 $list = [];
 foreach ($array_slov as $keys1 => $value1) {
    $num1 = 0;
    $string = "";
       foreach ($arr as $key1 => $slovo1) {
           if ($value1===$slovo1) {
               $num1++; 
               $string .= "($value1):=>$num1\n";
           }  
       }
       echo "Количество вхождений "."($value1)".":=>"."$num1"."</br>";
       //file_put_contents($time.'.cvs', "$value1");
       //file_put_contents($time.'.cvs', "$=>");
       //file_put_contents($time.'.cvs', "$num1\n");
       }
       $a = count($arr);
   echo "Количество слов в тексте:".count($arr);
   //file_put_contents($time.'.cvs', "$string", FILE_APPEND);

$count = array_count_values($arr);
echo "<pre>";
var_dump ($count);
echo "</pre>";

$fp = fopen($time.'.csv', 'w');

foreach ($count as $key_count => $fields) {
    fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
    fputcsv($fp, array($key_count, $fields), ';');
}
fclose($fp);


if (!mkdir('C:\Users\Денис\Desktop\OSPanel\domains\mediasoft1',0777,true) && !is_dir($time.'.csv')){
echo "$time.'.cvs'"."not created";
}

 echo "</br>";
 echo "<pre>";
 var_dump ($_FILES);
 echo "</pre>";
 $text2 = file_get_contents($_FILES('name'));
 $text2 = mb_strtolower($text2, 'UTF-8');
 $text2 = str_replace(['!', '?', '–','.',','], '', $text2);
 $text2 = preg_replace('/^([" "]+)|([" "]){2,}/m', " ", $text2);
 echo "<pre>";
 echo "$text2";
 echo "</pre>";
 $arr2 = explode(' ',$text2);
 $arr2 = array_map('trim', $arr2);
 $array_slov2 = array_unique($arr2);
 foreach ($arr2 as $key2 => $slovo2) {
     $slovo2 = trim($slovo2);
 if ($slovo2 == false or $slovo2 == "") {
     unset($arr2[$key2]);
 } 
 }

  foreach ($array_slov2 as $keys2 => $value2) {
  $num2 = 0;
     foreach ($arr2 as $key2 => $slovo2) {
         if ($value===$slovo2) {
             $num2++;
         }  
     }
     echo "Количество вхождений "."($value)".":=>"."$num2"."</br>";
     }
 echo "Количество слов в тексте:".count($arr2);






?>