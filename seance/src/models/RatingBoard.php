<?php

namespace gamepedia\models;
use gamepedia\models\Game;


// class RatingBoard extends \Illuminate\Database\Eloquent\Model

// {
//     protected $table = "game_rating";
//     protected $primaryKey = "id";
//     public $timestamps = false;
    
//     public function ratings()
//     {
//         return $this->hasMany(Rating::class, 'game2rating', 'rating_id', 'rating_board_id');
//     }
// }
use Illuminate\Database\Eloquent\Model;

class RatingBoard extends Model{

  protected $table = 'rating_board';
  protected $primaryKey = 'id';

}