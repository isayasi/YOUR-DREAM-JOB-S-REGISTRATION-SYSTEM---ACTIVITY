<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Registration</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        body {
            font-family: "Arial";
            color: white;
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
        .studentContainer {
            border: 1px solid black;
            padding: 20px;
            margin: 20px;
            font-family: 'Arial';
            color: white;
        }

    </style>
</head>
<body>
    <h1>Are you sure you want to delete this registration?</h1>
    <?php $getDeveloperById = getRegistrationByID($pdo, $_GET['registration_id']); ?>
    <form action="core/handleForms.php?registration_id=<?php echo $_GET['registration_id']; ?>" method="POST">
        <div class="studentContainer">
            <p>First Name: <?php echo htmlspecialchars($getDeveloperById['first_name']); ?></p>
            <p>Last Name: <?php echo htmlspecialchars($getDeveloperById['last_name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($getDeveloperById['email']); ?></p>
            <p>Programming Language: <?php echo htmlspecialchars($getDeveloperById['programming_language']); ?></p>
            <p>Years of Experience: <?php echo htmlspecialchars($getDeveloperById['experience_years']); ?></p>
            <p>Portfolio Link: <?php echo htmlspecialchars($getDeveloperById['portfolio_link']); ?></p>
            <p>Employment Status: <?php echo htmlspecialchars($getDeveloperById['employment_status']); ?></p>
            <input type="submit" name="deleteDeveloperBtn" value="Delete">
        </div>
    </form>
</body>
</html>
