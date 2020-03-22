<?php
Class User{
public $id;
public $login;
public $password;
public $email;

public function __constructor()
{
$this->id = $id;
$this->login = $login;
$this->password = $password;
$this->email = $email;
}

public function Register(){
  if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])){
    $login = htmlspecialchars(trim($_POST['login']));
    $password = mb_strtolower(htmlspecialchars(trim($_POST['password'])));
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
       $login_error = "Пользователь с таким логином или email существует";
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
}

public function Autorization(){
  $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=media', 'root', '');

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['login']) && !empty($_POST['password'])) {
    $enterLogin = htmlspecialchars(trim($_POST['login']));	
    $login = "SELECT * FROM `users` WHERE login = '$enterLogin'";
    $rezault = $pdo -> query($login)->fetch(PDO::FETCH_ASSOC);
    //var_dump($rezault);
    //var_dump($_POST);
    if ($rezault['login'] != $_POST['login'] || $rezault['password'] != $_POST['password']) {
              $_SESSION['msg'] = 'неправильный логин или пароль';  
              unset($_SESSION);
      }else {
          $_SESSION['login'] = $rezault['login'];
          $_SESSION['id'] = $rezault['id'];
          $_SESSION['msg'] = " Вы авторизованы, {$_SESSION['login']}!!";
        
          //header("Location: index.php");
      }
  }
}


} 
$newUser->Register();//Вызов методоа(дейсвтия) регистрации нового пользователя 


?>