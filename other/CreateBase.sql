CREATE TABLE account (
    account_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(61) NOT NULL,
    description LONGTEXT,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NULL,
    creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('PLAYER','ADMIN') NOT NULL DEFAULT 'PLAYER',
    last_activity TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE player (
    player_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    name VARCHAR(20) NOT NULL,
    class ENUM('NINJA', 'SHAMAN', 'SURA', 'WARRIOR') NOT NULL,
    gender ENUM('MALE','FEMALE') NOT NULL,
    hp INT(11) NOT NULL DEFAULT 100,
    mp INT(11) NOT NULL DEFAULT 100,
    level INT(11) NOT NULL DEFAULT 1,
    gold INT(11) NOT NULL DEFAULT 0,
    creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    point INT(11) NOT NULL DEFAULT 0
);

CREATE TABLE inventory (
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    item_id INT(11) NOT NULL REFERENCES item(item_id),
    window ENUM('EQUIPEMENT', 'INVENTORY') DEFAULT 'INVENTORY',
    count SMALLINT(4) NOT NULL
);

CREATE TABLE `item` (
`item_id` INT (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` varchar (20) NOT NULL,
`type` enum('WEAPON','ARMOR','OTHER') NOT NULL,
`sub_type` enum('SWORD','TWO_HAND','DAGGERS','BOW','BELL','FAN','BODY','HELMET','SHIELD','NECKLACE','EARRING','BOOTS','BRACELET','NONE') DEFAULT 'NONE',
`size` tinyint(2) NOT NULL,
`price` int(11) NOT NULL,
`level` int(11) NOT NULL
);

CREATE TABLE post (
    post_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    title VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL,
    creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE answer (
    answer_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_id INT(11) NOT NULL REFERENCES posts(post_id),
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    title VARCHAR(20) NOT NULL,
    content LONGTEXT NOT NULL,
    creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE private_message (
    message_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sender_id INT(11) NOT NULL REFERENCES account(account_id),
    receiver_id INT(11) NOT NULL REFERENCES account(account_id),
    message LONGTEXT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 0,
    message_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE news (
    new_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    account_id INT(11) NOT NULL REFERENCES account(account_id),
    title VARCHAR(40) NOT NULL,
    content LONGTEXT NOT NULL,
    creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);