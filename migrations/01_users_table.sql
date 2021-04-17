/* ========= MIGRATE ========= */

CREATE TABLE `users` (
    `id` BIGINT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

/* ========= ROLLBACK ========= */

DROP TABLE IF EXISTS `users`;