<?php
require_once 'dbConfig.php'; // Include database configuration

// Function to insert new developer
function insertNewDeveloper($pdo, $firstName, $lastName, $email, $programmingLanguage, $experienceYears, $portfolioLink, $employmentStatus) {
    $sql = "INSERT INTO job_registration (first_name, last_name, email, programming_language, experience_years, portfolio_link, employment_status, date_applied) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())"; // SQL query
    $stmt = $pdo->prepare($sql); // Prepare statement
    $executeQuery = $stmt->execute([$firstName, $lastName, $email, $programmingLanguage, $experienceYears, $portfolioLink, $employmentStatus]); // Execute query

    return $executeQuery; // Return execution result
}

// Function to see all records
function seeAllRecords($pdo) {
    $sql = "SELECT * FROM job_registration"; // SQL query
    $stmt = $pdo->prepare($sql); // Prepare statement
    $stmt->execute(); // Execute query
    return $stmt->fetchAll(); // Return all records
}

// Function to get registration by ID
function getRegistrationByID($pdo, $registration_id) {
    $sql = "SELECT * FROM job_registration WHERE registration_id = ?"; // SQL query
    $stmt = $pdo->prepare($sql); // Prepare statement
    if ($stmt->execute([$registration_id])) { // Execute query with ID
        return $stmt->fetch(); // Return record
    }
    return null; // Return null if not found
}

// Function to update registration
function updateRegistration($pdo, $registration_id, $first_name, $last_name, 
    $email, $programming_language, $experience_years, $portfolio_link, $employment_status) {
    
    $sql = "UPDATE job_registration 
            SET first_name = ?, 
                last_name = ?, 
                email = ?, 
                programming_language = ?, 
                experience_years = ?, 
                portfolio_link = ?, 
                employment_status = ? 
            WHERE registration_id = ?"; // SQL query
    $stmt = $pdo->prepare($sql); // Prepare statement
    
    return $stmt->execute([$first_name, $last_name, $email, 
        $programming_language, $experience_years, $portfolio_link, $employment_status, $registration_id]); // Execute and return result
}

// Function to delete registration
function deleteRegistration($pdo, $registration_id) {
    $sql = "DELETE FROM job_registration WHERE registration_id = ?"; // SQL query
    $stmt = $pdo->prepare($sql); // Prepare statement

    $executeQuery = $stmt->execute([$registration_id]); // Execute delete

    return $executeQuery; // Return result
}
?>
