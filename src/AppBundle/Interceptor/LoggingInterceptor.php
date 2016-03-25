<?php

namespace AppBundle\Interceptor;

use CG\Proxy\MethodInterceptorInterface;
use CG\Proxy\MethodInvocation;
use Symfony\Bridge\Monolog\Logger;

/**
 * Description of LoggingInterceptor
 *
 * @author Ramrami Mohamed
 */
class LoggingInterceptor implements MethodInterceptorInterface
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function intercept(MethodInvocation $invocation)
    {
        dump(sprintf('Invoking method "%s".', $invocation->reflection->name));

        $invocation->proceed();

        dump(sprintf('Finish method "%s".', $invocation->reflection->name));
        return ;
    }
}
