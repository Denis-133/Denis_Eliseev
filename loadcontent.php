<?php session_start() ?>
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
  <a class="btn btn-outline-primary" href="register.php" style="margin-left: 10px">Регистрация</a>
  <a class="btn btn-outline-primary" href="avtorization.php" style="margin-left: 10px">Авторизация</a>
  <a class="btn btn-outline-primary" href="index.php" style="margin-left: 10px">Главная страница</a>
</div>



<?php
if (!empty($_SESSION['login']) && !empty($_SESSION['id']) ) {
  $activeuserid = $_SESSION['id'];
  echo "<p>".var_dump($_SESSION['login'])."</p>";
  echo "<p>".var_dump($_SESSION['id'])."</p>";
echo'
<div class = "container mt-4 text-center pt-4 my-md-5 pt-md-5">
<form class="form-signin" action = "loadcontent.php" method = "post" enctype="multipart/form-data">
  <h1 class="h3 mb-3 font-weight-normal mb-4">Загрузка файлов</h1>
  <label for="inputTitle" class="sr-only mb-4">Заголовок</label>
  <input type="text" name = "title" id="inputLogin" class="form-control" placeholder="Заголовок" required autofocus>
  <label for="inputPassword" class="sr-only mb-4">Теги</label>
  <input type="text" name="tags" id="inputTags" class="form-control" placeholder="Теги в формате (#тег)" required>
  <div class="custom-file px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"> 
  <input type="file" name="userfile[]" class="custom-file-input" id="customFile" multiple>
  <label class="custom-file-label" for="customFile">Выбор файлов...</label>
  <button type = "submit" name="button" class = "btn btn-success">Отправить</button>
</div>
</form>
</div>';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo "<pre>";
  var_dump($_FILES['userfile']);
  echo "</pre>";
$tags = $_POST['tags'];
$title = $_POST['title'];
        // Пути загрузки файлов
$path = '/image';
$sqlpath = '\image/'.'';
// Допустимые параметры файла
$size = 5120000;
$types = array('image/gif', 'image/png', 'image/jpeg');
$time = date("YmdHis");
$loadfilename = $_SESSION['id']."_".$time."_".rand(1,10);
function reArrayFiles(&$file_post) {
  $file_ary = array();
  $file_count = count($file_post['name']);
  $file_keys = array_keys($file_post);
  for ($i=0; $i<$file_count; $i++) {
      foreach ($file_keys as $key) {
          $file_ary[$i][$key] = $file_post[$key][$i];
      }
  }
  return $file_ary;
}
  $file_ary = reArrayFiles($_FILES['userfile']);
   echo "<pre>";
  var_dump($file_ary);
  echo "</pre>";

  foreach ($file_ary as $key_file => $value_file) {
    if (in_array($value_file['type'], $types) && $value_file['size']<=$size) {
      $value_file["name"] = "$loadfilename";
      var_dump($value_file);
      $insertQueryPhoto = "INSERT INTO photos (user_id,path,created_at,tags,title) VALUES('$activeuserid','$path'+'$loadfilename',GETDATE(),'$tags','$title')";
      $pdo -> exec($insertQueryPhoto) or die(print_r($pdo->errorInfo(), true));
      
    }


    
    //var_dump($value_file);
  }



 
}



}else
{
echo "<p>Зарегестрируйтесь или авторизируйтесь, чтобы загрузить фото!</p>";}
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
<!--
<label for="inputTitle" class="sr-only mb-4">Заголовок</label>
  <input type="text" name = "title" id="inputLogin" class="form-control" placeholder="Заголовок" required autofocus>
  <label for="inputPassword" class="sr-only mb-4">Теги</label>
  <input type="text" name="tags" id="inputTags" class="form-control" placeholder="Теги в формате (#тег)" required>
  <div class="custom-file px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"> 
  -->
</html>
