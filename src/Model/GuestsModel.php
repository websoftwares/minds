<?php
declare (strict_types=1);

namespace Minds\Model;

/**
 * @package Minds\Model
 */
class GuestsModel extends AbstractModel implements GuestsModelInterface
{
    protected const COLUMNS = ['guest_of'];

    /**
     * @return array
     */
    public function getTotalGuests(): array
    {
        return $this->getTotal();
    }
}
