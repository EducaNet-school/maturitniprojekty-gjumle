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
)

CREATE TABLE actor (
    aid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    f_name VARCHAR(255) NOT NULL,
    l_name VARCHAR(255) NOT NULL
)

CREATE TABLE award (
    awid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    date date NOT NULL,
    place VARCHAR(255) NOT NULL
)

CREATE TABLE m2c2a2aw (
    m2c2a2awid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    category_id INT NO NULL,
    actor_id INT NOT NULL,
    award_id INT NOT NULL,
    FOREIGN KEY movie_id REFERENCES movie(mid),
    FOREIGN KEY category_id REFERENCES category(cid),
    FOREIGN KEY actor_id REFERENCES actor(aid),
    FOREIGN KEY award_id REFERENCES award(awid)
)