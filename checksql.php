<?php
mb_internal_encoding("UTF-8");
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=media', 'root', '');
$selectQuery1 = 'SELECT*FROM uploaded_text';
$selectQuery2 = 'SELECT*FROM word';

if (!empty($_POST['text'])) {
 $form_text = $_POST['text'];
 $text1 = $form_text;
 $text1 = mb_strtolower($text1, 'UTF-8');
 $text1 = str_replace(['!', '?', '–','.',',','"'], '', $text1); 
 $text1 = str_replace(array('«', '»'), '', $text1);
 $text1 = htmlspecialchars($text1);
 $text1 = preg_replace('/^([" "]+)|([" "]){2,}/m', " ", $text1);
 $arr = explode(' ',$text1);
 $arr = array_map('trim', $arr);
 $array_slov = array_unique($arr);
       $a1 = count($arr);
       $pdo -> query($selectQuery1)->fetchAll(PDO::FETCH_ASSOC);
       $insertQuery1 = "INSERT INTO uploaded_text (content, date, words_count) VALUES('$form_text',NOW(),'$a1')";
       $pdo -> exec($insertQuery1) or die(print_r($pdo->errorInfo(), true));
       $text_id1 = $pdo->lastInsertId();
 foreach ($arr as $key1 => $slovo) {
     $slovo = trim($slovo);
 if ($slovo == false or $slovo == "") {
     unset($arr[$key1]);
 } 
 }

$count1 = array_count_values($arr);
foreach ($count1 as $word1 => $count_1) {
    $insertQuery2 = "INSERT INTO word (text_id,word,count) VALUES('$text_id1','$word1','$count_1')";
    $pdo -> exec($insertQuery2) or die(print_r($pdo->errorInfo(), true));
}
}

if (!empty($_FILES['docs']['name']) && ($_FILES['docs']['size'])>0) {
    $doc = $_FILES['docs']['name'];
    $docs = $_FILES['docs'];

    foreach ($docs['tmp_name'] as $index => $Path) {
        if (!array_key_exists($index, $docs['name']) && $docs['tmp_name']!=none) {
            continue;
        }
        move_uploaded_file($Path, __DIR__.DIRECTORY_SEPARATOR.$docs['name'][$index]);
    }
 if (filesize($doc[0])>0) {
 $text_file = file_get_contents($doc[0]);
 $text2 = $text_file;
 $text2 = mb_strtolower($text2, 'UTF-8');
 $text2 = str_replace(['!', '?', '–','.',',','"'], '', $text2); 
 $text2 = str_replace(array('«', '»'), '', $text2);
 $text2 = htmlspecialchars($text2);
 $text2 = str_replace('&QUOT;', '', $text2);
 $text2 = preg_replace('/^([" "]+)|([" "]){2,}/m', " ", $text2);
 $arr2 = explode(' ',$text2);
 $arr2 = array_map('trim', $arr2);
 $array_slov2 = array_unique($arr2);
 $a2 = count($arr2);
 $pdo -> query($selectQuery2)->fetchAll(PDO::FETCH_ASSOC);
 $insertQuery3 = "INSERT INTO uploaded_text (content, date, words_count) VALUES('$text_file',NOW(),'$a2')";
 $pdo -> exec($insertQuery3) or die(print_r($pdo->errorInfo(), true));
 $text_id2 = $pdo->lastInsertId();
 foreach ($arr2 as $key2 => $slovo2) {
     $slovo2 = trim($slovo2);
 if ($slovo2 == false or $slovo2 == "") {
     unset($arr2[$key2]);
 } 
 }
 $count2 = array_count_values($arr2);
 foreach ($count2 as $word2 => $count_2) {
    $insertQuery4 = "INSERT INTO word (text_id,word,count) VALUES('$text_id2','$word2','$count_2')";
    $pdo -> exec($insertQuery4) or die(print_r($pdo->errorInfo(), true));
}
}
}


header("Refresh: 5;  url=\index.php");
?>