<?php


interface ConvertNumber {
    /**
     * @param int $number
     * @return string
     */
    public function convert(int $number): string;
}

class NumberConverter implements ConvertNumber {

    const DEFAULT_SIZE = 3;

    /**
     * @param int $number
     * @return string
     */
    public function convert(int $number): string
    {
        $_array_number = array_reverse($this->splitNumber($number));
        return $this->makeString($_array_number);
    }

    /**
     * @param array $array
     * @return string
     */
    private function makeString(array $array): string
    {
        $string = '';
        $incrementate = 1;

        for($i = 0 ; $i < count($array); $i++){

            $string .= $array[$i];
            if($incrementate % self::DEFAULT_SIZE == 0){
                $string .= ' ';
            }

            $incrementate++;
        }
        return strrev($string);
    }


    /**
     * @param $number
     * @return array
     */
    private function splitNumber(int $number):array
    {
        $num = (string)$number;
        return str_split($num);
    }
}

$number = 10000;
$numberConverter = new NumberConverter();
print_r($numberConverter->convert($number));

/**
 * Output: 10 000
 */