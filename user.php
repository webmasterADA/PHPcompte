<?php 
	include_once("connect.php");

	if(isset($_POST['add']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$email = $_POST['email'];

		if(!empty($firstname) && !empty($lastname) && !empty($login) && !empty($email) && !empty($password) && !empty($repassword))
		{
			if($password === $repassword)
			{
				$password = sha1(md5($password.$salt));

				$insertRequest = "INSERT INTO users (firstname, lastname, login, password, email) VALUES ('$firstname', '$lastname', '$login', '$password', '$email')";
				$link->query($insertRequest);
			}
		}
	}
?>
<form action="" method="POST">
	<input name="firstname" type="text" />
	<input name="lastname" type="text" />
	<input name="login" type="text" />
	<input name="password" type="password" />
	<input name="repassword" type="password" />
	<input name="email" type="email" />
	<input name ="add" value="Enregistrer" type="submit" />
</form>
