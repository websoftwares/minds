<?php
declare(strict_types=1);

namespace Minds\Test\Model;

use Minds\Model\GuestsModel;
use Minds\Repository\GuestsRepository;
use PHPUnit\Framework\TestCase;

/**
 * @package Minds\Test\Model
 */
class GuestsModelTest extends TestCase
{
    /** @var GuestsModel */
    private $guestsModel;

    protected function setUp()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../data/guests.json'), true);
        $this->guestsModel = new GuestsModel(new GuestsRepository($data));

        parent::setUp();
    }

    public function testGetTotalGuestsSucceeds(): void
    {
        $expected = [
            'Ringo' => 5,
            'John' => 4,
            'Paul' => 4,
            'George' => 3
        ];
        $actual = $this->guestsModel->getTotalGuests();
        $this->assertEquals($expected, $actual);
    }
}
