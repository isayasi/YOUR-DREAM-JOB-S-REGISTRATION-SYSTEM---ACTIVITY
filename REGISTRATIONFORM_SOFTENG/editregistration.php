<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Developer Registration</title>
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
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php 
    // Check if registration_id is set
    if (!isset($_GET['registration_id'])) {
        echo "No registration ID provided.";
        exit;
    }

    // Fetch registration data
    $getRegistrationById = getRegistrationByID($pdo, $_GET['registration_id']);
    if (!$getRegistrationById) {
        echo "No registration found with that ID.";
        exit;
    }
    ?>
    
    <form action="core/handleForms.php?registration_id=<?php echo $_GET['registration_id']; ?>" method="POST">
        <p>
            <label for="firstName">First Name</label> 
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($getRegistrationById['first_name']); ?>">
        </p>
        <p>
            <label for="lastName">Last Name</label> 
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($getRegistrationById['last_name']); ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($getRegistrationById['email']); ?>">
        </p>
        <p>
            <label for="programmingLanguage">Programming Language</label>
            <input type="text" name="programmingLanguage" value="<?php echo htmlspecialchars($getRegistrationById['programming_language']); ?>">
        </p>
        <p>
            <label for="experienceYears">Years of Experience</label>
            <input type="text" name="experienceYears" value="<?php echo htmlspecialchars($getRegistrationById['experience_years']); ?>">
        </p>
        <p>
            <label for="portfolioLink">Portfolio Link</label>
            <input type="text" name="portfolioLink" value="<?php echo htmlspecialchars($getRegistrationById['portfolio_link']); ?>">
        </p>
        <p>
            <label for="employmentStatus">Employment Status</label>
            <input type="text" name="employmentStatus" value="<?php echo htmlspecialchars($getRegistrationById['employment_status']); ?>">
        </p>
        <p>
            <input type="submit" name="editRegistrationBtn" value="Update">
        </p>
    </form>
</body>
</html>
