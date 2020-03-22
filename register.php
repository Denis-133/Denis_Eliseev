<?php session_start() ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    
<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  
    
</head>
<body class="text-center">
<!--Шапка сайта, с окнами Регистрация и Авторизация-->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Учебная страница</h5>
  <a class="btn btn-outline-primary" href="index.php" style="margin-left: 10px">Главная страница</a>
  <a class="btn btn-outline-primary" href="avtorization.php" style="margin-left: 10px">Авторизация</a>
  <a class="btn btn-outline-primary" href="loadcontent.php" style="margin-left: 10px">Загрузить фото</a>
</div>

<?php
//include_once('config.php');
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=media', 'root', '');

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])){
  $login = htmlspecialchars(trim($_POST['login']));
  $password = md5(mb_strtolower(htmlspecialchars(trim($_POST['password']))));
  $email = htmlspecialchars(trim($_POST['email']));
  $errlog = "SELECT count(*) FROM `users` WHERE login = '$login'";
  $errmail= "SELECT count(*) FROM `users` WHERE email = '$email'";
  $result1 = $pdo->prepare($errlog);
  $result2 = $pdo->prepare($errmail);
  $result1->execute(); 
  $result2->execute();
  $number_of_rows1 = $result1->fetchColumn(); 
  $number_of_rows2 = $result2->fetchColumn(); 
     if ($number_of_rows1 > 0 || $number_of_rows2 > 0) {
     $login_error = "Такой пользователь уже существует";
     }
     else {
  // Заносим пользователя в БД // 
  $select_table_users = "SELECT*FROM `users`";
  // добавляем данные о пользователе в БД
  $user_insert = 'INSERT INTO `users`(login, password, email) VALUES (?, ?, ?)';
  $bd_insert = $pdo->prepare($user_insert);		 // добавляем данные о пользователе в БД
  $success = $bd_insert->execute([$login, $password, $email]); 
  $_SESSION['id'] = $pdo->lastInsertId();
  $_SESSION['login'] = $login;
  session_write_close();
    }
    }
?>

<div class = "container mt-4 text-center pt-4 my-md-5 pt-md-5">
<form class="form-signin" action = "register.php" method = "post" >
  <h1 class="h3 mb-3 font-weight-normal mb-4">Регистрация</h1>
  <label for="inputLogin" class="sr-only mb-4">Введите логин</label>
  <input type="text" name = "login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
  <label for="inputPassword" class="sr-only mb-4">Введите пароль</label>
  <input type="text" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <label for="inputEmail" class="sr-only mb-4">Введите Email</label>
  <input type="text" name = "email" id="inputEmail" class="form-control" placeholder="email" required autofocus>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
  <p><?php echo "$login_error"; ?></p>
  <p><?php 
  var_dump ($number_of_rows1); 
  echo "<br>";
  var_dump ($number_of_rows2); 
  
  
  
  ?>
  </p>
</form>
</div>


  

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