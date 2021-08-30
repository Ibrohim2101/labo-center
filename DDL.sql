CREATE TABLE users
(
    id                BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    name              VARCHAR(255)    NOT NULL,
    email             VARCHAR(255)    NOT NULL,
    email_verified_at TIMESTAMP       NULL,
    password          VARCHAR(255)    NOT NULL,
    remember_token    VARCHAR(100)    NULL,
    created_at        TIMESTAMP       NULL,
    updated_at        TIMESTAMP       NULL,
    chat_id           BIGINT UNSIGNED NULL,
    CONSTRAINT users_email_unique
        UNIQUE (email)
)
    COLLATE = utf8mb4_unicode_ci,
    ENGINE = InnoDB;


CREATE TABLE applications
(
    id         BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    name       VARCHAR(255) NOT NULL,
    phone      VARCHAR(255) NOT NULL,
    message    TEXT         NULL,
    created_at TIMESTAMP    NULL,
    updated_at TIMESTAMP    NULL
)
    COLLATE = utf8mb4_unicode_ci,
    ENGINE = InnoDB;


CREATE TABLE password_resets
(
    email      VARCHAR(255) NOT NULL,
    token      VARCHAR(255) NOT NULL,
    created_at TIMESTAMP    NULL
)
    COLLATE = utf8mb4_unicode_ci,
    ENGINE = InnoDB;

CREATE INDEX password_resets_email_index
    ON password_resets (email);

CREATE TABLE migrations
(
    id        INT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch     INT          NOT NULL
)
    COLLATE = utf8mb4_unicode_ci,
    ENGINE = InnoDB;

CREATE TABLE failed_jobs
(
    id         BIGINT UNSIGNED AUTO_INCREMENT
        PRIMARY KEY,
    uuid       VARCHAR(255)                        NOT NULL,
    connection TEXT                                NOT NULL,
    queue      TEXT                                NOT NULL,
    payload    LONGTEXT                            NOT NULL,
    exception  LONGTEXT                            NOT NULL,
    failed_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT failed_jobs_uuid_unique
        UNIQUE (uuid)
)
    COLLATE = utf8mb4_unicode_ci,
    ENGINE = InnoDB;



