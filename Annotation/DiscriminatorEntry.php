<?php
/**
 * Copyright (c) 2020
 * Author: Josh McCreight<jmccreight@shaw.ca>
 */

declare( strict_types = 1 );

namespace Jmccrei\DiscriminatorEntryBundle\Annotation;

/**
 * Class DiscriminatorChild
 * @package Jmccrei\DiscriminatorEntryBundle\Annotation
 * @Annotation
 */
class DiscriminatorEntry
{
    /**
     * @var string
     */
    public $value;
}