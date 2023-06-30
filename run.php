<?php
define("DATA_DIR", "./data");

function loadCSV(string $fname)
{
    if (($handle = fopen(DATA_DIR . "/" . $fname, "r")) === false) {
        return [];
    }

    $res = [];
    
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $res[] = $data;
    }

    fclose($handle);

    return $res;
}

function run(string $fname)
{
    $data = loadCSV($fname);

    print_r($data);

    return 0;
}

run($argv[1]);
