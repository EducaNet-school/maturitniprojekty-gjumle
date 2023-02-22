--1
CREATE VIEW film_actors_count AS
SELECT movie.name, COUNT(DISTINCT m2c2a2aw.actor_id) as actors_count
FROM movie
INNER JOIN m2c2a2aw ON movie.mid = m2c2a2aw.movie_id
GROUP BY movie.mid;

SELECT * FROM film_actors_count;

--2
CREATE VIEW actors_in_movies AS
SELECT actor.f_name, actor.l_name, movie.name as movie_name
FROM actor
LEFT JOIN m2c2a2aw ON actor.aid = m2c2a2aw.actor_id
LEFT JOIN movie ON m2c2a2aw.movie_id = movie.mid;

SELECT * FROM actors_in_movies;

--3
CREATE VIEW longest_movies_by_category AS
SELECT movie.mid, movie.name, movie.length, movie.release_date, category.name AS category_name
FROM movie
INNER JOIN m2c2a2aw ON movie.mid = m2c2a2aw.movie_id
INNER JOIN category ON m2c2a2aw.category_id = category.cid
WHERE NOT EXISTS (
    SELECT 1 FROM movie m2
    INNER JOIN m2c2a2aw m2a2c ON m2.mid = m2a2c.movie_id
    WHERE m2a2c.category_id = category.cid AND m2.length > movie.length
);

SELECT * FROM longest_movies_by_category;

--4
CREATE VIEW movies_by_award_count AS
SELECT movie.name, COUNT(m2c2a2aw.award_id) AS award_count
FROM movie
LEFT JOIN m2c2a2aw ON movie.mid = m2c2a2aw.movie_id
GROUP BY movie.mid
ORDER BY award_count DESC;

SELECT * FROM  movies_by_award_count;

--5
CREATE VIEW comedies_actors AS
SELECT DISTINCT actor.f_name, actor.l_name
FROM actor
INNER JOIN m2c2a2aw ON actor.aid = m2c2a2aw.actor_id
INNER JOIN category ON m2c2a2aw.category_id = category.cid
WHERE category.name = 'Comedy';

SELECT * FROM comedies_actors;
