
CREATE TABLE Comment (
                ID INT NOT NULL,
                author VARCHAR(50) NOT NULL,
                content TEXT NOT NULL,
                status VARCHAR(50) NOT NULL,
                creation_timestamp DATETIME NOT NULL,
                PRIMARY KEY (ID)
);


CREATE TABLE Article (
                ID INT NOT NULL,
                title VARCHAR(100) NOT NULL,
                excerpt TEXT,
                content TEXT,
                last_edit_timestamp DATETIME NOT NULL,
                comment_id INT NOT NULL,
                PRIMARY KEY (ID)
);


CREATE TABLE Moderator (
                ID INT NOT NULL,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                password VARCHAR(30) NOT NULL,
                signup_timestamp DATETIME NOT NULL,
                article_id INT NOT NULL,
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