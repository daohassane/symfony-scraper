<?php

namespace App\Infrastructure\services;

interface IGoogleService
{
    public function getUrl(string $query): string;
    public function getName(): string;
    public function getWrapperSelector(): string;
    public function getTitleSelector(): string;
    public function getDescSelector(): string;
    public function getLinkSelector(): string;
}