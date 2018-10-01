<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\ContainerStart;
use App\Controller\ContainerCreate;

/**
 * @ApiResource(itemOperations={
 *     "get",
 *     "start"={
 *         "method"="PUT",
 *         "path"="/containers/{id}/start",
 *         "controller"=ContainerStart::class
 *     }
 * },
 * collectionOperations={
 *     "get",
 *     "create"={
 *         "method"="POST",
 *         "path"="/containers/create",
 *         "controller"=ContainerCreate::class
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
     * User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="containers")
     * @ORM\JoinColumn(name="user_id_fk", referencedColumnName="id")
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
