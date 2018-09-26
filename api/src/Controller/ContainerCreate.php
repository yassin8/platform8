<?php

namespace App\Controller;

use App\Entity\Container;
use Docker\API\Model\ContainersCreatePostBody;
use Docker\API\Model\HostConfig;
use Docker\API\Model\PortBinding;
use Docker\Docker;

class ContainerCreate
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
        $containerConfig->setTty(true);
        $containerConfig->setImage('mariadb:10.2');
        $containerConfig->setEnv([
            'MYSQL_ROOT_PASSWORD=root',
            'MYSQL_USER=dev',
            'MYSQL_PASSWORD=dev'
        ]);
        $portBinding = new PortBinding();
        $portBinding->setHostPort('28081');
        $portBinding->setHostIp('0.0.0.0');

        $portMap = new \ArrayObject();
        $portMap['3306/tcp'] = [$portBinding];
        $hostConfig = new HostConfig();
        $hostConfig->setPortBindings($portMap);
        $containerConfig->setHostConfig($hostConfig);

        $exposedPorts = new \ArrayObject();
        $exposedPorts['3306/tcp'] = new \stdClass;
        $containerConfig->setExposedPorts($exposedPorts);

        $containerCreateResult = $docker->containerCreate($containerConfig);
        $docker->containerStart($containerCreateResult->getId());

        return $data;
    }
}
