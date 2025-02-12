<?php
echo '<link rel="stylesheet" type="text/css" href="style.css">';

session_start();

$showRegistrationForm = false; //флаг для отображения формы регистрации


if ($_GET['act'] == 'regform') 
{
    $showRegistrationForm = true; 
}

$loggedin = 0; //флаг, подтверждающий авторизацию

if($_GET['act'] == 'logout')
{
    $_SESSION['id_user'] = ''; 
    $loggedin = 0;
}

if($_SESSION['id_user'] != '')
{
    $loggedin = 1;
}

$exitt = '';

if (isset($_POST['login1'])) 
{
    $str = "select * from `user` where login = '" . $_POST['login1'] . "' and password = '" . md5($_POST['password1']) . "'";
    $result = $conn->query($str)->fetch_assoc();
    echo '<head>
    <title>Вы любитель котиков ' . $result['F'] . ' ' . $result['I'] . '</title>
    </head>';
    $cls = "";
    if ($result == '') 
    {
        $cls = "errorCl";
        // echo 'Неверный логин или пароль';
    } 
    else 
    {
        $_SESSION['id_user'] = $result['id'];
        $_SESSION['role'] = $result['role'];
        $loggedin = 1;
        $id_user = $result['id_user'];
    }
}

if($_SESSION['id_user'] != '')
{
    $id_user = $_SESSION['id_user'];
    $str = "select * from `user` where id = '" . $id_user . "'";
    $result= $conn->query($str)->fetch_assoc();
}

if($loggedin != 1)
{
    echo '<center>
    <div class="container">
        <p class="header">Авторизация</p>
        <form action="/apenysheva/01.php" method="POST">
            <input type="text" class="' . $cls . '" placeholder="login" name="login1">
            <input type="password" class="'  . $cls . '" placeholder="password" name="password1"><br><br>
            <input type="submit" class="button" name="loginSubmit" value="Войти">
            <a href="?act=regform"><input type="button" class="button" name="registrSubmit" value="Зарегистрироваться"></a>
        </form>
 
        </div>
	</center>';	
}
else
{

    echo '<div class="mini_message">Вы вошли как ' . $result['F'] . ' ' . $result['I'] . '
        <div class="exit"><a href="?act=logout">&#8629</a></div>
    </div>';
    
}

?>
