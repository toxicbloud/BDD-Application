<?php

namespace gamepedia\models;
use gamepedia\models\Game;


class Genre extends \Illuminate\Database\Eloquent\Model

{
    protected $table = "genre";
    protected $primaryKey = "id";
    public $timestamps = false;
    
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game2genre', 'genre_id', 'game_id');
        // return $this->belongsToMany(Game::class)->using(Game2Character::class);
    }
}