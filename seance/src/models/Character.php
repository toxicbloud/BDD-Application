<?php

namespace gamepedia\models;
use gamepedia\models\Game;


class Character extends \Illuminate\Database\Eloquent\Model

{
    protected $table = "character";
    protected $primaryKey = "id";
    public $timestamps = false;
    
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game2character', 'character_id', 'game_id');
        // return $this->belongsToMany(Game::class)->using(Game2Character::class);
    }
}