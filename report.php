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
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=media', 'root', '');
$selectQuery1 = 'SELECT*FROM uploaded_text';
$selectQuery2 = 'SELECT*FROM word';
//$count = $pdo->rowCount();


//$rows = mysqli_num_rows($result);
//$result = $pdo->query($selectQuery1, MYSQLI_USE_RESULT);
$Allrows1 = $pdo->query($selectQuery1)->FetchAll(PDO::FETCH_ASSOC);
$Onerow1 = $pdo->query($selectQuery1)->Fetch(PDO::FETCH_ASSOC);
$result = $pdo->query($selectQuery1); 

while ($row = $result->Fetch(PDO::FETCH_ASSOC))
   {
       $id = $row['id'];
       $short_content = mb_strimwidth($row['content'], 0, 25, "...");
       echo "<ul>";
       echo "<li>id: $id</li>";
       echo "<li>id: $short_content</li>";
       echo '<li><a class="btn" href="report.php" style="margin-left: 2px">Ссылка на детальный просмотр</a> </li>';
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