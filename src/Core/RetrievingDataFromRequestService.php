<?php

declare(strict_types=1);

namespace App\Core;

use Symfony\Component\HttpFoundation\Request;

final class RetrievingDataFromRequestService
{
    public function fromPost(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }
}