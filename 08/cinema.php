<?php



class Cinnema {
    private $visitors = [];
    private $movies = [];

    public function addVisitor(Visitor $visitor) {
        $this->visitors[] = $visitor;
    }

    public function addMovie(Movie $movie) {
        $this->movies[] = $movie;
    }

    public function getVisitors() {
        return $this->visitors;
    }

    public function getMovies() {
        return $this->movies;
    }

    public static function buyTicket(Visitor $visitor, Movie $movie) {
        if ($visitor->getMoney() >= $movie->getCost()) {
            $visitor->setMoney($visitor->getMoney() - $movie->getCost());
            $moneyCheck = true;
        } else {
            throw new Exception('Not enough money');
        }
        if ($visitor->getAge() >= $movie->getRating()) {
            $ageCheck = true;
        } else {
            throw new Exception('Not enough age');
        }
        if ($moneyCheck && $ageCheck) {
            return 'Enjoy the movie!';
        }
    }

    public static function generateVisitors($count) {
        $visitors = [];
        for ($i = 0; $i < $count; $i++) {
            $visitors[] = new Visitor(rand(1, 100), rand(1, 100));
        }
        return $visitors;
    }

    public static function generateMovies($count) {
        $movies = [];
        for ($i = 0; $i < $count; $i++) {
            $movies[] = new Movie('Movie' . $i, rand(1, 100), rand(1, 100));
        }
        return $movies;
    }

    public static function implementCinema() {
        $visitors = Cinnema::generateVisitors(10);
        echo 'Visitors' . PHP_EOL;
        $movies = Cinnema::generateMovies(10);
        echo 'Movies' . PHP_EOL;

        $cinnema = new Cinnema();
        echo 'Cinnema' . PHP_EOL;

        foreach ($visitors as $visitor) {
            $cinnema->addVisitor($visitor);
            $visitor->toString();
        }

        foreach ($movies as $movie) {
            $cinnema->addMovie($movie);
            $movie->toString();
        }

        foreach ($cinnema->getVisitors() as $visitor) {
            foreach ($cinnema->getMovies() as $movie) {
                try {
                    echo Cinnema::buyTicket($visitor, $movie) . PHP_EOL;
                } catch (Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }
            }
        }
    }
}

echo Cinnema::implementCinema();