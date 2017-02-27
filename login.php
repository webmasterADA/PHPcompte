<?php 
	include_once("connect.php");

	if(isset($_POST['login_btn']) && isset($_POST['login']) && isset($_POST['password']))
	{
		$login = $_POST['login'];
		$password = $_POST['password'];

		if(!empty($login) && !empty($password))
		{
			$select = "SELECT login, password FROM users WHERE status = 1 AND login = '$login' ";
			
			$results = $link->query($select);

			if ($results->num_rows == 1)
			{
				$row = $results->fetch_assoc();

				$encode_password = sha1(md5($password.$salt));

				if ($row["password"] == $encode_password)
				{
					echo "mot de passe correct";
				}
				else
				{
					echo "mot de passe ou login incorrect";
				}
			}
			else
			{
				echo "1 mot de passe ou login incorrect";
			}
		}
	}
?>

<form action="" method="POST">
	<input name="login" type="text" required />
	<input name="password" type="password" required />
	<input name ="login_btn" value="se connecter" type="submit" />
</form>