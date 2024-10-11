<?php
require_once 'dbConfig.php'; // Include database configuration
require_once 'models.php'; // Include model functions

// Handle new registration submission
if (isset($_POST['newRegisterBtn'])) {
    $firstName = trim($_POST['firstName']); // Sanitize first name
    $lastName = trim($_POST['lastName']); // Sanitize last name
    $email = trim($_POST['email']); // Sanitize email
    $programmingLanguage = trim($_POST['programmingLanguage']); // Sanitize programming language
    $experienceYears = trim($_POST['experienceYears']); // Sanitize years of experience
    $portfolioLink = trim($_POST['portfolioLink']); // Sanitize portfolio link
    $employmentStatus = trim($_POST['employmentStatus']); // Sanitize employment status

    $query = insertNewDeveloper($pdo, $firstName, $lastName, $email, $programmingLanguage, $experienceYears, $portfolioLink, $employmentStatus); // Insert new developer

    if ($query) {
        header("Location: ../index.php"); // Redirect on success
    } else {
        echo "Registration failed."; // Error message
    }
}

// Handle registration edit submission
if (isset($_POST['editRegistrationBtn'])) {
    $registration_id = $_GET['registration_id']; // Get registration ID from URL
    $firstName = trim($_POST['firstName']); // Sanitize input
    $lastName = trim($_POST['lastName']); // Sanitize input
    $email = trim($_POST['email']); // Sanitize input
    $programming_language = trim($_POST['programmingLanguage']); // Sanitize input
    $experience_years = trim($_POST['experienceYears']); // Sanitize input
    $portfolio_link = trim($_POST['portfolioLink']); // Sanitize input
    $employment_status = trim($_POST['employmentStatus']); // Sanitize input

    // Validate all required fields
    if (!empty($registration_id) && !empty($firstName) && !empty($lastName) && 
        !empty($email) && !empty($programming_language) && 
        !empty($experience_years) && !empty($portfolio_link) && 
        !empty($employment_status)) {
        
        $query = updateRegistration($pdo, $registration_id, $firstName, $lastName, 
                                     $email, $programming_language, 
                                     $experience_years, $portfolio_link, 
                                     $employment_status); // Update registration

        if ($query) {
            header("Location: ../index.php"); // Redirect on success
            exit; // Terminate script after redirect
        } else {
            echo "Update failed"; // Error message
        }
    } else {
        echo "Make sure that no fields are empty"; // Validation error message
    }
}

// Handle developer record deletion
if (isset($_POST['deleteDeveloperBtn'])) {
    $registration_id = $_GET['registration_id']; // Get registration ID from URL
    $query = deleteRegistration($pdo, $registration_id); // Call delete function

    if ($query) {
        header("Location: ../index.php"); // Redirect on success
        exit; // Terminate script after redirect
    } else {
        echo "Deletion failed"; // Error message
    }
}
?>