<?php
namespace gamepedia\controllers;

use gamepedia\models\Game;
class GameController
{
    public static function representation($rq,$rs,$args){
        $game = Game::find($args['id'])->pluck('id','name','alias','deck','description','original_release_date');
        return $rs->getBody()->write($game->toJson());
    }
    public static function lister($rq,$rs,$args){
        $games = Game::all()->paginate(200)->pluck('id','name','alias','deck','description','original_release_date');
        return $rs->getBody()->write($games->toJson());
    }
}