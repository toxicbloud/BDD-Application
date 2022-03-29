<?php

namespace gamepedia\controllers;

use gamepedia\models\Game;
use gamepedia\models\Comment;
use gamepedia\models\User;

class GameController
{
    public static function representation($rq, $rs, $args)
    {
        $game = Game::select('id', 'name', 'alias', 'deck', 'description', 'original_release_date')->where('id', $args['id'])->first();
        $platforms = $game->platforms()->get(array('id', 'name','alias'));
        $obj = (object) [
            'game' => $game,
            'platforms' => $platforms,
            'links' => ['comments' => ['href'=>"/api/games/".$args['id']."/comments"], 'characters' => ['href'=>"/api/games/".$args['id']."/characters"]]
        ];
        return $rs = $rs->withJson($obj);
    }
    public static function lister($rq, $rs, $args)
    {
        $games = Game::select('id', 'name', 'alias', 'deck', 'description', 'original_release_date')->paginate(200);
        $games->withPath('/api/games');
        return $rs = $rs->withJson($games);
    }
    public static function listerComments($rq, $rs, $args)
    {
        $comments = Game::find($args['id'])->comments()->with('user')->select('id', 'titre', 'content', 'created_at', 'id_User')->orderBy('created_at', 'desc')->paginate(200);
        $comments->withPath('/api/games/' . $args['id'] . '/comments');
        return $rs = $rs->withJson($comments);
    }
    public static function listerCharacters($rq, $rs, $args)
    {
        $characters = Game::find($args['id'])->characters()->select('id', 'name', 'created_at')->paginate(200); 
        $characters->withPath('/api/games/' . $args['id'] . '/characters');
        $char2 = [];
        foreach ($characters as $character) {
            $char2[] = ['character'=>$character, 'links'=>['self' => ['href' => '/api/characters/' . $character->id]]];
        }
        $obj = (object) [
            'characters' => $char2,
            'links' => ['comments' => ['href'=>"/api/games/".$args['id']."/comments"], 'characters' => ['href'=>"/api/games/".$args['id']."/characters"]]
        ];
        return $rs = $rs->withJson($obj);
    }
    public static function ajouterComment($rq, $rs, $args)
    {
        if(!isset($data['titre']) || !isset($data['content']) || !isset($data['id_User']))
            return $rs = $rs->withJson(['error' => 'Missing parameters'], 400);
        $data = $rq->getParsedBody();
        $comment = new Comment();
        $comment->titre = $data['titre'];
        $comment->content = $data['content'];
        $comment->game()->associate(Game::find($args['id']));
        $comment->user()->associate(User::find($rq->getParam('id_User')));
        $comment->save();
        // set header location
        $rs = $rs->withHeader('Location', '/api/games/' . $args['id'] . '/comments/' . $comment->id);
        return $rs->withStatus(201);
    }
}