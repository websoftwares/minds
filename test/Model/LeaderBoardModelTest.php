<?php
declare(strict_types=1);

namespace Minds\Test\Model;

use Minds\Model\LeaderBoardModel;
use Minds\Repository\GuestsRepository;
use PHPUnit\Framework\TestCase;

/**
 * @package Minds\Test\Model
 */
class LeaderBoardModelTest extends TestCase
{
    /** @var LeaderBoardModel */
    private $leaderBoardModel;

    protected function setUp()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../data/guests.json'), true);
        $this->leaderBoardModel = new LeaderBoardModel(new GuestsRepository($data));

        parent::setUp();
    }

    public function testGetLeaderBoardSucceeds(): void
    {
        $expected = [
            'Magical Mystery Tour' => 5,
            'Revolver' => 4,
            'Abbey Road' => 2,
            'Sgt. Pepper' => 2,
            'White Album' => 2,
            'Let it be' => 1
        ];
        $actual = $this->leaderBoardModel->getLeaderBoard();
        $this->assertEquals($expected, $actual);
    }
}
