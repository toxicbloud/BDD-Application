## Préparation séance 5-6

1. Lorsque la fonction json_encode() reçoit un tableau PHP, expliquez dans quels cas elle
retourne une chaine correspondant
   - à un tableau json : '[ .... ]'
   - à un objet json : '{ ..... }'
  Json encode retourne un objet json quand on encode un objet et un tableau quand on encode un array.
2. en utilisant le micro-framework slim, comment accède-t-on aux données transmises dans la
requête sans utiliser les tableau $_GET et $_POST :
   ```php
   $app->get('/route', function ($request, $response, $args) {
    $paramValue = $request->params(''); // equal to $_REQUEST
    $paramValue = $request->post(''); // equal to $_POST
    $paramValue = $request->get(''); // equal to $_GET
    return $response;
    });
   ```
3. en utilisant slim, comment positionner :
   1. le code de retour de la réponse (200, 404, 401 ...),
    $newResponse = $response->withStatus(302);
   2. un header dans la réponse