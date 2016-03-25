<?php
namespace AppBundle\PointCut;

use Doctrine\Common\Annotations\Reader;
use JMS\AopBundle\Aop\PointcutInterface;

/**
 * Description of TransactionalPointCut
 *
 * @author Ramrami Mohamed
 */
class TransactionalPointCut implements PointcutInterface
{
    private $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function matchesClass(\ReflectionClass $class)
    {
        return true;
    }

    public function matchesMethod(\ReflectionMethod $method)
    {
        return null !== $this->reader->getMethodAnnotation($method, \AppBundle\Annotation\Transactional::class);
    }
}
