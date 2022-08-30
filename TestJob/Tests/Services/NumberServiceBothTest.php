<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestJob\Services\NumberService;

final class NumberServiceBothTest extends TestCase
{
    public function equal( int $number )
    {
        $this->assertEquals(
            NumberService::multiplesAndOccurrences( $number ),
            NumberService::multiples( $number ).NumberService::occurrences( $number ),
            "Fail equal {$number}"
        );
    }

    public function testBoth(): void
    {
        $this->equal( 3 );
        $this->equal( 33 );
        $this->equal( 999 );

        $this->equal( 5 );
        $this->equal( 55 );
        $this->equal( 5000 );

        $this->equal( 11311311 );
        $this->equal( 2310 );
    }
}