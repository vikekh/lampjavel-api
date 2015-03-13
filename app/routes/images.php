<?php

use \Vikekh\Lampjavel\Api\Models\Image as Image;

$app->group('/images', function () use ($app) {

    // GET /images

    // GET /images/{imageId}

    $app->get('/:id', function ($id) use ($app) {
        $image = Image::find(intval($id));

        echo $image->toJson();
    });

    // POST /images

    $app->post('/', function () use ($app) {
        $image = new Image;
        $image->fill($app->request->params());

        if (!$image->save()) {
            $app->halt(400);
        }

        $app->response->status(201);
        echo $image->toJson();
    });

    // PUT /images/{imageId}

    // DELETE /images/{imageId}

});