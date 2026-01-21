CREATE DATABASE IF NOT EXISTS real_finalproject;
USE real_finalproject;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- STUDENTS TABLE
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    score INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- DEFAULT ADMIN USER
INSERT INTO users (username, email, password, role)
VALUES (
    'admin',
    'admin@example.com',
    -- password is "admin123"
    '$2y$10$/pe33xHtzwfGmUkUcIVf3eSx9I1RTKKJAFPXz2IEKfWNkEOcuDqn6',
    'admin'
);