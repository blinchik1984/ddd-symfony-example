<?php

declare(strict_types=1);

namespace App\Group\Application\Service\Group;

use App\Core\Service\LoggerServiceInterface;
use App\Group\Application\Dto\Group\FindByCriteriaRequest;
use App\Group\Application\Factory\Group\FindByCriteriaRequestFactory;
use App\Group\Application\Transformer\Group\GroupsToArray;
use App\Group\Domain\Model\Group\FindByCriteriaService;
use Throwable;

final class FindByCriteria
{
    private FindByCriteriaRequestFactory $findByCriteriaRequestFactory;
    private LoggerServiceInterface $loggerService;
    private FindByCriteriaService $findByCriteriaService;
    private GroupsToArray $groupsToArray;

    public function __construct(
        FindByCriteriaRequestFactory $findByCriteriaRequestFactory,
        LoggerServiceInterface $loggerService,
        FindByCriteriaService $findByCriteriaService,
        GroupsToArray $groupsToArray
    ) {
        $this->findByCriteriaRequestFactory = $findByCriteriaRequestFactory;
        $this->loggerService = $loggerService;
        $this->findByCriteriaService = $findByCriteriaService;
        $this->groupsToArray = $groupsToArray;
    }

    public function execute(FindByCriteriaRequest $request): array
    {
        try {
            return $this->groupsToArray->transform(
                $this->findByCriteriaService->execute(
                    $this->findByCriteriaRequestFactory->build(
                        $request,
                    )
                )
            );
        } catch (Throwable $exception) {
            $this->loggerService->warning($exception);

            return [];
        }
    }
}