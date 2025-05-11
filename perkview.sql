CREATE DATABASE perkview;
USE perkview;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    referral_code VARCHAR(50)
);

INSERT INTO users (full_name, email, password, username, referral_code)
VALUES ('John Doe', 'john@example.com', 'securepassword', 'johndoe', 'REF123');
