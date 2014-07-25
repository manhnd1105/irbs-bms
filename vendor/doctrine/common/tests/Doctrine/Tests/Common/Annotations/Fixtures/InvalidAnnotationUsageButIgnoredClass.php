<?php

namespace Doctrine\Tests\Common\Annotations\Fixtures;

/**
 * @NoAnnotation
 * @IgnoreAnnotation("NoAnnotation")
 * @Route("foo")
 */
class InvalidAnnotationUsageButIgnoredClass
{
}