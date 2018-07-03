<?php 
	require 'db.php';

	$data = $_POST;

if ( isset($data['do_dop']) ) {
    $name = $data['name'];
    $surname = $data['surname'];
    $patronymic = $data['patronymic'];
    $number = $data['number'];
    $sql = "INSERT INTO log (number, surname,name, patronymic)
	VALUES ('$number','$surname', '$name','$patronymic')";
    if ($connect->query($sql) === TRUE) {
         echo 'Дополнительная информация сохранена!<br/> Можете перейти на <a href="/">главную</a> страницу.</div><hr>';
    } else {
        die('Ой, что-то пошло не так!');
    }


}

?>

<form action="/dop.php" method="POST">
	<strong>Укажите Дополнительную информацию о себе<strong> <br>
            <strong>ФИО вводите английскими буквами!<strong> <br>
	<input type="text" name="name" value="<?php echo @$data['name']; ?>" placeholder="Ваше Имя" required><br/>
	
	<input type="text" name="surname" value="<?php echo @$data['surname']; ?>" placeholder="Ваша Фамилия" required><br/>
	
	<input type="text" name="patronymic" value="<?php echo @$data['patronymic']; ?>" placeholder="Ваше Отчество" required><br/>

	<input type="text" name="number" value="<?php echo @$data['number']; ?>"placeholder="Ваш Телефон" required><br/>
	<button type="submit" name="do_dop">Продолжить</button>
</form>