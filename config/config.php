<?php

// You can place your custom package configuration in here.
return [
    'route' => '/thumb/',
    'src_path' => 'thumb/',
    'formats' => [
        'default' => [
            'width' => 300,
        ],
    ],
    'icons' => 'default',
];
/*


src : /storage/app/public/my-path/my-file.jpg  ( /public/storage/my-path/my-file.jpg )

thumb url : /thumb/format/public/my-path/my-file.jpg
thumb path : /storage/app/public/thumb/format/my-path/my-file.jpg



src : /storage/app/other-path/my-path/my-file.jpg

thumb url : /thumb/format/other-path/my-path/my-file.jpg
thumb path : /storage/app/public/thumb/format/other-path/my-path/my-file.jpg


*/
