<?php
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo '<head>
    <title>Любители котиков</title>
</head>';

include('connect_db.php');
include('login.php');
include('user_city.php');

// Всплывающая форма подтверждения удаления пользователя
if (isset($_GET['confirm_delete']) && $_SESSION['role'] == 0) {
    $delete_id = $_GET['confirm_delete']; 
    echo '<div class="confirm_delete">
            <p>Вы уверены, что хотите удалить запись с ID: ' . $delete_id . '?</p>
            <form method="POST">
                <input type="hidden" name="delete_id" value="' . $delete_id . '">
                <input type="submit" name="confirmDeleteUser" value="Подтвердить" class="confirm-button">
                <a href="?" class="cancel-button">Отмена</a>
            </form>
          </div>';
}

// Удалени пользователя после подтверждения
if (isset($_POST['confirmDeleteUser']) && $_SESSION['role'] == 0) {
    $delete_id = $_POST['delete_id']; 
    $delete_sql = "DELETE FROM `user` WHERE id = " . $delete_id;

    if ($conn->query($delete_sql)) {
        // Перенаправляем пользователя на ту же страницу без параметров в URL
        header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
        exit();
    } else {
        echo '<div class="error_message">Ошибка при удалении записи.</div>';
    }
}

$name_img ='';

if (isset($_POST['mySubmit'])) {
	$post = $_POST;
	$err= '';
	$cl =["","","","","", "","",""];
	if ($_POST['F'] == ''){
		$err= $err . 'Не введена фамилия<br>';
		$cl[0] = "errorCl";
	} 

	if ($_POST['I'] == ''){
		$err= $err . 'Не введено имя<br>';
		$cl[1] = "errorCl";
	} 

	if ($_POST['login'] == ''){
		$err= $err . 'Не введен логин<br>';
		$cl[2] = "errorCl";
	} 

	if ($_POST['password'] == ''){
		$err= $err . 'Не введен пароль<br>';
		$cl[3] = "errorCl";
	} 

	if ($_POST['email'] == ''){
		$err= $err . 'Не введен email<br>';
		$cl[4] = "errorCl";
	} 

	if ($_POST['birth'] == ''){
		$err= $err . 'Не введена дата рождения<br>';
		$cl[5] = "errorCl";
	}
	if ($_POST['id_city'] == ''){
		$err= $err . 'Не введен город<br>';
		$cl[6] = "errorCl";
	}
	if ($_POST['password'] != $_POST['password2']){ 
		$err= $err . 'Введены разные пароли<br>';
		$cl[7]= "errorCl";
	}
	
	if ($err == ''){
			if($_FILES['avatar']['tmp_name']!='')
			{	
				$character   = '/';
				$position = strpos($_FILES['avatar']['type'], $character);
				
				$tn = $_FILES['avatar']['tmp_name'];
				$name_img = $_POST['login'] . '.' . substr($_FILES['avatar']['type'], $position+1);
				echo print_r($name_img);
				move_uploaded_file($tn, 'C:\AppServ\www\apenysheva\img\\' . $name_img); //помещение файла в папку 
			}
			
			$str = 'insert into `user` (
			`F`, `I`, `O`, `email`, `birth`, `login`, `password`, `registration`, `id_city`' . 
			') VALUES ("' . $_POST['F'] . '","' . $_POST['I'] . '","' . $_POST['O'] . '","' . $_POST['email'] . '",' . 
			'"' . $_POST['birth'] . '","' . $_POST['login'] . '","' . md5($_POST['password']) . '", NOW() ,"' . $_POST['id_city'] . '")';
			$conn->query($str);
			$post = '';
			$cl =["","","","","", "",""];
		}  

	else {
		echo '<center><div class="error_div">' . $err . '</div><center>';
		}
}

$str_city = 'SELECT * FROM `city`';
$cit = $conn->query($str_city);
// записываем в массив список городов
$arr = [];
for ($i = 0; $i < $cit->num_rows; $i++) {
    $arr[$i] = $cit->fetch_assoc();
}
if($loggedin != 1 and $showRegistrationForm)
{
	echo '<center>
	<div class="container">
		<p class="header">Регистрация</p>
		<form enctype="multipart/form-data" action="" method="POST" href="" name="myForm"><br>
			<input type="file" class="input_file" id="avatar" name="avatar"><br>			
			<input type="text" class="' .$cl[0] . '" placeholder="Фамилия" name="F" id="F" value=' . $post['F'] . '><br>
			<input type="text" class="' .$cl[1] .'" placeholder="Имя" name="I" id="I" value=' . $post['I'] . '><br>
			<input type="text"  placeholder="Отчество" name="O" id="O" value=' . $post['O'] . '><br>
			<input type="email" class="' .$cl[4] .'" placeholder="email" name="email" id="email" value=' . $post['email'] . '><br>
			<input type="date" class="' .$cl[5] .'" placeholder="Дата рождения" name="birth" id="birth" value=' . $post['birth'] . '><br>
			<input type="text" class="' .$cl[2] .'" placeholder="login" name="login" id="login" value=' . $post['login'] . '><br>
			<input type="password" class="' .$cl[3] .'" placeholder="password" name="password" id="password" value=' . $post['password'] . '><br>
			<input type="password" class="' .$cl[7] .'" placeholder="password" name="password2" id="password2" value=' . $post['password2'] . '><br>
			<select type="number" class="' .$cl[6] .'"  name="id_city" name="id_city" value=' . $post['id_city'] . '>
                <option value="" disabled selected>Город</option>';
				for($i=0; $i < $cit->num_rows; $i++){
					echo '<option value="' . $arr[$i]['id'] . '">' . $arr[$i]['name'] . '</option>';
				}
				echo '</select><br><br>
			<input type="submit" class="button" name="mySubmit"><br>
			</form>
	</div>
</center>';
}

if($loggedin == 1)
{

	//проверка выбран ли фильтр для города
	$id_city_filtr = isset($_GET['city_filter']) ? $_GET['city_filter'] : '';

    $fullSql = $sql . $whereClause;
	if ($id_city_filtr != '') {
		$fullSql .= " WHERE `user`.`id_city` = " . $id_city_filtr; 
	}
    $result_output = $conn->query($fullSql);

    if ($result_output) {     

		if($result_output->num_rows > 0) {
			echo '<div>
				<form method="get">
					<select name="city_filter" onchange="this.form.submit()">
						<option value="">Все города</option>';
						for($i = 0; $i < $cit->num_rows; $i++) {
							$selected = ($arr[$i]['id'] == $id_city_filtr) ? 'selected' : '';  
							echo '<option value="' . $arr[$i]['id'] . '" ' . $selected . '>' . $arr[$i]['name'] . '</option>';
						}
				echo '</select>
				</form><br><br>';

			echo '<div><table border=1>';
			
			if ($_SESSION['role'] == 0) {
				// полный вывод таблицы для администратора
				echo '<tr>
						<th>№</th><th>Фамилия</th><th>Имя</th><th>Отчество</th>
						<th>email</th><th>Дата рождения</th><th>login</th><th>password</th>
						<th>Дата регистрации</th><th>id_city</th>
						<th>Название города</th><th>Аватар</th><th>Диалог</th><th>Действия</th>
					</tr>';
			} else {
				// упрощенный вывод таблицы для обычного пользователя
				echo '<tr>
						<th>№</th><th>Фамилия</th><th>Имя</th><th>Отчество</th>
						<th>email</th><th>Дата рождения</th><th>Название города</th><th>Аватар</th><th>Диалог</th>
					</tr>';
			}
						
			while($row = $result_output->fetch_assoc()) {
				$img_name = "";
				$imgs = scandir('C:\AppServ\www\apenysheva\img');
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
				
				if ($_SESSION['role'] == 0) {
				echo '<tr data-city="' . $row['id_city'] . '">
						<td>' . $row['id'] . '</td><td>' . $row['F'] . '</td><td>' . $row['I'] . '</td><td>' . $row['O'] . '</td>
						<td>' . $row['email'] . '</td><td>' . $row['birth'] . '</td><td>' . $row['login'] . '</td><td>' . $row['password'] . '</td>
						<td>' . $row['registration'] . '</td><td>' . $row['id_city'] . '</td>
						<td>'  . '<a href="https://yandex.ru/maps/?ll=' . $row['lng'] . ',' . $row['lat'] . '&z=10" target="_blank">' . $row['name'] . '</a></td>
						<td><a href="/apenysheva/personal_ac.php?id_pers=' . $row['id'] .  '"><img src="/apenysheva/img/' . $img_name . '" height="100" width="100"></a></td>
						<td>' . '<a href="/apenysheva/message.php?id_to=' . $row['id'] .  '">Написать...</td><td>';
						if($row['role'] == 1)
						{
							echo '<a href="?confirm_delete=' . $row['id'] . '" class="delete_button">Удалить</a>';
						}
					echo '</td></tr>';
				} else {
					echo '<tr>
					<td>' . $row['id'] . '</td><td>' . $row['F'] . '</td><td>' . $row['I'] . '</td><td>' . $row['O'] . '</td>
					<td>' . $row['email'] . '</td><td>' . $row['birth'] . '</td>
					<td>' . '<a href="https://yandex.ru/maps/?ll=' . $row['lng'] . ',' . $row['lat'] . '&z=10" target="_blank">' . $row['name'] . '</a></td>
					<td><a href="/apenysheva/personal_ac.php?id_pers=' . $row['id'] .  '"><img src="/apenysheva/img/' . $img_name . '" height="100" width="100"></a></td>
					<td><a href="/apenysheva/message.php?id_to=' . $row['id'] . '">Написать...</a></td>
				</tr>';
				}
			}
				
			echo '</table></div>';
		}
	} 
	
} $conn->close();
?>
