<?php

namespace gamepedia\models;
use gamepedia\models\Game;


class User extends \Illuminate\Database\Eloquent\Model

{
    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_User', 'id');
    }
}