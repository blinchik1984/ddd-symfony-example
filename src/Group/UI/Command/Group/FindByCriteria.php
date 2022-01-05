<?php

declare(strict_types=1);

namespace App\Group\Command\Group;

use App\Core\Command;
use App\Group\Application\Dto\Group\FindByCriteriaRequest;
use App\Group\Application\Service\Group\FindByCriteria as FindByCriteriaService;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class FindByCriteria extends Command
{
    protected static $defaultName = 'group:find-groups-by-criteria';
    private FindByCriteriaService $service;

    protected function configure()
    {
        $this->addOption(
            'id',
            null,
            InputOption::VALUE_REQUIRED,
            'Group id'
        );
    }

    public function __construct(
        FindByCriteriaService $service
    ) {
        parent::__construct();
        $this->service = $service;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        print_r(
            $this->service->execute(
                new FindByCriteriaRequest(
                    $input->getOption('id'),
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    [],
                    [],
                    null,
                    null,
                ),
            ),
        );

        return self::SUCCESS;
    }
}