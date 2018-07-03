<?php 
	require 'db.php';

	$data = $_POST;
	if ( isset($data['do_login']) ) {
        $login = $data['login'];
        $password = $data['password'];
        $user = mysqli_query($connect, "SELECT `id` FROM `logs` WHERE `login` = '$login' AND `password` = '$password'");
        $id_user = mysqli_fetch_array($user);

        if (empty($id_user['id']))
        {
            $info_input = 'Введенные данные не верны';
        }
        else
        {
            $_SESSION['password'] = $password;
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $id_user['id'];

            $info_input = 'Вы успешно вошли в систему';
        }



$info_input = isset($info_input) ? $info_input : NULL;
echo $info_input;
    }
?>


<form action="login.php" method="POST">
	<strong>Логин</strong>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>

	<strong>Пароль</strong>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>

	<button type="submit" name="do_login">Войти</button>
</form>