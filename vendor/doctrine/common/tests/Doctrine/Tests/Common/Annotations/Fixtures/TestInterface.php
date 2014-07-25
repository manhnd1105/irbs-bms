<?php

namespace Doctrine\Tests\Common\Annotations\Fixtures;

interface TestInterface
{
    /**
     * @Secure
     */
    function foo();
}