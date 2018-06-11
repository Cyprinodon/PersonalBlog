
CREATE TABLE Comment (
                ID INT NOT NULL,
                author VARCHAR DEFAULT Visiteur anonyme NOT NULL,
                content VARCHAR NOT NULL,
                status VARCHAR DEFAULT À valider NOT NULL,
                creation_timestamp DATETIME NOT NULL,
                PRIMARY KEY (ID)
);


CREATE TABLE Article (
                ID INT NOT NULL,
                title VARCHAR DEFAULT Article title NOT NULL,
                excerpt VARCHAR,
                content VARCHAR,
                last_edit_timestamp DATETIME NOT NULL,
                comment_id INT,
                PRIMARY KEY (ID)
);


CREATE TABLE Moderator (
                ID INT NOT NULL,
                first_name VARCHAR DEFAULT Unnamed NOT NULL,
                last_name VARCHAR DEFAULT Unnamed NOT NULL,
                password VARCHAR NOT NULL,
                signup_timestamp DATETIME NOT NULL,
                article_id INT,
                PRIMARY KEY (ID)
);


ALTER TABLE Article ADD CONSTRAINT comment_article_fk
FOREIGN KEY (comment_id)
REFERENCES Comment (ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Moderator ADD CONSTRAINT article_moderator_fk
FOREIGN KEY (article_id)
REFERENCES Article (ID)
ON DELETE NO ACTION
ON UPDATE NO ACTION;