<?php

declare(strict_types=1);

namespace App\Group\Application\Service\Group;

use App\Core\Service\LoggerServiceInterface;
use App\Group\Application\Dto\Group\PersistResponse;
use App\Group\Application\Factory\Group\GroupFactory;
use App\Group\Application\Transformer\Group\GroupsToArray;
use App\Group\Domain\Model\Group\PersistService;
use Throwable;

final class Persist
{
    private GroupFactory $groupFactory;
    private PersistService $persistService;
    private LoggerServiceInterface $loggerService;
    private GroupsToArray $groupsToArray;

    public function __construct(
        GroupFactory $groupFactory,
        PersistService $persistService,
        LoggerServiceInterface $loggerService,
        GroupsToArray $groupsToArray
    ) {
        $this->groupFactory = $groupFactory;
        $this->persistService = $persistService;
        $this->loggerService = $loggerService;
        $this->groupsToArray = $groupsToArray;
    }

    public function execute(array $groups): PersistResponse
    {
        try {
            $domainGroups = $this->groupFactory->buildCollection($groups);
            $this->persistService->execute(
                $domainGroups,
            );

            return new PersistResponse(
                true,
                '',
                $this->groupsToArray->transform($domainGroups),
            );
        } catch (Throwable $exception) {
            $this->loggerService->warning($exception);

            return new PersistResponse(
                false,
                $exception->getMessage(),
                [],
            );
        }
    }
}