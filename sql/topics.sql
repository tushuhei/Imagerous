DROP TABLE IF EXISTS topics;

CREATE TABLE topics (
    id VARCHAR(255) NOT NULL,
    topic VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO topics VALUES ("1HinM", "声優");
INSERT INTO topics VALUES ("1HinJ", "美人すぎる");
INSERT INTO topics VALUES ("1Lvil", "ミスキャンパス");
INSERT INTO topics VALUES ("1Hinr", "アニメの壁紙");
INSERT INTO topics VALUES ("1Hiow", "壁紙");

DROP TABLE IF EXISTS recommends;

CREATE TABLE recommends (
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    name text NOT NULL,
    url text NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
