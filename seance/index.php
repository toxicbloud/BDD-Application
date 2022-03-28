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
use gamepedia\controllers\GameController;

use Illuminate\Database\Capsule\Manager as DB;

DB::connection()->enableQueryLog();

$NEW_LINE = '<br>';
if (PHP_SAPI === 'cli')
  $NEW_LINE = PHP_EOL;
/*
$jeux = Game::where('name', 'like', '%Mario%')->get();
echo "Jeux avec 'Mario' dans leur nom:".$NEW_LINE;
foreach ($jeux as $jeu) {
    echo $jeu->name . $NEW_LINE;
}
echo "Compagnies basees au Japon :".$NEW_LINE;
$company = Company::where('location_country', 'like', '%Japan%')->get();
foreach ($company as $comp) {
    echo $comp->name . $NEW_LINE;
}
echo "Plateformes dont la base installee est superieur a 10 000 000 :".$NEW_LINE;
$platforms = Platform::where('install_base', '>=', '10000000')->get();
foreach ($platforms as $platform) {
    echo $platform->name . $NEW_LINE;
}
echo "Lister 442 jeux à partir du 21173eme :".$NEW_LINE;
$jeux = Game::where('id', '>=', '21173')->take(442)->get();
foreach ($jeux as $jeu) {
    echo $jeu->name . $NEW_LINE;
}
echo "lister les jeux et afficher le nom du jeu et son deck pagination 500 par page :".$NEW_LINE;
$jeux = Game::select('name')->addSelect('deck')->paginate(500);
foreach ($jeux as $jeu) {
    echo $jeu->name . $NEW_LINE;
    echo $jeu->deck . $NEW_LINE;
    $index++;
}


echo 'personnage du jeu 12342 :'.$NEW_LINE;
$characters = Game::find(12342)->characters;
foreach ($characters as $character) {
    echo $NEW_LINE;
    echo $character->name . $NEW_LINE;
    echo $character->deck . $NEW_LINE;
}


$game = Game::with('characters')->where('name', 'like', '%Mario')->get();
foreach ($game as $jeu) {
    echo "Titre Jeu :  ".$jeu->name . $NEW_LINE;
    $characters = $jeu->characters;
    foreach ($characters as $character) {
        echo "  ".$character->name . $NEW_LINE;
    }
}

echo "les jeux developpes par une compagnie dont le nom contient 'Sony' :".$NEW_LINE;
$companies = Company::where('name', 'like', '%Sony%')->get();
foreach ($companies as $company) {
    echo "Titre Company :  ".$company->name . $NEW_LINE;
    $games = $company->games;
    foreach ($games as $game) {
        echo "  ".$game->name . $NEW_LINE;
    }
}
// echo "rating initial dont le nom contient 'Mario' :".$NEW_LINE;
// $games = Game::where('name', 'like', '%Mario%')->get();
// foreach ($games as $game) {
//     echo "Titre Jeu :  ".$game->name . $NEW_LINE;
//     $rating = $game->rating;
//     echo "  rating ".$rating->name . $NEW_LINE;
// }


// le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
$games = Game::where('name', 'like', '%Mario%')->get();
foreach($games as $game){
  print_r("<h2>" . $game->name . "</h2>");
  $ratings = $game->ratings;
  foreach($ratings as $rating){
    print_r("<h4>" . $rating->name . "</h4>");
    $rating_board = RatingBoard::find($rating->rating_board_id);
    print_r($rating_board->name . "<br />");
  }
}
// les jeux dont le nom débute par Mario et ayant plus de 3 personnages
$games = Game::where('name', 'like', 'Mario%')->get();
foreach($games as $game){
  echo("<h2>". $game->name ."</h2>");
  $characters_number = $game->characters->count();
  if($characters_number > 3){
    $characters = $game->characters;
    foreach($characters as $character){
      echo($character->name . "<br />");
    }
  }
}

// les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
// $games = Game::where('name', 'like', 'Mario%')->get();
// foreach($games as $game){
//   $ratings = $game->ratings->where('name', 'like', '%3+%')->get();
//   foreach($ratings as $rating){
//     print_r($rating->name . "<br />");
//   }
// }

// les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient "Inc." et dont le rating initial contient "3+"
$companies = Company::where('name', 'like', '%Inc.%')->get();
foreach($companies as $company){
  $games = $company->games->where('name', 'like', 'Mario%');
  foreach($games as $game){
    $ratings = $game->ratings->where('name','like', '%3+%')->get();
    if(isset($ratings)){
      echo($game . "<br />");
    }
  }
}

foreach( DB::getQueryLog() as $q){
    echo "-------------- ".$NEW_LINE;
    echo "query : " . $q['query'] .$NEW_LINE;
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---".$NEW_LINE;
    echo "-------------- ".$NEW_LINE.$NEW_LINE;
};
// $genre = Genre::all();
// foreach($genre as $genre){
//   echo($genre->name . "<br />");
// }
// // nouveau genre de jeu "Action" jeux 12 56 345
// $genre = new Genre();
// $genre->name = "Action";
// $game = Game::find(12);
// $genre->games()->attach($game);
// $game = Game::find(56);
// $genre->games()->attach($game);
// $game = Game::find(345);
// $genre->games()->attach($game);
// $genre->save();

*/


// $start=microtime(true);

// $liste = Game::all();
// $time=microtime(true)-$start;
// echo "duree requete 1 : ".$time.$NEW_LINE;

// $start=microtime(true);
// $liste=Game::where('name', 'like', 'Mario%')->get();
// $time=microtime(true)-$start;

// echo "duree requete 2 : ".$time.$NEW_LINE;

// $start=microtime(true);
// $liste=Character::where('name', 'like', 'Mario%')->get();
// $time=microtime(true)-$start;

// echo "duree requete 3 : ".$time.$NEW_LINE;

// $start=microtime(true);
// $liste=\gamepedia\models\Game::where('name', 'like', 'Mario%')
//     ->whereHas('ratings', function($q){
//        $q->where('name', 'like', '%3+%');
//     })
//     ->get();
// $time=microtime(true)-$start;
// echo "duree requete 4 : ".$time.$NEW_LINE;



// $start=microtime(true);
// $liste=Character::where('name', 'like', 'Snake%')->get();
// $time=microtime(true)-$start;
// echo "duree requete LIKE : ".$time.$NEW_LINE;

// $start=microtime(true);
// $liste=Character::where('name', 'like', 'Sonic%')->get();
// $time=microtime(true)-$start;
// echo "duree requete LIKE : ".$time.$NEW_LINE;

// $start=microtime(true);
// $liste=Character::where('name', 'like', 'Mario%')->get();
// $time=microtime(true)-$start;
// echo "duree requete LIKE : ".$time.$NEW_LINE;

/*
$user = new User();
$user->nom = "Doe";
$user->prenom = "John";
$user->email = "letrucen@chouette.fr";
$user->numero = "0612345678";
$user->dateNaissance = new DateTime("1990-01-01");
$user->save();

$user2 = new User();
$user2->nom = "Smith";
$user2->prenom = "John";
$user2->email = "uneemailen@truc.fr";
$user2->numero = "0612569527";
$user2->dateNaissance = new DateTime("1990-08-02");
$user2->save();

$users = User::all();
foreach ($users as $user) {
  echo ($user->nom . " " . $user->prenom . " " . $user->email . " " . $user->numero . " " . $user->dateNaissance . $NEW_LINE);
}

$game = Game::find(12342);

$comment1 = new Comment();
$comment1->content = "Ce jeu est trop bien";
$comment1->titre = "Jeu super";
$comment1->game()->associate($game);
$comment1->user()->associate($user);
$comment1->save();

for ($i = 1; $i <= 3; $i++) {
  $comment = new Comment();
  $comment->content = "Ce jeu est trop bien";
  $comment->titre = "avis ".$i;
  $comment->game()->associate($game);
  $comment->user()->associate($user);
  $comment->save();
}

for ($i = 1; $i <= 3; $i++) {
  $comment = new Comment();
  $comment->content = "Ce jeu est trop bien";
  $comment->titre = "avis ".$i;
  $comment->game()->associate($game);
  $comment->user()->associate($user2);
  $comment->save();
}

//lister les commentaires d'un utilisateur donné, afficher la date du commentaire de façon lisible, ordonnés par date décroissante,

$comments = User::find(8708)->comments()->orderBy('created_at', 'desc')->get();
foreach ($comments as $comment) {
  echo("\t Titre :".$comment->titre . $NEW_LINE . "\tContenu : ".$comment->content . $NEW_LINE ."Cree le : ". $comment->created_at . $NEW_LINE);
}

//list les utilisateurs ayant posté plus de 5 commentaires, afficher le nom et le prénom de chaque utilisateur.
$users = User::has('comments', '>', 5)->get();
foreach ($users as $user) {
  echo ($user->nom . " " . $user->prenom . $NEW_LINE);
}
*/
$configuration = [
  'settings' => [
  'displayErrorDetails' => true,]
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->get(
  '/api/games/{id}',
  function ($rq, $rs, $args) {
    return GameController::representation($rq, $rs, $args);
  }
);

$app->get('/api/games', function ($rq, $rs, $args) {
  return GameController::lister($rq, $rs, $args);
});
