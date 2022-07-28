<?php

namespace App\Infrastructure\services;

class GoogleService implements IGoogleService
{

    public function getUrl(string $query): string
    {
        return 'https://www.google.fr/search?q='.str_replace(' ', '+', $query);
    }

    public function getName(): string
    {
        return 'Google';
    }

    public function getWrapperSelector(): string
    {
        return '.Gx5Zad.fP1Qef.xpd.EtOod.pkphOe';
    }

    public function getTitleSelector(): string
    {
        return '.egMi0.kCrYT a h3';
    }

    public function getDescSelector(): string
    {
        return '.BNeawe.s3v9rd.AP7Wnd';
    }

    public function getLinkSelector(): string
    {
        return '.egMi0.kCrYT a';
    }
}