<?php

require_once "vendor/autoload.php";
 
use Google\Cloud\Storage\StorageClient;
 


    $storage = new StorageClient([
        'keyFilePath' => getcwd(). '/google-service-account.json',
    ]);

    
    
    $bucketName = 'elegant-bonbon-357016';
    $fileName = '12.png';
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->upload(
        fopen($fileName, 'r'),
        [
            'predefinedAcl' => 'publicRead'
        ]
    );
    echo "File uploaded successfully. File path is: https://storage.googleapis.com/$bucketName/$fileName";  
?>