CREATE TABLE job_registration (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    programming_language VARCHAR(100),
    experience_years INT,
    portfolio_link VARCHAR(255),
    employment_status ENUM('Employed', 'Unemployed', 'Freelancer'),
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);
