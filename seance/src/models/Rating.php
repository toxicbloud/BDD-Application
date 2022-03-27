<?php

namespace gamepedia\models;
use gamepedia\models\Game;


class Rating extends \Illuminate\Database\Eloquent\Model

{
    protected $table = "game_rating";
    protected $primaryKey = "id";
    public $timestamps = false;
    
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game2rating', 'character_id', 'game_id');
    }
}