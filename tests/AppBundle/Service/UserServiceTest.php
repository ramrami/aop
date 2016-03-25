<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityManagerInterface;

use AppBundle\Service\UserService;

/**
 * Description of UserServiceTest
 *
 * @author Ramrami Mohamed
 */
class UserServiceTest extends KernelTestCase
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function setUp()
    {
        self::bootKernel();
        $this->em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->userService = self::$kernel->getContainer()->get("app.user_service");

        $tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
        $tool->createSchema([$this->em->getClassMetadata('\AppBundle\Entity\User')]);

    }

    public function tearDown()
    {
        $tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);
        $tool->dropSchema([$this->em->getClassMetadata('\AppBundle\Entity\User')]);
    }

    public function testUserService()
    {
        $this->userService->create();
    }
}
