<?php
namespace TestJob\Services;

/*
 * We need you to implement a service (we will let aside the Rest/web service side of it). It will take a number (positive integer) and provide:

    "Foo" if this number is multiple of 3
    "Bar" if this number is multiple of 5

    If number have several multiples, they appear in natural order (Foo, Bar).

    We will return the given number as a string if there is no transformation to do.
 */

class NumberService
{
    public static function multiplesAndOccurrences( int $number ): string
    {
        return static::multiples( $number ).static::occurrences( $number );
    }

    public static function occurrences( int $number ): string
    {
        $string = (string)$number;
        $result = [];

        $charToWords = [
            "3" => "Foo",
            "5" => "Bar",
            "7" => "Qix",
        ];

        foreach( str_split( $string ) as $char )
        {
            if ( isset( $charToWords[ $char ] ) )
            {
                $result[] = $charToWords[ $char ];
            }
        }

        return implode( "", $result );
    }

    public static function multiples( int $number ): string
    {
        if ( $number < 1 ) return (string)$number;

        $dividerAndName = [
            3 => "Foo",
            5 => "Bar",
            7 => "Qix",
        ];

        $result = [];

        foreach ( $dividerAndName as $divider => $name )
        {
            if ( $number % $divider === 0 )
            {
                $result[] = $name;
            }
        }

        return $result
            ? implode( ", ", $result )
            : (string)$number;
    }
}