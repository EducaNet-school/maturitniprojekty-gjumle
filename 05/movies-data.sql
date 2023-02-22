INSERT INTO movie (name, description, length, release_date)
VALUES
    ('The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 175, '1972-03-24'),
    ('The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 142, '1994-09-23'),
    ('The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 152, '2008-07-18'),
    ('Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 154, '1994-10-14'),
    ('The Godfather: Part II', 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.', 202, '1974-12-20'),
    ('The Lord of the Rings: The Return of the King', 'Gandalf and Aragorn lead the World of Men against Saurons army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 201, '2003-12-17'),
    ('Forrest Gump', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.', 142, '1994-07-06'),
    ('Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 148, '2010-07-16');

INSERT INTO category (name)
VALUES
    ('Drama'),
    ('Action'),
    ('Crime'),
    ('Adventure'),
    ('Comedy');

INSERT INTO actor (f_name, l_name)
VALUES
    ('Marlon', 'Brando'),
    ('Tim', 'Robbins'),
    ('Morgan', 'Freeman'),
    ('Christian', 'Bale'),
    ('John', 'Travolta'),
    ('Samuel L.', 'Jackson'),
    ('Al', 'Pacino'),
    ('Robert', 'De Niro'),
    ('Tom', 'Hanks'),
    ('Leonardo', 'DiCaprio'),
    ('Ellen', 'Page'),
    ('Cillian', 'Murphy'),
    ('Gary', 'Oldman'),
    ('Viggo', 'Mortensen');

INSERT INTO award (description, date, place)
VALUES
    ('Best Picture', '1973-04-02', 'Dorothy Chandler Pavilion, Los Angeles'),
    ('Best Actor', '1973-04-02', 'Dorothy Chandler Pavilion, Los Angeles'),
    ('Best Picture', '1995-03-27', 'Shrine Auditorium, Los Angeles'),
    ('Best Adapted Screenplay', '1995-03-27', 'Shrine Auditorium, Los Angeles'),
    ('Best Actor in a Supporting Role', '1995-03-27', 'Shrine Auditorium, Los Angeles'),
    ('Best Director', '1995-03-27', 'Shrine Auditorium, Los Angeles'),
    ('Best Picture', '2004-02-29', 'Kodak Theatre, Los Angeles'),
    ('Best Director', '2004-02-29', 'Kodak Theatre, Los Angeles'),
    ('Best Adapted Screenplay', '2004-02-29', 'Kodak Theatre, Los Angeles'),
    ('Best Picture', '2004-02-29', 'Kodak Theatre, Los Angeles'),
    ('Best Original Screenplay', '2011-02-27', 'Kodak Theatre, Los Angeles'),
    ('Best Cinematography', '2011-02-27', 'Kodak Theatre, Los Angeles'),
    ('Best Sound Editing', '2011-02-27', 'Kodak Theatre, Los Angeles');

INSERT INTO m2c2a2aw (movie_id, category_id, actor_id, award_id)
VALUES
    (1, 1, 1, 1),
    (1, 3, 1, 0),
    (2, 1, 2, 2),
    (2, 5, 2, 0),
    (3, 2, 4, 0),
    (3, 1, 4, 0),
    (3, 3, 5, 0),
    (3, 5, 5, 0),
    (4, 1, 6, 0),
    (4, 3, 6, 0),
    (5, 1, 1, 1),
    (5, 3, 1, 0),
    (5, 4, 1, 0),
    (6, 4, 7, 3),
    (6, 1, 7, 0),
    (6, 3, 8, 0),
    (7, 5, 9, 0),
    (7, 1, 10, 0),
    (8, 2, 11, 11),
    (8, 1, 12, 11),
    (8, 2, 13, 0);
