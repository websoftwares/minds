<?php
declare (strict_types=1);

namespace Minds\Model;

use Minds\Repository\RepositoryInterface;

/**
 * @package Minds\Model
 */
abstract class AbstractModel
{
    protected const COLUMNS = [];

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    protected function getTotal(): array
    {
        $result = $this
            ->repository
            ->setColumns(static::COLUMNS)
            ->all();

        $total = [];
        array_walk_recursive($result, function ($id) use (&$total) {
            $total[$id] = isset($total[$id])
                ? $total[$id] + 1
                : 1;
        });

        return $total;
    }
}
