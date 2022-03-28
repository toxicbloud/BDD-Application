<?php
require_once('vendor/autoload.php');
require_once('conf/db.php');

use gamepedia\models\Game;
use gamepedia\models\Company;
use gamepedia\models\Platform;
use gamepedia\models\Character;
use gamepedia\models\RatingBoard;
use gamepedia\models\Genre;
use gamepedia\models\Comment;
use gamepedia\models\User;
use Faker\Factory;

use Illuminate\Database\Capsule\Manager as DB;

DB::connection()->enableQueryLog();

//utilisation de Faker
$factory = Factory::create();
$game = Game::find(12342);
for ($i=1; $i <=25000; $i++) { 
    $user = new User();
    $user->nom = $factory->name;
    $user->prenom = $factory->name;
    $user->email = $factory->unique()->email;
    $user->numero = $factory->phoneNumber;
    $user->dateNaissance = $factory->dateTime;
    $user->save();
    $nombreCommentaire = rand(1,20); // nombre de commentaire par user
    for ($j=1; $j <= $nombreCommentaire; $j++) { 
        $comment = new Comment();
        $comment->content = $factory->text;
        $comment->titre = $factory->catchPhrase;
        $comment->user()->associate($user);
        $comment->id_Game = $factory->numberBetween(1,47000);
        // $comment->game()->associate($game);
        $comment->save();
    }
}

