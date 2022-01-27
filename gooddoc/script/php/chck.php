<?php
  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $phone = filter_var(trim($_POST['phone']),
  FILTER_SANITIZE_STRING);
  $spec = filter_var(trim($_POST['spec']),
  FILTER_SANITIZE_STRING);
  $date = filter_var(trim($_POST['date']),
  FILTER_SANITIZE_STRING);

  // if(mb_strlen($name) == 0){
  //   echo "Нужно ввести имя!";
  //   exit();
  // }elseif (mb_strlen($phone) == 0){
  //   echo "Нужно ввести телефон!";
  //   exit();
  // }
  // elseif (mb_strlen($spec) == 0) {
  //   echo "Нужно выбрать специалиста!";
  //   exit();
  // }
  // elseif (mb_strlen($date) == 0) {
  //   echo "Нужно выбрать дату!";
  //   exit();
  // }


  require "connect.php";
  $mysql->query("INSERT INTO `visit` (`name`, `phone`, `spec-id`, `date`)
  VALUES('$name', '$phone', '$spec', '$date')");

  $mysql->close();

  echo "Запись прошла успешно! <a href='/index.php'>Назад</a>";

  ?>
