<?php

declare(strict_types=1);

namespace App\Core;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

abstract class Controller extends AbstractController
{
    protected function getDataFromPostRequest(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }
}