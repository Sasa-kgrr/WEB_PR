<?php

if ($_SESSION['role'] == 0) {
    // Администратор — показываем всю информацию
    $sql = "SELECT user.*, city.name, city.lat, city.lng 
            FROM `user`
            LEFT JOIN `city` ON user.id_city = city.id";
} else {
    // Обычный пользователь — скрываем login, password и дату регистрации
    $sql = "SELECT user.id, user.F, user.I, user.O, user.email, user.birth, user.id_city, user.login, city.name, city.lat, city.lng 
            FROM `user`
            LEFT JOIN `city` ON user.id_city = city.id";
}

$result = $conn->query($sql);
?>