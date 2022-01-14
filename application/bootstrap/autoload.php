<?php

defined('C5_EXECUTE') or die('Access Denied.');

/*
 * ----------------------------------------------------------------------------
 * Load all composer autoload items.
 * ----------------------------------------------------------------------------
 */

// If the checker class is already provided, likely we have been included in a separate composer project
if (!class_exists(\DoctrineXml\Checker::class)) {
    // Otherwise, lets try to load composer ourselves
    if (!@include(DIR_BASE_CORE . '/' . DIRNAME_VENDOR . '/autoload.php')) {
        echo 'Third party libraries not installed. Make sure that composer has required libraries in the concrete/ directory.';
        die(1);
    }
}

$classLoader = new \Symfony\Component\ClassLoader\Psr4ClassLoader();
$classLoader->addPrefix('Application\\Express', DIR_APPLICATION . '/' . DIRNAME_CLASSES . '/Express');
$classLoader->register();
