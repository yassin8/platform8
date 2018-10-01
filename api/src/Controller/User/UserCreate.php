<?php

namespace App\Controller\User;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserCreate
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function __invoke(User $data): User
    {
        $password = $this->passwordEncoder->encodePassword($data, $data->getPassword());
        $data->setPassword($password);

        return $data;
    }
}
