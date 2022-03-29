<?php

namespace gamepedia\models;

use gamepedia\models\Character;

class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "game";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'game2character', 'game_id', 'character_id');
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'game_developers', 'game_id', 'comp_id');
    }
    // public function rating()
    // {
    //     return $this->hasOne(RatingBoard::class, 'game2rating', 'rating_id', 'rating_board_id');
    // }
    public function ratings()
    {
        return $this->belongsToMany(
            'gamepedia\models\GameRating',
            'game2rating',
            'game_id',
            'rating_id'
        );
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_Game', 'id');
    }
    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game2platform', 'game_id', 'platform_id');
    }
}
