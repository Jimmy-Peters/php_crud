<?php
	
	include('conn.php');

	$id = $_GET['q'];
	$query = "select id, name, phone, email from contacts where id='$id';";

	$run_query = mysqli_query($conn, $query);

	$contact=mysqli_fetch_object($run_query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>

	<h1>Edit</h1>
	<hr>

<!--Create Contact Form-->
	<form method="POST" action="update.php?q=<?= $contact->id; ?>">
		<fieldset>
			<legend>Contact</legend>
				<table>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" value="<?= $contact->name ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" value="<?= $contact->email ?>"></td>
					</tr>
					<tr>
						<td>phone</td>
						<td><input type="text" name="phone" value="<?= $contact->phone ?>"></td>		
					</tr>
				<hr>
					<tr>
						<td colspan="2">
							<button type="submit" name="submit"> Update Contact </button>
						</td>
					</tr>			
				</table>		
		
		</fieldset>
	</form>

</body>
</html>