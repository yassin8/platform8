<?php

namespace App\Controller;

use App\Entity\Container;
use Docker\API\Model\ContainersCreatePostBody;
use Docker\Docker;

class ContainerStart
{
    private $myService;

    public function __construct()
    {
        //$this->myService = $myService;
    }

    public function __invoke(Container $data): Container
    {
        $docker = Docker::create();

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('hello-wold:latest');
        $containerConfig->setCmd(['echo', 'I am running a command']);

        $containerCreateResult = $docker->containerCreate($containerConfig);

        return $data;
    }
}