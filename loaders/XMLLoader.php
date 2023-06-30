<?php
class XMLLoader implements DataLoader
{
    public static function getSupportedExt(): string
    {
        return 'xml';
    }

    public static function load(string $fname): array
    {
        $xmlRoot = simplexml_load_file(DATA_DIR . '/' . $fname);
        $items = (array) $xmlRoot->xpath('/items/item');

        foreach ($items as $xmlItem) {
            $res[] = (array) $xmlItem;
        }

        return $res;
    }
}
