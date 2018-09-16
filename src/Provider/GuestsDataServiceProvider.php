<?php
declare(strict_types=1);

namespace Minds\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * @package Minds\Provider
 */
class GuestsDataServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple['guests'] = json_decode(file_get_contents(__DIR__ . '/../../data/guests.json'), true);
    }
}
