<?php
echo '<link rel="stylesheet" type="text/css" href="dialog_style.css">';
session_start();

include('connect_db.php');

$id_user_from = $_SESSION['id_user'];
$str_from = "SELECT * FROM `user` WHERE id = '" . $id_user_from . "'";
$result_from = $conn->query($str_from)->fetch_assoc();

$id_user_to = $_GET['id_to'];
$str_to = "SELECT * FROM `user` WHERE id = '" . $id_user_to . "'";
$result_to = $conn->query($str_to)->fetch_assoc();
echo '<head>
    <title>Диалог с любителем котиков ' . $result_to['F'] . ' ' . $result_to['I'] . '</title>
    </head>';
// Путь для сохранения загруженных файлов в диалоге
$uploads_dir = "C:/AppServ/www/apenysheva/uploads/";

if (isset($_POST['Sub'])) {
    $image_name = "";
    
    if($_FILES['image']['tmp_name'] != '') {
        $character = '/';
        $position = strpos($_FILES['image']['type'], $character);
        
        $tn = $_FILES['image']['tmp_name'];
        $image_name = time() . '_' . $_POST['message'] . '.' . substr($_FILES['image']['type'], $position+1);
        move_uploaded_file($tn, 'C:/AppServ/www/apenysheva/uploads/' . $image_name);
    }

    // Добавляем сообщение в БД
    $str = 'INSERT INTO message (
        `id_from`, `id_to`, `text`, `image`, `creation`, `status`
    ) VALUES (' . $result_from['id'] . ',' . $result_to['id'] . ',' .
        '"' . $_POST['message'] . '", "' . $image_name . '", NOW(), 1)';
    $conn->query($str);

    header("Location: " . $_SERVER['PHP_SELF'] . "?id_to=" . $id_user_to);
    exit();
}


// Получение сообщений
$messages_from = 'SELECT user.F, user.I, user.O, message.id, message.id_from, message.id_to, message.text, message.image, message.creation, message.status 
FROM `message` JOIN `user` 
ON user.id = ' . $id_user_from . ' AND message.id_from = ' . $id_user_from . ' AND message.id_to = ' . $id_user_to;

$messages_to = 'SELECT user.F, user.I, user.O, message.id, message.id_from, message.id_to, message.text, message.image, message.creation, message.status 
FROM `message` JOIN `user` 
ON user.id = ' . $id_user_to . ' AND message.id_from = ' . $id_user_to . ' AND message.id_to = ' . $id_user_from;

$all_messages = '(' . $messages_from . ') UNION (' . $messages_to . ') ORDER BY creation';
$all_messages_get = $conn->query($all_messages);

$messages_blocks = '';
$from = "from";
$to = "to";

foreach ($all_messages_get as $message) {
    $class_style = $message['id_from'] == $result_from['id'] ? $from : $to;

    // Поиск аватара пользователя
    $user_avatar = "no.webp"; // Картинка по умолчанию
    $user_login = $message['id_from'] == $result_from['id'] ? $result_from['login'] : $result_to['login'];

    $imgs = scandir('C:/AppServ/www/apenysheva/img');
    foreach ($imgs as $img) {
        if (strpos($img, $user_login) !== false) {
            $user_avatar = $img;
            break;
        }
    }

    // Добавление изображения сообщения
    $image_block = "";
    if (!empty($message['image']) && file_exists($uploads_dir . $message['image'])) {
        $image_block = '<br><img src="/apenysheva/uploads/' . $message['image'] . '" class="message_image" />';
    }

    $dateTime = new DateTime($message['creation']);
    $messages_blocks .= '<div class="message_' . $class_style . '">
                            <p>' . $message['text'] . '<br>' . $image_block . 
                            '<p class="time_mes">' . $dateTime->format('H:i') . '</p></p>
                            <a href="/apenysheva/personal_ac.php?id_pers=' . $message['id_from'] . '">
                                <img src="/apenysheva/img/' . $user_avatar . '" class="avatar" />
                            </a>
                        </div>';
}

echo '<div class="mini_message">Вы вошли как ' . $result_from['F'] . ' ' . $result_from['I'] . '
            <div class="exit"><a href="http://localhost/apenysheva/01.php">&#8629</a></div>
        </div>';
echo '<center>
        <div class="head_dialog"><h1>Диалог с пользователем ' . $result_to['F'] . ' ' . $result_to['I']  . '</h1></div>
        <div class="dialog">' . $messages_blocks . '</div>
        <form enctype="multipart/form-data" action="" method="POST" name="myForm"><br>
            <textarea placeholder="Введите сообщение..." name="message" rows="5" cols="60" ></textarea><br>
            <div class="bottom_dialog"><input class="open_img" type="file" name="image" accept="image/*"><br>
            <input class="send_button" type="submit" name="Sub" value="Отправить">
            </div>
        </form>
    </center>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dialog = document.querySelector(".dialog");
            dialog.scrollTop = dialog.scrollHeight;
        });
    </script>';
?>
