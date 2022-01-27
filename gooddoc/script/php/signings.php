<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список записей</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/grid.css">
    <link rel="stylesheet" type="text/css" href="/css/queries.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css">

    <style> 
      a:link,
      a:visited,
      a:hover,
      a:active
      {
        color:white;
      }

      .btn-primary:hover, .btn-primary:active, input[type=submit] 
      {
        background-color: white;
        border-color: #006bdd;
        color: blue;
        cursor: pointer;
      }
    </style>
</head>
<body>
    <?php  
    include 'connect.php';

    $date = $_REQUEST['date'];
    
    if(isset($_REQUEST['del_id'])){
        $sql = mysqli_query($mysql, "DELETE FROM `visit` WHERE `id` = ".$_REQUEST['del_id']);
        echo '<p>Запись удалена<p>';
    }

    if(isset($_REQUEST['edit_id'])){
        if(isset($date)){
            $sql = mysqli_query($mysql, "UPDATE `visit` SET `date` = '$date' WHERE `visit`.`id` = ".$_REQUEST['edit_id']);

            echo "Запись прошла успешно! <a href='/cabinet.php' style='color:var(--primary);'>Назад</a>";
        }
    }
    ?>

<table class="tableout" border='1'>

    <?php

    

    if($_COOKIE['user'] != ''):

    $spec = filter_var(trim($_POST['spec']), FILTER_SANITIZE_STRING);
    $res = mysqli_query($mysql, "SELECT * FROM `visit` WHERE `spec-id` = '$spec' ORDER BY `date`");

    while($out = mysqli_fetch_array($res,MYSQLI_ASSOC)){
        // echo "<p>$out[name] | $out[phone] | $out[date]</p> \n";
        // echo $out['name'],' ', $out['phone'],' ', $out['date']. "<br />";
        echo '<tr><td>'.$out['id'].'</td>'.
        '<td>'.$out['name'].'</td>'.
        '<td>'.$out['phone'].'</td>'.
        '<td>'.$out['date'].'</td>'.
        '<td><a href="/script/php/signings.php/?edit_id='.$out['id'].'">Редактировать</a></td>'.
        '<td><a href="/script/php/signings.php/?del_id='.$out['id'].'">Удалить</a></td></tr>';
        }
?>
    </table>

        <?php

        if(isset($_REQUEST['edit_id'])){
            $sql = mysqli_query($mysql,"SELECT `id`, `date` FROM `visit` WHERE `id`=".$_REQUEST['edit_id']);
            $out = mysqli_fetch_array($sql);
        ?>
        <table>
            <form action="" method="post">
            <tr>
            <td>Изменение даты:</td>
            <td>
            <link rel="stylesheet" type="text/css" href="/script/js/jquery.datetimepicker.min.css" />
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script src="/script/js/jquery.datetimepicker.full.min.js"></script>
            <input type="datetime" name="date" id="datetimepicker" value="<?php "$date"?>">
            <script>
              jQuery.datetimepicker.setLocale('ru');

              $('#datetimepicker').datetimepicker({
                inline: false,
                closeOnTimeSelect: true,
                closeOnDateSelect: false,
                closeOnWithoutClock: false,
                onShow: function (ct) {
                  this.setOptions({
                    defaultDate: '+1970/01/02',
                    startDate: '+1970/01/02',
                    minDate: '+1970/01/02',
                    minTime: '08:00',
                    maxTime: '21:00',
                  })
                },
              })
            </script>
            </td>
            </tr>

            <tr>
            <td colspan="2"><input type="submit" value="Сохранить"></td>
            </tr>
        </form>
    </table>
    <?php

        }
        
                    '<pre>';print_r($_REQUEST);echo '</pre>';die();
        ?>
        <!-- jQuery and JS bundle w/ Popper.js -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script> -->

    <?php else:
            echo 'No';
            ?>

            <?php endif;?>
</body>
</html>

