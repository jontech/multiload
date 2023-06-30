<?php

interface DataLoader
{
    public static function getSupportedExt(): string;
    public static function load(string $fname): array;
}
