<?php
declare (strict_types = 1);
namespace Minds\Action;

use Minds\Model\LeaderBoardInterface;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};

/**
 * @property LeaderBoardInterface $model
 * @package Minds\Action
 */
class GetLeaderBoardAction extends AbstractAction
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ) : ResponseInterface {
        $result = $this->model->getLeaderBoard();
        return $response->withJson($result);
    }
}
