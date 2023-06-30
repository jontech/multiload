<?php
error_reporting(E_ALL);
require('./conf.php');
require('./interfaces/DataLoader.php');
spl_autoload_register(
    function($class)
    {
        require './loaders/' . $class . '.php';
    }
);

const DATA_LOADERS = [CSVLoader::class, XMLLoader::class, JSONLoader::class];

function loadData(string $fname, string $ext): array
{
    print_r($ext);
    foreach (DATA_LOADERS as $Loader) {
        if ($Loader::getSupportedExt() !== $ext) {
            continue;
        }

        $res = $Loader::load($fname);

        break;
    }

    return $res;
}

function run(string $fname): int
{
    [$name, $ext] = explode('.', $fname);
    
    print_r(loadData($fname, $ext));

    return 0;
}

run($argv[1]);
