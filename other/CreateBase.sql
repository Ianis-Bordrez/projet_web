CREATE TABLE account (
    account_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(61) NOT NULL,
    description LONGTEXT,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('PLAYER','ADMIN') DEFAULT 'PLAYER',
    last_activity timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE player (
    player_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    name VARCHAR(20) NOT NULL,
    class ENUM('NINJA', 'SHAMAN', 'SURA', 'WARRIOR') NOT NULL,
    hp INT(11) NOT NULL,
    mp INT(11) NOT NULL,
    level INT(11) NOT NULL,
    gold INT(11) NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    point INT(11) NOT NULL DEFAULT 0
);

CREATE TABLE inventory (
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    item_id INT(11) NOT NULL REFERENCES item(item_id),
    window ENUM('EQUIPEMENT', 'INVENTORY') DEFAULT 'INVENTORY',
    count SMALLINT(4) NOT NULL
);

CREATE TABLE item (
    item_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    type ENUM('WEAPON', 'ARMOR', 'HELMET', 'SHIELD', 'NECKLACE', 'EARRING', 'BOOTS', 'BRACELET', 'OTHER') NOT NULL,
    sub_type ENUM('SWORD','TWO_HAND', 'DAGGERS', 'BOW', 'BELL', 'FAN', 'NONE') DEFAULT 'NONE',
    size TINYINT(2) NOT NULL
);

CREATE TABLE post (
    post_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    title VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE answer (
    answer_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_id INT(11) NOT NULL REFERENCES posts(post_id),
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    title VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE private_message (
    message_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sender_id INT(11) NOT NULL REFERENCES account(account_id),
    receiver_id INT(11) NOT NULL REFERENCES account(account_id),
    message LONGTEXT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 0,
    message_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE news (
    new_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    title VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);