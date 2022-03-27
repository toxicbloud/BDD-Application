<?php

namespace gamepedia\models;
use gamepedia\models\Game;

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "company";
    protected $primaryKey = "id";
    public $timestamps = false;
    
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_developers', 'comp_id', 'game_id');
    }
}
