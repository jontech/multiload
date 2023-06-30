<?php
error_reporting(E_ALL);

const DATA_DIR = './data';
const CSV_MAX_LINE = 1000;
const CSV_DELIM = ',';

function loadCSV(string $fname): array
{
    if (($handle = fopen(DATA_DIR . "/" . $fname, "r")) === false) {
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
    print('loading XML');

    return [];
}

function run(string $fname): int
{
    [$name, $ext] = explode('.', $fname);

    switch ($ext) {
    case 'csv':
        $data = loadCSV($fname); break;
    case 'xml':
        $data = loadXML($fname); break;
    default:
        $data = [];
    }

    print_r($data);

    return 0;
}

run($argv[1]);
