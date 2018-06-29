<?php 
	require 'db.php';

	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if ( $user )
		{
			if ( password_verify($data['password'], $user->password) )
			{
				$_SESSION['logged_user'] = $user;
				echo 'Вы авторизованы!<br/> Можете перейти на <a href="/dop.php">главную</a> страницу.</div><hr>';
		
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}

		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		
		if ( ! empty($errors) )
		{
			echo '<div id="errors">' .array_shift($errors). '</div><hr>';
		}

	}

?>


<form action="login.php" method="POST">
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"placeholder="Ваш Логин" required><br/>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>"placeholder="Ваш Пароль" required><br/>

	<button type="submit" name="do_login">Войти</button>
</form>

