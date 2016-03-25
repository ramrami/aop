<?php

namespace AppBundle\Interceptor;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use CG\Proxy\MethodInvocation;
use CG\Proxy\MethodInterceptorInterface;
use Doctrine\ORM\EntityManager;

/**
 * Description of TransactionalInterceptor
 *
 * @author Ramrami Mohamed
 */
class TransactionalInterceptor implements MethodInterceptorInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function intercept(MethodInvocation $invocation)
    {
        dump('Beginning transaction for method "'.$invocation.'")');
        $this->em->getConnection()->beginTransaction();
        try {
            
            $rs = $invocation->proceed();

            dump(sprintf('Comitting transaction for method "%s" (method invocation successful)', $invocation));
            $this->em->getConnection()->commit();

            return $rs;
        } catch (\Exception $ex) {
            dump(sprintf('Rolling back transaction for method "%s" (exception thrown)', $invocation));
            $this->em->getConnection()->rollBack();

            throw $ex;
        }
    }
}
