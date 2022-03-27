<?php
require_once('vendor/autoload.php');
require_once('conf/db.php');

use gamepedia\models\Game;
use gamepedia\models\Company;
use gamepedia\models\Platform;
use gamepedia\models\Character;
use gamepedia\models\RatingBoard;
use gamepedia\models\Genre;


use Illuminate\Database\Capsule\Manager as DB;
DB::connection()->enableQueryLog();

$NEW_LINE = '<br>';
if (PHP_SAPI === 'cli')
    $NEW_LINE = PHP_EOL;

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