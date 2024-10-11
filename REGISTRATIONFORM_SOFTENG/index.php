<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Software Developer Registration</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div class="container">
		<h1>Welcome to the Software Developer Registration System</h1>
		<form action="core/handleForms.php" method="POST">
			<p><label for="firstName">First Name</label> <input type="text" name="firstName" required></p>
			<p><label for="lastName">Last Name</label> <input type="text" name="lastName" required></p>
			<p><label for="email">Email</label> <input type="email" name="email" required></p>
			<p><label for="programmingLanguage">Primary Programming Language</label> <input type="text" name="programmingLanguage" required></p>
			<p><label for="experienceYears">Years of Experience</label> <input type="number" name="experienceYears" required></p>
			<p><label for="portfolioLink">Portfolio Link</label> <input type="url" name="portfolioLink"></p>
			<p><label for="employmentStatus">Employment Status</label>
				<select name="employmentStatus" required>
					<option value="Employed">Employed</option>
					<option value="Unemployed">Unemployed</option>
					<option value="Freelancer">Freelancer</option>
				</select>
			</p>
			<input type="submit" name="newRegisterBtn" value="Register">
		</form>

		<table>
			<tr>
				<th>Registration ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Primary Programming Language</th>
				<th>Years of Experience</th>
				<th>Portfolio Link</th>
				<th>Employment Status</th>
				<th>Date Applied</th>
				<th>Action</th>
			</tr>
		
			<?php $seeAllDeveloperRecords = seeAllRecords($pdo); ?>
			<?php foreach ($seeAllDeveloperRecords as $row) { ?>
				<tr>
					<td><?php echo $row['registration_id']; ?></td>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['programming_language']; ?></td>
					<td><?php echo $row['experience_years']; ?></td>
					<td><?php echo $row['portfolio_link']; ?></td>
					<td><?php echo $row['employment_status']; ?></td>
					<td><?php echo $row['date_applied']; ?></td>
					<td>
						<a href="editregistration.php?registration_id=<?php echo $row['registration_id']; ?>">Edit</a>
						<a href="deleteregistration.php?registration_id=<?php echo $row['registration_id']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>
