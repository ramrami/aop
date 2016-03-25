<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

$loader->add('JMS', __DIR__.'/../vendor/bundles');
$loader->add('CG', __DIR__.'/../vendor/cg-library/src');

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
