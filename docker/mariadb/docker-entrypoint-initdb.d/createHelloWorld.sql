CREATE TABLE `greetings` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `greeting` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `greetings` (
    `greeting`
) VALUES (
    "Hello world!"
);