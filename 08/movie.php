<?php

class Movie {
    private $title;
    private $cost;
    private $rating;

    public function __construct($title, $cost, $rating) {
        $this->title = $title;
        $this->cost = $cost;
        $this->rating = $rating;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getCost() {
        return $this->cost;
    }

    public function getRating() {
        return $this->rating;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setCost($cost) {
        $this->cost = $cost;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function __toString() {
        return "Movie title: {$this->title}, cost: {$this->cost}, rating: {$this->rating}";
    }
}