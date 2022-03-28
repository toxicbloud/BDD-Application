<?php

namespace gamepedia\models;
use gamepedia\models\Game;


class Comment extends \Illuminate\Database\Eloquent\Model

{
    protected $table = "comment";
    protected $primaryKey = "id";
    public $timestamps = true;
    
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_User', 'id');
    }
    public function game(){
        return $this->belongsTo(Game::class, 'id_Game', 'id');
    }
}