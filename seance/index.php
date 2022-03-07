<?php
require_once('vendor/autoload.php');
require_once('conf/db.php');

use gamepedia\models\Game;
use gamepedia\models\Company;
use gamepedia\models\Platform;

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