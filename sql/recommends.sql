DROP TABLE IF EXISTS recommends;

CREATE TABLE recommends (
    id bigint(20) unsigned NOT NULL DEFAULT 0,
    thumb TEXT,
    title TEXT,
    create_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
