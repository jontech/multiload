<?php
class JSONLoader implements DataLoader
{
    public static function getSupportedExt(): string
    {
        return 'json';
    }
    
    public static function load(string $fname): array
    {
        $jsonStr = file_get_contents(DATA_DIR . '/' . $fname);
        $res = json_decode($jsonStr, true);
        
        return $res;
    }
}
