<?php

spl_autoload_register(function (string $nomeClasse){
    $filePath = str_replace('Portifolio\\Workbench', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'server' . DIRECTORY_SEPARATOR . 'src', $nomeClasse);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath);
    $filePath .= '.php';
    
    if(file_exists($filePath)){
        require_once $filePath;
    }
});