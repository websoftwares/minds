<?php
declare (strict_types=1);

namespace Minds\Repository;

/**
 * @package Minds\Repository
 */
class GuestsRepository implements RepositoryInterface
{
    /** @var array */
    private $data;
    /** @var array */
    private $columns = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param array $columns
     * @return RepositoryInterface
     */
    public function setColumns(array $columns = []): RepositoryInterface
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return array
     */
    private function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        if (!empty($this->columns)) {
            $this->data = array_map([$this, 'mapElementColumns'], $this->data);
        }

        return $this->data;
    }

    /**
     * @param array $element
     * @return array
     */
    public function mapElementColumns(array $element): array
    {
        return array_intersect_key($element, array_flip($this->getColumns()));
    }
}
