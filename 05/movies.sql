"C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\binaries\mysql\bin\mysql.exe" -u movie_manager -p

CREATE DATABASE movies;

CREATE USER 'movie_manager'@'localhost' IDENTIFIED BY 'mm'; 

GRANT ALL ON movies.* TO 'movie_manager'@'localhost';

CREATE TABLE movie (
    mid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    length INT NOT NULL,
    release_date DATE NOT NULL
);

CREATE TABLE category (
    cid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE actor (
    aid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    f_name VARCHAR(255) NOT NULL,
    l_name VARCHAR(255) NOT NULL
);

CREATE TABLE award (
    awid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    date date NOT NULL,
    place VARCHAR(255) NOT NULL
);

CREATE TABLE m2c2a2aw (
    m2c2a2awid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    category_id INT NOT NULL,
    actor_id INT NOT NULL,
    award_id INT NOT NULL,
    CONSTRAINT fk_m2m FOREIGN KEY (movie_id) REFERENCES movie(mid),
    CONSTRAINT fk_c2c FOREIGN KEY (category_id) REFERENCES category(cid),
    CONSTRAINT fk_a2a FOREIGN KEY (actor_id) REFERENCES actor(aid),
    CONSTRAINT fk_aw2aw FOREIGN KEY (award_id) REFERENCES award(awid)
);

// Test Data

INSERT INTO movie (name, description, length, release_date)
VALUES ('The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 175, '1972-03-24'),
       ('The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 142, '1994-09-23'),
       ('The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 152, '2008-07-18');

INSERT INTO category (name)
VALUES ('Crime'),
       ('Drama'),
       ('Action');

INSERT INTO actor (f_name, l_name)
VALUES ('Marlon', 'Brando'),
       ('Tim', 'Robbins'),
       ('Morgan', 'Freeman'),
       ('Heath', 'Ledger');

INSERT INTO award (description, date, place)
VALUES ('Best Picture', '1973-04-02', 'Dorothy Chandler Pavilion, Los Angeles, California'),
       ('Best Supporting Actor', '1995-03-27', 'Dorothy Chandler Pavilion, Los Angeles, California'),
       ('Best Supporting Actor', '2009-02-22', 'Dolby Theatre, Los Angeles, California');

INSERT INTO m2c2a2aw (movie_id, category_id, actor_id, award_id)
VALUES (1, 1, 1, 1),
       (1, 2, 1, NULL),
       (1, 1, 2, NULL),
       (1, 2, 2, NULL),
       (1, 1, 3, NULL),
       (2, 2, 2, NULL),
       (2, 2, 3, NULL),
       (3, 3, 4, 3);

// VIEW

CREATE VIEW movie_category_view AS
SELECT m.mid, m.name, m.description, m.length, m.release_date, c.name AS category_name
FROM movie m
JOIN m2c2a2aw mca ON m.mid = mca.movie_id
JOIN category c ON c.cid = mca.category_id;

CREATE VIEW movie_award_view AS
SELECT m.name AS movie_name, a.f_name AS actor_first_name, a.l_name AS actor_last_name, aw.description AS award_description, aw.date AS award_date, aw.place AS award_place
FROM movie m
JOIN m2c2a2aw mca ON m.mid = mca.movie_id
JOIN actor a ON a.aid = mca.actor_id
LEFT JOIN award aw ON aw.awid = mca.award_id;

CREATE VIEW actor_award_count_view AS
SELECT a.f_name, a.l_name, COUNT(mca.award_id) AS award_count
FROM actor a
LEFT JOIN m2c2a2aw mca ON mca.actor_id = a.aid
WHERE mca.award_id IS NOT NULL
GROUP BY a.aid;

// Show Views

SELECT *
FROM movie_category_view;

SELECT *
FROM movie_award_view;

SELECT *
FROM actor_award_count_view;
