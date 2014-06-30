<?php

if(isset($_POST['rno'])&&isset($_POST['pass']))
{
$rollno = $_POST['rno'];
$password = $_POST['pass'];
	if(!empty($rollno)&&!empty($password))
	{
	$query = "SELECT `id` FROM `register` WHERE `roll_no` ='$rollno' AND `password` ='$password';";
	if($query_run = mysql_query($query))
	{
	$query_num_rows = mysql_num_rows($query_run);
	if($query_num_rows==0)
		{echo 'Invalid Rollno and Password combination'; 
		}
	else if($query_num_rows==1)
		{$user_id = mysql_result($query_run,0,'id');
		 
		 $_SESSION['user_id'] = $user_id;
		 $_SESSION['rollno'] = $rollno;
		 header('Location: index.php');
		
		}
	}
	
	}
}

?>

<center><h1>DELTA</h1><br>
<form action="<?php echo $current_file; ?>" method="POST">
<fieldset style="width: 350px;">
<legend>Sign in</legend>
<LABEL>Roll no:</LABEL>
			&nbsp;&nbsp;&nbsp;<input type = "text" name = "rno" placeholder = "Roll number">
			<br>
			<LABEL>Password:</LABEL>
			<input type = "password" name = "pass" placeholder = "Password">
			<br><br>
			
			<input type = "submit" value = "Login">
</fieldset>
</form>
</center>
