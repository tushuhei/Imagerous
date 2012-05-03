DROP TABLE IF EXISTS works;

CREATE TABLE works (
    id int(11) unsigned AUTO_INCREMENT NOT NULL,
    article bigint(20) unsigned NOT NULL DEFAULT 0,
    picture bigint(20) unsigned NOT NULL DEFAULT 0,
    imagedata TEXT,
    create_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX(article, picture)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
