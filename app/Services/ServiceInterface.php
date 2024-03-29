<?php

namespace App\Services;

use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;

interface ServiceInterface
{
    public function execute(RequestInterface $request = null): ?ResponseInterface;
}