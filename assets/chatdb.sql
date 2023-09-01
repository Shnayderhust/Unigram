CREATE TABLE users (
  user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(200) NOT NULL,
  lastname VARCHAR(120) NOT NULL,
  username VARCHAR(40) NOT NULL,
  email VARCHAR(200) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  profile_pic VARCHAR(300) NOT NULL DEFAULT 'avatar.jpg',
  `status` TINYINT(1) NOT NULL DEFAULT 0
);
CREATE TABLE `conversation` (
  conver_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user1_id INT(11),
  user2_id INT(11),
  `timestamp` TIMESTAMP NOT NULL,
  FOREIGN KEY (user1_id) REFERENCES users(user_id),
  FOREIGN KEY (user2_id) REFERENCES users(user_id)
);
CREATE TABLE messages (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  conversation_id INT(11) NOT NULL,
  sender_id INT(11) NOT NULL,
  receiver_id INT(11) NOT NULL,
  `message` TEXT NOT NULL,
  `timestamp` TIMESTAMP NOT NULL,
  read_status TINYINT(1),
  FOREIGN KEY (conversation_id) REFERENCES `conversation`(conver_id),
  FOREIGN KEY (sender_id) REFERENCES users(user_id)
);
CREATE TABLE contact (
  user_id INT(11) NOT NULL,
  contact_id INT(11) NOT NULL,
  PRIMARY KEY (user_id, contact_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (contact_id) REFERENCES users(user_id)
);
CREATE TABLE notification (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  receiver_id INT(11),
  sender_id INT(11),
  message_id INT(11),
  time_stamp TIMESTAMP,
  FOREIGN KEY (receiver_id) REFERENCES users(user_id),
  FOREIGN KEY (sender_id) REFERENCES users(user_id),
  FOREIGN KEY (message_id) REFERENCES messages(id)
);