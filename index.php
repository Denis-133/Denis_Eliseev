<!DOCTYPE html>
<html lang="ru">
<!DOCTYPE html>
<html lang="ru">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="Z:\home\newsite\www\css\style.css">

	<meta http-equiv="Content-Type" content="text/html">
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP урок 4(Формы)</title>
</head>
<body>

<!--Шапка сайта, с окнами Регистрация и Авторизация-->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Учебная форма обработки данных</h5>
</div>

<!--Шапка сайта с заголовком, где расположена основная информация-->


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4 mt-5 mb-5">Форма для заполнения</h1>
</div>
<div class = "container mt-5 text-center">
<form action = "check.php" accept-charset="utf-8" method = "post" enctype="multipart/form-data">
<div class="custom-file px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <input type="file" name="docs[]" class="custom-file-input" id="customFile" multiple>
  <label class="custom-file-label" for="customFile">Выберите файл...</label>
</div>
<br>
<textarea name = "text" class = "form-control" placeholder = "Введите Ваш текст"></textarea>
<br>
<button type = "submit" name="button" class = "btn btn-success">Отправить</button>
<br>
 </form>
</div>
<!--Подвал сайта, тут будет распологатся поле с информацией-->

<footer>
</footer>
</body>
</html>