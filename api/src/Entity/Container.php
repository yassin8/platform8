<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\ContainerStart;

/**
 * @ApiResource(itemOperations={
 *     "get"={
 *         "method"="GET",
 *         "path"="/containers/{id}/start",
 *         "controller"=ContainerStart::class
 *     }
 * })
 * @ORM\Entity
 */
class Container
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $name = '';

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $owner = '';

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $state = '';

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $image = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $created = '';

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $ip = '';

    /**
     * @var int
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $externalPort = '';

    public function getId(): int
    {
        return $this->id;
    }
}
