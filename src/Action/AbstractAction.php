<?php
declare (strict_types = 1);
namespace Minds\Action;

use Minds\Model\AbstractModel;

/**
 * @package Minds\Action
 */
abstract class AbstractAction
{
    protected $model;

    public function __construct(AbstractModel $model)
    {
        $this->model = $model;
    }
}
