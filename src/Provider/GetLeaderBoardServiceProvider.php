<?php
declare(strict_types=1);

namespace Minds\Provider;

use Minds\Action\GetLeaderBoardAction;
use Minds\Model\LeaderBoardModel;
use Minds\Repository\GuestsRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * @package Minds\Provider
 */
class GetLeaderBoardServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple[GetLeaderBoardAction::class] = function ($pimple) {
            return new GetLeaderBoardAction(
                new LeaderBoardModel(new GuestsRepository($pimple['guests']))
            );
        };
    }
}
