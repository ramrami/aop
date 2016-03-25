<?php

namespace AppBundle\PointCut;

use JMS\AopBundle\Aop\PointcutInterface;

/**
 * Description of LoggerPointCut
 *
 * @author Ramrami Mohamed
 */
class LoggingPointCut  implements PointcutInterface
{
    public function matchesClass(\ReflectionClass $class) {
        return false !== strpos($class->name, 'Service');
    }

    public function matchesMethod(\ReflectionMethod $method) {
        return true;
    }

}
