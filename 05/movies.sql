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