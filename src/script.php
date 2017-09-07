<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.31
 * Time: 13:43
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder->in('../data/');
