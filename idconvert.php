<?php

//if($_GET['steamid'])
//{
    //$steamid=$_GET['steamid'];
//}

//32bit id convert to 64 bit id
//from http://dev.dota2.com/showthread.php?t=47115&page=27&p=312817&viewfull=1#post312817

define('STEAM_ID_UPPER_32_BITS', '00000001000100000000000000000001');
    // gets the lower 32-bits of a 64-bit steam id
    function GET_32_BIT($ID_64)
    {
        $upper = gmp_mul(bindec(STEAM_ID_UPPER_32_BITS), '4294967296');

        return gmp_strval(gmp_sub($ID_64, $upper));
    }

    // creates a 64-bit steam id from the lower 32-bits
    function MAKE_64_BIT($ID_32, $hi = false)
    {
        if ($hi === false) {
            $hi = bindec(STEAM_ID_UPPER_32_BITS);
        }

        // workaround signed/unsigned braindamage on x32
        $hi = sprintf('%u', $hi);
        $ID_32 = sprintf('%u', $ID_32);

        return gmp_strval(gmp_add(gmp_mul($hi, '4294967296'), $ID_32));
    }

    //echo GET_32_BIT ($steamid);
//echo MAKE_64_BIT ($steamid);
     //6119 7960265728
//         109883310  32bit
//7656119 8070149038  64bit
