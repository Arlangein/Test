<?php 
	require 'db.php';

	$data = $_POST;

	if ( isset($data['do_signup']) ) {
	$login=($data['login']);
    $email=($data['email']);
    $password=($data['password']);
    $r_password=($data['r_password']);
	if ($password==$r_password) {
	}
    else{
            echo('Пароли не совпадают');}
        $sql ="INSERT INTO logs (login,password,email)
	VALUES ('$login','$password','$email')";
	if ($connect->query($sql) === TRUE) {
        echo 'Вы успешно<br/><a href="/Dop.php">Зарегестрированны</a></div><hr>';
	}
	else {
		echo('Почта или Логин уже заняты!');

	}


}

?>

<form action="/signup.php" method="POST">
	<input type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Ваш Логин" required><br/>

	<input type="email" name="email" value="<?php echo @$data['email']; ?>"placeholder="Ваша Почта" required><br/>

	<input type="password" name="password" value="<?php echo @$data['password']; ?>"placeholder="Ваш Пароль" required><br/>

	<input type="password" name="r_password" value="<?php echo @$data['r_password']; ?>"placeholder="Повторите Пароль" required><br/>
	<button type="submit" name="do_signup">Регистрация</button>
</form>