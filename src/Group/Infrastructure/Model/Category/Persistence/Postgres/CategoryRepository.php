<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Category\Persistence\Postgres;

use App\Group\Domain\Model\Category\Categories;
use App\Group\Domain\Model\Category\Category;
use App\Group\Domain\Model\Category\CategoryRepositoryInterface;
use App\Group\Domain\Model\Category\Ids;
use App\Group\Domain\Model\Category\Name;
use App\Group\Infrastructure\Model\Category\CategoryFactory;
use PDO;

final class CategoryRepository implements CategoryRepositoryInterface
{
    private const TABLE_NAME = 'grouping.categories';
    private PDO $pdo;
    private CategoryFactory $categoryFactory;

    public function __construct(
        PDO $pdo,
        CategoryFactory $categoryFactory
    ) {
        $this->pdo = $pdo;
        $this->categoryFactory = $categoryFactory;
    }

    public function findByIds(Ids $ids): Categories
    {
        $sql = "
            SELECT id, title as name 
            FROM " . self::TABLE_NAME . "
            WHERE id IN (" . implode(', ', $ids->toArray()) . ")
        ";
        $rawCategories = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $this->categoryFactory->buildCollection($rawCategories);
    }

    public function findByName(Name $name): ?Category
    {
        $rawCategory = $this->pdo->query(
            $this->getSelectSql() . ' WHERE title = :title',
            ['title' => $name->getValue()],
        )->fetch(PDO::FETCH_ASSOC);

        if (empty($rawCategory)) {
            return null;
        }

        return $this->categoryFactory->build($rawCategory);
    }

    private function getSelectSql(): string
    {
        return 'SELECT id, title as name FROM ' . self::TABLE_NAME;
    }
}