<?php
mb_internal_encoding("UTF-8");
if (!empty($_POST['text'])) {
$time1 = "-1".date("YmdHis");
touch($time1.'.csv');
 $text1 = $_POST['text'];
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
       $a1 = count($arr);

$count = array_count_values($arr);

$fp = fopen($time1.'.csv', 'w');

foreach ($count as $key_count => $fields) {
    fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
    fputcsv($fp, array($key_count, $fields), ';');
}
fputcsv($fp, array("Количество слов в тексте: ", $a1), ';');
fclose($fp);


if (!mkdir('C:\Users\Денис\Desktop\OSPanel\domains\mediasoft1',0777,true) && !is_dir($time1.'.csv')){
echo "$time1.'.cvs'"."not created";
}
}

if (!empty($_FILES['docs']['name'])) {
    $doc = $_FILES['docs']['name'];
    echo "<pre>";
    var_dump ($doc);
    echo "</pre>";
    $docs = $_FILES['docs'];
    foreach ($docs['tmp_name'] as $index => $Path) {
        if (!array_key_exists($index, $docs['name'])) {
            continue;
        }
        move_uploaded_file($Path, __DIR__.DIRECTORY_SEPARATOR.$docs['name'][$index]);
    }
$time2 = "-2".date("YmdHis");
touch($time2.'.csv');
 echo "</br>";
 $text2 = file_get_contents($doc[0]);
 $text2 = mb_convert_encoding($text2, 'UTF-8');
 echo "<pre>";
 var_dump ($text2);
 echo "</pre>";
 $text2 = mb_strtolower($text2, 'UTF-8');
 $text2 = str_replace(['!', '?', '–','.',','], '', $text2);
 $text2 = preg_replace('/^([" "]+)|([" "]){2,}/m', " ", $text2);
 $arr2 = explode(' ',$text2);
 $arr2 = array_map('trim', $arr2);
 $array_slov2 = array_unique($arr2);
 foreach ($arr2 as $key2 => $slovo2) {
     $slovo2 = trim($slovo2);
 if ($slovo2 == false or $slovo2 == "") {
     unset($arr2[$key2]);
 } 
 }
 $a2 = count($arr);

 $count2 = array_count_values($arr2);
 
 $fp2 = fopen($time2.'.csv', 'w');
 
 foreach ($count2 as $key_count2 => $fields2) {
     fputs($fp2, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
     fputcsv($fp2, array($key_count2, $fields2), ';');
 }
 fclose($fp2);
 if (!mkdir('C:\Users\Денис\Desktop\OSPanel\domains\mediasoft1',0777,true) && !is_dir($time2.'.csv')){
    echo "$time2.'.cvs'"."not created";
    }
}

?>