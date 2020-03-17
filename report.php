<!DOCTYPE html>
<html lang="ru">
<head>
    
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->

    
    
    <!--<link rel="stylesheet" href="/feedback/vendors/bootstrap/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="/feedback/css/main.css">-->
<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  
    
</head>
<body>
<!--Шапка сайта, с окнами Регистрация и Авторизация-->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Учебная страница</h5>
  <a class="btn btn-outline-primary" href="index.php" style="margin-left: 10px">На главную</a>
  <a class="btn btn-outline-primary" href="form.php" style="margin-left: 10px">Форма загрузки</a>
</div>


<?php
$id = $_GET['id'];
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=media', 'root', '');
$selectQuery1 = "SELECT*FROM uploaded_text where id='$id'";
$selectQuery2 = "SELECT*FROM word where text_id='$id'";
$result1 = $pdo->query($selectQuery1);
$result2 = $pdo->query($selectQuery2); 
$row1 = $result1->Fetch(PDO::FETCH_ASSOC);
$text = $row1['content'];
$date = $row1['date'];
$words_count = $row1['words_count'];
echo "<h3>Текст:".$text."; Дата загрузки:".$date."; Количество слов:".$words_count."</h3>";
while ($row2 = $result2->Fetch(PDO::FETCH_ASSOC))
   {   
       $word = $row2['word'];
       $count = $row2['count'];
       $words_count = $row2['words_count'];
       echo "<ul>";
       echo "<li><p>Слово: ".$word."; Количесво вхождений:".$count."</p></li>";
       echo "</ul>";
   }
?>
  

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <!--<img class="mb-2" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">-->
        <small class="d-block mb-3 text-muted">© 2017-2019</small>
      </div>
      <div class="col-6 col-md">
        <h5> <a class="text-muted" href="contact.php">Кoнтакты</a></h5>
        <ul class="list-unstyled text-small">
          <li><p>Адрес электронной почты:</p> <a class="text-muted" href="#">eliseev_denis_95@mail.ru</a></li>
        </ul>
    
  </footer>
  </div>
  </div> 
  

</body>
</html>