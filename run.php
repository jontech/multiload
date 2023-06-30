<?php
error_reporting(E_ALL);
require('./conf.php');

function loadCSV(string $fname): array
{
    if (($handle = fopen(DATA_DIR . '/' . $fname, 'r')) === false) {
        return [];
    }

    if (($header = fgetcsv($handle, CSV_MAX_LINE, CSV_DELIM)) === false) {
        return [];
    }

    while (($data = fgetcsv($handle, CSV_MAX_LINE, CSV_DELIM)) !== false) {
        $item = [];
        foreach ($data as $index => $val) {
            $key = $header[$index];
            $item[$key] = $val;
        }
        $res[] = $item;
    }

    fclose($handle);

    return $res;
}

function loadXML(string $fname): array
{
    $xmlRoot = simplexml_load_file(DATA_DIR . '/' . $fname);
    $items = (array) $xmlRoot->xpath('/items/item');

    foreach ($items as $xmlItem) {
        $res[] = (array) $xmlItem;
    }

    return $res;
}

function loadJSON(string $fname): array
{
    $jsonStr = file_get_contents(DATA_DIR . '/' . $fname);
    $res = json_decode($jsonStr, true);

    return $res;
}

function run(string $fname): int
{
    [$name, $ext] = explode('.', $fname);

    switch ($ext) {
    case 'csv':
        $data = loadCSV($fname); break;
    case 'xml':
        $data = loadXML($fname); break;
    case 'json':
        $data = loadJSON($fname); break;
    default:
        $data = [];
    }

    print_r($data);

    return 0;
}

run($argv[1]);
