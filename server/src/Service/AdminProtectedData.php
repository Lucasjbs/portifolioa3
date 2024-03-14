<?php

namespace Portifolio\Workbench\Service;

class AdminProtectedData
{
    public function getFile(): string
    {
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'admin.html';
        $file = file_get_contents($filePath);
        if($file){
            return $file;
        }
        
        return "";
    }
}
