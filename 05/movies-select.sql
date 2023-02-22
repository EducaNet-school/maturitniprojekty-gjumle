--1
CREATE VIEW film_actors_count AS
SELECT movie.name, COUNT(DISTINCT m2c2a2aw.actor_id) as actors_count
FROM movie
INNER JOIN m2c2a2aw ON movie.mid = m2c2a2aw.movie_id
GROUP BY movie.mid;

SELECT * FROM film_actors_count;

+--------------------------+--------------+
| name                     | actors_count |
+--------------------------+--------------+
| The Godfather            |            3 |
| The Shawshank Redemption |            2 |
| The Dark Knight          |            2 |
| The Godfather            |            1 |
| The Shawshank Redemption |            1 |
| The Dark Knight          |            2 |
| Pulp Fiction             |            2 |
| The Godfather: Part II   |            3 |
+--------------------------+--------------+

--2
CREATE VIEW actors_in_movies AS
SELECT actor.f_name, actor.l_name, movie.name as movie_name
FROM actor
LEFT JOIN m2c2a2aw ON actor.aid = m2c2a2aw.actor_id
LEFT JOIN movie ON m2c2a2aw.movie_id = movie.mid;

SELECT * FROM actors_in_movies;

+-----------+-----------+--------------------------+
| f_name    | l_name    | movie_name               |
+-----------+-----------+--------------------------+
| Marlon    | Brando    | The Godfather            |
| Marlon    | Brando    | The Godfather            |
| Marlon    | Brando    | The Godfather            |
| Marlon    | Brando    | The Godfather            |
| Marlon    | Brando    | The Shawshank Redemption |
| Marlon    | Brando    | The Shawshank Redemption |
| Marlon    | Brando    | The Shawshank Redemption |
| Tim       | Robbins   | The Godfather            |
| Tim       | Robbins   | The Godfather            |
| Tim       | Robbins   | The Shawshank Redemption |
| Tim       | Robbins   | The Shawshank Redemption |
| Tim       | Robbins   | The Shawshank Redemption |
| Morgan    | Freeman   | The Godfather            |
| Morgan    | Freeman   | The Shawshank Redemption |
| Heath     | Ledger    | The Dark Knight          |
| Heath     | Ledger    | The Dark Knight          |
| Heath     | Ledger    | The Dark Knight          |
| Marlon    | Brando    | The Dark Knight          |
| Marlon    | Brando    | The Dark Knight          |
| Tim       | Robbins   | The Godfather            |
| Tim       | Robbins   | The Godfather            |
| Morgan    | Freeman   | The Dark Knight          |
| Morgan    | Freeman   | The Dark Knight          |
| Christian | Bale      | The Dark Knight          |
| John      | Travolta  | Pulp Fiction             |
| Samuel L. | Jackson   | Pulp Fiction             |
| Al        | Pacino    | The Godfather: Part II   |
| Robert    | De Niro   | The Godfather: Part II   |
| Tom       | Hanks     | The Godfather: Part II   |
| Leonardo  | DiCaprio  | NULL                     |
| Ellen     | Page      | NULL                     |
| Cillian   | Murphy    | NULL                     |
| Gary      | Oldman    | NULL                     |
| Viggo     | Mortensen | NULL                     |
+-----------+-----------+--------------------------+

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

+-----+------------------------+--------+--------------+---------------+
| mid | name                   | length | release_date | category_name |
+-----+------------------------+--------+--------------+---------------+
|   8 | The Godfather: Part II |    202 | 1974-12-20   | Crime         |
|   8 | The Godfather: Part II |    202 | 1974-12-20   | Drama         |
|   8 | The Godfather: Part II |    202 | 1974-12-20   | Drama         |
|   1 | The Godfather          |    175 | 1972-03-24   | Action        |
|   4 | The Godfather          |    175 | 1972-03-24   | Action        |
|   6 | The Dark Knight        |    152 | 2008-07-18   | Drama         |
|   7 | Pulp Fiction           |    154 | 1994-10-14   | Action        |
+-----+------------------------+--------+--------------+---------------+

--4
CREATE VIEW movies_by_award_count AS
SELECT movie.name, COUNT(m2c2a2aw.award_id) AS award_count
FROM movie
LEFT JOIN m2c2a2aw ON movie.mid = m2c2a2aw.movie_id
GROUP BY movie.mid
ORDER BY award_count DESC;

SELECT * FROM  movies_by_award_count;

+-----------------------------------------------+-------------+
| name                                          | award_count |
+-----------------------------------------------+-------------+
| The Godfather                                 |           7 |
| The Dark Knight                               |           5 |
| The Shawshank Redemption                      |           4 |
| The Shawshank Redemption                      |           3 |
| The Dark Knight                               |           3 |
| The Godfather: Part II                        |           3 |
| The Godfather                                 |           2 |
| Pulp Fiction                                  |           2 |
| The Lord of the Rings: The Return of the King |           0 |
| Forrest Gump                                  |           0 |
| Inception                                     |           0 |
+-----------------------------------------------+-------------+

--5
CREATE VIEW comedies_actors AS
SELECT DISTINCT actor.f_name, actor.l_name
FROM actor
INNER JOIN m2c2a2aw ON actor.aid = m2c2a2aw.actor_id
INNER JOIN category ON m2c2a2aw.category_id = category.cid
WHERE category.name = 'Comedy';

SELECT * FROM comedies_actors;
