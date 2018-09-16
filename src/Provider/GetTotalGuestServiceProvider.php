<?php
declare(strict_types=1);

namespace Minds\Provider;

use Minds\Action\GetTotalGuestAction;
use Minds\Model\GuestsModel;
use Minds\Repository\GuestsRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * @package Minds\Provider
 */
class GetTotalGuestServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple[GetTotalGuestAction::class] = function ($pimple) {
            return new GetTotalGuestAction(
                new GuestsModel(new GuestsRepository($pimple['guests']))
            );
        };
    }
}
