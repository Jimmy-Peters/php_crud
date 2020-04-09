<?php
	include('conn.php');

	if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		$query="insert into `contacts` (name, email, phone) values ('$name','$email',$phone);";

		if (mysqli_query($conn, $query)) {
			echo '<strong style="color:green">Contact Has Been Added</strong>';	
		}

	}

	$query="select * from contacts";
	$runquery = mysqli_query($conn, $query);
	#print_r(mysqli_fetch_object($run));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contacts</title>
</head>
<body>

	<h1>Contacts</h1>
	<hr>

<!--Create Contact Form-->
	<form method="POST" action="index.php">
		<fieldset>
			<legend>Contacts Form</legend>
				<table>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email"></td>
					</tr>
					<tr>
						<td>phone</td>
						<td><input type="text" name="phone"></td>		
					</tr>
				<hr>
					<tr>
						<td colspan="2">
							<button type="submit" name="submit"> Create Contact </button>
						</td>
					</tr>			
				</table>		
		
		</fieldset>
	</form>
	
	<br>

	<?php

	if ($runquery->num_rows == 0 ){
		echo "<strong style='color:green'>No data found.</strong>";
	} else {

?>

		<!--Contact List-->
	<fieldset>
		<legend>Contacts List</legend>

		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td>#ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Action</td>
			</tr>
			<?php while ($contact=mysqli_fetch_object($runquery)): ?>
				<tr>
					<td><?= $contact->id; ?></td>
					<td><?= $contact->name; ?></td>
					<td><?= $contact->email; ?></td>
					<td><?= $contact->phone; ?></td>
					<td><a href="delete.php?q=<?=$contact->id; ?>" onclick= "return confirm('Are you sure you want to delete this?')"><button>Delete</button></a>

					<a href="details.php?q=<?=$contact->id; ?>"><button>Details</button></a>

					<a href="edit.php?q=<?=$contact->id; ?>"><button>Update</button></a>
					
						</td>
				</tr>
			<?php endwhile; ?>
		</table>
	</fieldset>		

<?php } ?>

</body>
</html>