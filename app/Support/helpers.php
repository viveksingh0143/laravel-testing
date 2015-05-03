<?php
if ( ! function_exists('array_key_exists_in_another'))
{
    function array_key_exists_in_another(array $keys , array $array )
    {
        foreach($keys as $key)
            if(array_key_exists($key, $array))
                return true;
        return false;
    }
}


if ( ! function_exists('endsWith'))
{
    function endsWith($haystack,$needle,$case=true) {
        if($case){return (strcmp(substr($haystack, strlen($haystack) - strlen($needle)),$needle)===0);}
        return (strcasecmp(substr($haystack, strlen($haystack) - strlen($needle)),$needle)===0);
    }
}

if ( ! function_exists('getOperator'))
{
    function getOperator($coloumn) {
        if(endsWith($coloumn, '_not')) {
            return '<>';
        }
        elseif(endsWith($coloumn, '_lt')) {
            return '<';
        }
        elseif(endsWith($coloumn, '_gt')) {
            return '>';
        }
        elseif(endsWith($coloumn, '_lte')) {
            return '<=';
        }
        elseif(endsWith($coloumn, '_gte')) {
            return '>=';
        }
        else {
            return '=';
        }
    }
}

if ( ! function_exists('getColumn'))
{
    function getColumn($coloumn) {
        $coloumn = rtrim($coloumn, '_not');
        $coloumn = rtrim($coloumn, '_lt');
        $coloumn = rtrim($coloumn, '_gt');
        $coloumn = rtrim($coloumn, '_lte');
        $coloumn = rtrim($coloumn, '_gte');
        $coloumn = rtrim($coloumn, '_eq');
        return $coloumn;
    }
}

if ( ! function_exists('owner_number_to_words'))
{
    function owner_number_to_words($number) {
        if(!empty($number)) {
            switch($number) {
                case $number = '1':
                    return 'First Owner';
                case $number = '2':
                    return 'Second Owner';
                case $number = '3':
                    return 'Third Owner';
                case $number = '4':
                    return 'Fourth Owner';
                case $number = '5':
                    return 'Fifth Owner';
                case $number = '6':
                    return 'Sixth Owner';
                default:
                    return $number;
            }
        } else {
            return 'NP';
        }
    }
}


if ( ! function_exists('convert_number_to_words'))
{
    function convert_number_to_words($number) {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}


if ( ! function_exists('milliseconds')) {
    function milliseconds()
    {
        $mt = explode(' ', microtime());
        return $mt[1] * 1000 + round($mt[0] * 1000);
    }
}