<?php

function autoloadModel($className)
{
    $filename = "./" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
spl_autoload_register("autoloadModel");

class Cinnema
{
    private $visitors = [];
    private $movies = [];

    public function addVisitor(Visitor $visitor)
    {
        $this->visitors[] = $visitor;
    }

    public function addMovie(Movie $movie)
    {
        $this->movies[] = $movie;
    }

    public function getVisitors()
    {
        return $this->visitors;
    }

    public function getMovies()
    {
        return $this->movies;
    }

    public static function getRatingAsAge($rating)
    {
        switch ($rating) {
            case 'G':
                return 0;
                break;
            case 'PG':
                return 10;
                break;
            case 'PG-13':
                return 13;
                break;
            case 'R':
                return 17;
                break;
            case 'NC-17':
                return 18;
                break;
        }
    }

    public static function buyTicket(Visitor $visitor, Movie $movie)
    {
        if ($visitor->getMoney() >= $movie->getCost()) {
            $visitor->setMoney($visitor->getMoney() - $movie->getCost());
            $moneyCheck = true;
        } else {
            throw new Exception('Not enough money');
        }
        $ratingsAsAge = Cinnema::getRatingAsAge($movie->getRating());
        if ($visitor->getAge() >= $ratingsAsAge) {
            $ageCheck = true;
        } else {
            throw new Exception('Not enough age');
        }
        if ($moneyCheck && $ageCheck) {
            return 'Enjoy the movie!';
        }
    }

    public static function generateVisitors($count)
    {
        $visitors = [];
        for ($i = 0; $i < $count; $i++) {
            $visitors[] = new Visitor(rand(1, 100), rand(59, 259));
        }
        return $visitors;
    }

    public static function generateMovies($count)
    {
        $ratings = array('G', 'PG', 'PG-13', 'R', 'NC-17');
        $consts = array(129, 149, 169);
        $titles = array('Predator', 'Pulp Fiction', 'The Matrix', 'The Terminator', 'The Godfather', 'The Shawshank Redemption', 'The Dark Knight', 'The Lord of the Rings: The Return of the King', 'The Good, the Bad and the Ugly', 'Fight Club');
        $movies = [];
        for ($i = 0; $i < $count; $i++) {
            $movies[] = new Movie($titles[$i], $consts[rand(0, 2)], $ratings[rand(0, 4)]);
        }
        return $movies;
    }

    public static function implementCinnema()
    {
        $visitors = Cinnema::generateVisitors(10);
        $movies = Cinnema::generateMovies(10);

        $cinnema = new Cinnema();

        foreach ($visitors as $visitor) {
            $cinnema->addVisitor($visitor);
        }

        foreach ($movies as $movie) {
            $cinnema->addMovie($movie);
        }

        foreach ($visitors as $visitor) {
            echo 'Visitor money: ' . $visitor->getMoney() . PHP_EOL;
            echo '<br>';
            echo 'Visitor age: ' . $visitor->getAge() . PHP_EOL;
            echo '<br>';
            echo 'Movie title: ' . $movies[0]->getTitle() . PHP_EOL;
            echo '<br>';
            echo 'Movie cost: ' . $movies[0]->getCost() . PHP_EOL;
            echo '<br>';
            echo 'Movie rating: ' . $movies[0]->getRating() . PHP_EOL;
            echo '<br>';
            try {
                echo Cinnema::buyTicket($visitor, $movie) . PHP_EOL;
                echo '<br>';
                echo '<br>';
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
                echo '<br>';
                echo '<br>';
            }
        }
    }
}

Cinnema::implementCinnema();
