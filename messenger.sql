create database messenger;

use messenger;

CREATE TABLE users (
    id int (11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR (100) not null,
    password VARCHAR (225) not null,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE messages (
    id int (
        11 AUTO_INCREMENT PRIMARY KEY,
        user_id int (11) not null
    ),
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ROREING KEY (user_id) REFERENCES users (id)
);