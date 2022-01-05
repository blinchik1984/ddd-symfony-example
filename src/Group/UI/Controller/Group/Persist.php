<?php

declare(strict_types=1);

namespace App\Group\Controller\Group;

use App\Core\Controller;
use App\Core\RetrievingDataFromRequestService;
use App\Group\Application\Service\Group\Persist as PersistService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class Persist extends Controller
{
    private PersistService $persistService;
    private RetrievingDataFromRequestService $retrievingDataFromRequestService;

    public function __construct(
        PersistService $persistService,
        RetrievingDataFromRequestService $retrievingDataFromRequestService
    ) {
        $this->persistService = $persistService;
        $this->retrievingDataFromRequestService = $retrievingDataFromRequestService;
    }

    public function execute(Request $request): Response
    {
        $data = $this->retrievingDataFromRequestService->fromPost($request);
        $this->persistService->execute($data['groups'] ?? []);
        return $this->json([]);
    }
}