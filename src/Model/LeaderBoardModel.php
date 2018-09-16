<?php
declare (strict_types=1);

namespace Minds\Model;

/**
 * @package Minds\Model
 */
class LeaderBoardModel extends AbstractModel implements LeaderBoardInterface
{
    protected const COLUMNS = ['favourite_album'];

    /**
     * @return array
     */
    public function getLeaderBoard(): array
    {
        /** @var array $total */
        $total = $this->getTotal(); // <-- work around for "Only variables should be passed by reference"
        arsort($total);
        return $total;
    }
}
