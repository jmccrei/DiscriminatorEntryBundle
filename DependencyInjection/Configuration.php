<?php
/**
 * Copyright (c) 2020
 * Author: Josh McCreight<jmccreight@shaw.ca>
 */

declare( strict_types = 1 );

namespace Jmccrei\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Jmccrei\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        return new TreeBuilder( 'jmccrei_reverse_disriminator' );
    }
}