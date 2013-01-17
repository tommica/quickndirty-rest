<?php
/*
 * http://schematic-ipsum.herokuapp.com/
 */

error_reporting(E_STRICT);
require_once 'uvic.php';
require_once 'postTool.php';

use MiMViC as mvc;

define('BASE_URL', '/');
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

mvc\get('/account/*',
  function ($params){
    $json = '{
      "type": "object",
      "properties": {
        "id": { "type": "string", "ipsum": "id" },
        "name": { "type": "string", "ipsum": "name" },
        "email": { "type": "string", "format": "email" },
        "bio": { "type": "string" },
        "age": { "type": "integer", "n": true }
      }
    }';

    $json = do_post_request('http://schematic-ipsum.herokuapp.com/', $json, "Content-type: application/json\r\n");

    echo $json;
  }
);

mvc\get('/article/*',
  function ($params){
    $json = '{
      "type": "object",
      "properties": {
        "id": { "type": "string", "ipsum": "id" },
        "title": { "type": "string" },
        "author": { "type": "string", "ipsum": "name" },
        "content": { "type": "string", "ipsum": "long" }
      }
    }';

    $json = do_post_request('http://schematic-ipsum.herokuapp.com/', $json, "Content-type: application/json\r\n");

    echo $json;
  }
);


mvc\start();
?>
