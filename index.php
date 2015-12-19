<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
</head>
<body>
<?php
	if(@$_POST['submit']){
		require_once 'Validx.php';

		$rules=[
			'name'=>'required||min:5',
			'email'=>'required||email',
			'password'=>'required||min:5',
			'repassword'=>'same:password'
		];

		$msg=[
			'email'=>[
				'email'=>'This is not an email'
			]
		];

		$valid=\Nahidz\Validx::validate($_POST, $rules, $msg);

		if($valid->hasErrors()){
			foreach ($valid->allErrors() as $err) {
				echo '<li>'.$err.'</li>';			}
		}
	}
?>
<form action="" method="post">
	<label>name</label><br/>
	<input type="text" name="name"/><br/>
	
	<label>email</label><br/>
	<input type="text" name="email"/><br/>
	
	<label>password</label><br/>
	<input type="password" name="password"/><br/>	
	<label>re password</label><br/>
	<input type="password" name="repassword"/><br/><br/>

	<input type="submit" name="submit" value="submit">

</form>
</body>
</html>