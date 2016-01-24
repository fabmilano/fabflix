<?php

Route::post('deploy', function()
{
    $deployer = new \Tmd\AutoGitPull\Deployer(array(
        'directory' => '/var/www/html/fabflix/'
    ));
    $deployer->deploy();
});

?>