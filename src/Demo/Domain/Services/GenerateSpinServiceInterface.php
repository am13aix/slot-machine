<?php
/**
 * Created by PhpStorm.
 * User: andrew.magri
 * Date: 11/07/2019
 * Time: 15:39
 */

namespace Demo\Domain\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;

interface GenerateSpinServiceInterface
{
    public function execute(RequestInterface $request = null): ?ResponseInterface;
}