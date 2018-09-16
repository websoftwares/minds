<?php
declare (strict_types=1);

namespace Minds\Model;

/**
 * @package Minds\Model
 */
class GuestPickupLocationsModel extends AbstractModel implements GuestPickupLocationsModelInterface
{
    protected const COLUMNS = ['location'];

    /**
     * @return array
     */
    public function getTotalGuestPickupLocations(): array
    {
        /** @var array $total */
        $total = $this->getTotal(); // <-- work around for "Only variables should be passed by reference"
        arsort($total);
        return $total;
    }
}
