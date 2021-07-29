<?php
//split by 3
class NumtoWord
{
    private static $ones = array(
        0=>'ZERO',
        1=>'ONE',
        2=>'TWO',
        3=>'THREE',
        4=>'FOUR',
        5=>'FIVE',
        6=>'SIX',
        7=>'SEVEN',
        8=>'EIGHT',
        9=>'NINE',
        10=>'TEN'
    );
    private static $_11to20 = array(
        11=>'ELEVEN',
        12=>'TWELVE',
        13=>'THIRTEEN',
        14=>'FOURTEEN',
        15=>'FIFTEEN',
        16=>'SIXTEEN',
        17=>'SEVENTEEN',
        18=>'EIGHTEEN',
        19=>'NINETEEN'
    );
    private static $tens = array(
        1=>'TEN',
        2=>'TWENTY',
        3=>'THRITY',
        4=>'FORTY',
        5=>'FIFTY',
        6=>'SIXTY',
        7=>'SEVENTY',
        8=>'EIGHTY',
        9=>'NINETY'
    );
    private static $_h = array(
        0=>'HUNDRED',
        1=>'THOUSAND',
        2=>'MILLION',
        3=>'BILLION',
        4=>'TRILLION',
    );
    public function convert(int $number){
        $_n ='';
        if($number<0){
            $_n.='NEGATIVE';
            $number = substr($number,1);
        }elseif ($number==0)$_n.=self::$ones[$number];
        $_s=array_reverse(array_map("strrev",str_split(strrev($number),3)));
            $_h = sizeof($_s);
            for($_i=0;$_i<sizeof($_s);$_i++,$_h--){
                $_ss=array_map("strrev", array_reverse(str_split(strrev($_s[$_i]), 2)));
                for($_j=0,$_ssz = sizeof($_ss);$_j<$_sz=sizeof($_ss);$_j++){
                    $n = intval(ltrim($_ss[$_j]),0);
                    if($n!=0){
                        if(intdiv($n,10)>0 && $n>=20){$_n .= self::$tens[intdiv($n,10)];
                            if($n%10!=0) $_n .='-'.self::$ones[$n-intdiv($n,10)*10].' ';
                        }
                        if( $n<=10 && $n>0) $_n .= self::$ones[$n].' ';
                        elseif($n!=0 &&  $n<20 && $n>10) $_n .= self::$_11to20[$n].' ';
                        if($_ssz==2 && $_j==0){
                            $_n.= self::$_h[0].' ';
                            $_ssz--;
                        }
                    }
                }
                if($_s[$_i]>0){
                switch ($_h){
                    case 2;
                        $_n .= self::$_h[1].' ';
                        break;
                    case 3;
                        $_n .= self::$_h[2].' ';
                        break;
                    case 4;
                        $_n .= self::$_h[3].' ';
                        break;
                    case 5;
                        $_n .= self::$_h[4].' ';
                        break;
                  }
                }
            }
        return $_n;
    }
}


