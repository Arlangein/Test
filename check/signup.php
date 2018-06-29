<?php 
	require 'db.php';

	$data = $_POST;

	if ( isset($data['do_signup']) )
	{
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}

		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно!';
		}

		if ( R::count('log', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
    
		if ( R::count('log', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким Email уже существует!';
		}

		);
		if ( empty($errors) )
		{
			$user = R::dispense('log');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
			R::store($user);
			echo '<div style="color:dreen;">Вы успешно зарегистрированы!</div><hr>';
		}else
		{
			echo '<div id="errors">' .array_shift($errors). '</div><hr>';
		}

	}

?>

<form action="/signup.php" method="POST">
	<input type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Ваш Логин" required><br/>

	<input type="email" name="email" value="<?php echo @$data['email']; ?>"placeholder="Ваша Почта" required><br/>

	<input type="password" name="password" value="<?php echo @$data['password']; ?>"placeholder="Ваш Пароль" required><br/>

	<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"placeholder="Повторите Пароль" required><br/>
	<button type="submit" name="do_signup">Регистрация</button>
</form>