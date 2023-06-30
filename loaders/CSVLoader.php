<?php
class CSVLoader implements DataLoader
{
    public static function getSupportedExt(): string
    {
        return 'csv';
    }
    
    public static function load(string $fname): array
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


}
