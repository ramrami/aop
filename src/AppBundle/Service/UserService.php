<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

use AppBundle\Entity\User;
use AppBundle\Annotation\Transactional;

/**
 * UserService
 */
class UserService
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * @Transactional
     */
    public function create()
    {
        $user = new User();
        $user->setUsername("username");
        $user->setEmail("email");

        $this->em->persist($user);
        $this->em->flush();

    }


}
