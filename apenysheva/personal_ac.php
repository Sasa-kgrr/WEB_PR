<?php
echo '<link rel="stylesheet" type="text/css" href="dialog_style.css">';
session_start();

include('connect_db.php');
include('user_city.php');

$id_pers = $_GET['id_pers'];
$str_pers = "select * from `user` where id = '" . $id_pers . "'";
$result_pers= $conn->query($str_pers)->fetch_assoc();
echo '<head>
    <title>Любители котиков:аккаунт ' . $result_pers['F'] . ' ' . $result_pers['I'] . '</title>
</head>';

$id_user_from = $_SESSION['id_user'];
$str_from = "select * from `user` where id = '" . $id_user_from . "'";
$result_from= $conn->query($str_from)->fetch_assoc();

echo '<div class="mini_message">Вы вошли как ' . $result_from['F'] . ' ' . $result_from['I'] . '
<div class="exit"><a href="http://localhost/apenysheva/01.php">&#8629</a></div>
</div>';

$imgs = scandir('C:\AppServ\www\apenysheva\img');
while($row = $result->fetch_assoc()) {
    if ($row['id'] == $id_pers)
    {
        foreach($imgs as $img)
        {
            if(strpos($img, $row['login'])!==false)
            {
                $img_name = $img;
            }
        }
        if($img_name == "")
        {
            $img_name = "no.webp";
        }

    echo '<center>
            <div class="personal">
                <img src="/apenysheva/img/' . $img_name . '" class="avat_pers"/>
                <div class="info_pers">
                    <p>ФИО: ' . $row['F'] . ' ' . $row['I'] . ' ' . $row['O'] . '</p>
                    <p>Email: ' . $row['email'] . '</p>
                    <p>Birth: ' . $row['birth'] . '</p>
                    <p>Registration : ' . $row['registration'] . '</p>
                    <p>Город : ' . $row['name'] . '</p>
                    <a href="/apenysheva/message.php?id_to=' . $row['id'] .  '">Написать...</a>
                </div>
            </div>
            </center>';
    }
    
}

?>