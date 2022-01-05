<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Category;

use App\Group\Domain\Model\Category\Categories;
use App\Group\Domain\Model\Category\Category;
use App\Group\Domain\Model\Category\CategoryRepositoryInterface;
use App\Group\Domain\Model\Category\Ids;
use App\Group\Domain\Model\Category\Name;
use Psr\Cache\CacheItemPoolInterface;

final class CachedCategoryRepository implements CategoryRepositoryInterface
{
    private const CACHE_TTL = 3600;
    private CacheItemPoolInterface $cacheItemPool;
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryCacheSerializer $categoryCacheSerializer;

    public function __construct(
        CacheItemPoolInterface $cacheItemPool,
        CategoryRepositoryInterface $categoryRepository,
        CategoryCacheSerializer $categoryCacheSerializer
    ) {
        $this->cacheItemPool = $cacheItemPool;
        $this->categoryRepository = $categoryRepository;
        $this->categoryCacheSerializer = $categoryCacheSerializer;
    }

    public function findByIds(Ids $ids): Categories
    {
        return $this->categoryRepository->findByIds($ids);
    }

    public function findByName(Name $name): ?Category
    {
        $cacheItem = $this->cacheItemPool->getItem($name->getValue());

        if ($cacheItem->isHit()) {
            return $this->categoryCacheSerializer->decode($cacheItem->get());
        }

        $category = $this->categoryRepository->findByName($name);
        $cacheItem->set($this->categoryCacheSerializer->encode($category));
        $cacheItem->expiresAfter(self::CACHE_TTL);
        $this->cacheItemPool->save($cacheItem);

        return $category;
    }
}