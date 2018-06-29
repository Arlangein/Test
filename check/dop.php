<?php 
	require 'db.php';

	$data = $_POST;

	if ( isset($data['do_signup']) )
	{
		$errors = array();
		
		if ( R::count('log', "number = ?", array($data['number'])) > 0)
		{
			$errors[] = 'Этот номер уже привязан к другому Пользователю!';
		}
		
		if ( empty($errors) )
		{
			$user = R::dispense('log');
			$user->name = $data['name'];
			$user->surname = $data['surname'];
		    $user->patronymic = $data['patronymic'];
		    $user->number = $data['number'];
			R::store($user);
			echo 'Дополнительная информация сохранена!<br/> Можете перейти на <a href="/">главную</a> страницу.</div><hr>';
		}else
		{
			echo '<div id="errors">' .array_shift($errors). '</div><hr>';
		}

	}

?>

<form action="/dop.php" method="POST">
	<strong>Укажите Дополнительную информацию о себе<strong> <br>
	<input type="text" name="name" value="<?php echo @$data['name']; ?>" placeholder="Ваше Имя" required><br/>
	
	<input type="text" name="surname" value="<?php echo @$data['surname']; ?>" placeholder="Ваше Фамилия" required><br/>
	
	<input type="text" name="patronymic" value="<?php echo @$data['patronymic']; ?>" placeholder="Ваше Отчество" required><br/>

	<input type="text" name="number" value="<?php echo @$data['number']; ?>"placeholder="Ваш Телефон" required><br/>
	<button type="submit" name="do_signup">Продолжить</button>
</form>