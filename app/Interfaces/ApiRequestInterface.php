<?php

namespace App\Interfaces;

interface ApiRequestInterface
{
    public function getDataFromApi(string $api_url);

    public function getUsers();
}
