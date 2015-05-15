<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Name of route
    |--------------------------------------------------------------------------
    |
    | Enter the routes name to enable dynamic imagecache manipulation.
    | This handle will define the first part of the URI:
    | 
    | {route}/{template}/{filename}
    | 
    | Examples: "images", "img/cache"
    |
    */
   
    'route' => 'images/cache',

    /*
    |--------------------------------------------------------------------------
    | Storage paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be searched for the image filename, submited 
    | by URI. 
    | 
    | Define as many directories as you like.
    |
    */
    
    'paths' => array(
        public_path('uploads'),
        public_path('images')
    ),

    /*
    |--------------------------------------------------------------------------
    | Manipulation templates
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own manipulation callbacks.
    | The keys of this array will define which templates 
    | are available in the URI:
    |
    | {route}/{template}/{filename}
    |
    */
   
    'templates' => array(

        'xsmall' => function($image) {
            return $image->resize(90, 60, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('carmazic/img/watermark/watermark-30.png', 'bottom-right');
        },
        'small' => function($image) {
            return $image->resize(120, 90, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('carmazic/img/watermark/watermark-60.png', 'bottom-right');
        },
        'medium' => function($image) {
            return $image->resize(240, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('carmazic/img/watermark/watermark-120.png', 'bottom-right');
        },
        'large' => function($image) {
            return $image->resize(480, 360, function ($constraint) {
                $constraint->aspectRatio();
            })->insert('carmazic/img/watermark/watermark-240.png', 'bottom-right');
        }
    ),

    /*
    |--------------------------------------------------------------------------
    | Image Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Lifetime in minutes of the images handled by the imagecache route.
    |
    */

    'lifetime' => 43200,

);
