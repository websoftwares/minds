<?php
declare(strict_types=1);

namespace Minds\Repository;

/**
 * @package Minds\Repository
 */
interface RepositoryInterface
{
    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param array $columns
     * @return RepositoryInterface
     */
    public function setColumns(array $columns = []): self;
}
