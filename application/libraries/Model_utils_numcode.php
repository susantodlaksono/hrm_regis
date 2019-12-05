<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @author SUSANTO DWI LAKSONO
 */

class Model_utils_numcode{
  private $nums;
  private $chars;
  private $numeral;
  /**
   * @param $string , String containing the chars that will be used for
   * the convension. !important each char can be present only once.
   */
  public function __construct($string)
  {
    $this->nums = str_split($string);
    $this->chars = array_flip($this->nums);
    if(count($this->nums) != count($this->chars))
    {
      throw new Exception("$string !important each char can be present only once.", 371);
    }
    $this->numeral = count($this->nums);
  }
  /**
   * Encodes a number to a string
   * @param int $int
   * @return string
   */
  public function encode($int)
  {
    // if(!is_int($int))
    // {
    //   throw new Exception("$int is not integer.", 372);
    // }
    return $this->convension($int, $this->numeral);
  }
  /**
   * Decodes a string to a number
   * @param string $string
   * @return number
   */
  public function decode($string)
  {
    $num = 0;
    $m = 1;
    $parts = str_split($string);
    $parts = array_reverse($parts);
    foreach($parts as $part)
    {
      if(!isset($this->chars[$part]))
      {
        throw new Exception("$part is not defined.", 373);
      }
      $num =  $num + $this->chars[$part] * $m;
      $m = $m * $this->numeral;
    }
    return $num;
  }
  /**
   * @see http://www.cut-the-knot.org/recurrence/conversion.shtml
   */
  private function convension($M,$N)
  {
    if($M  < $N)
    {
      return $this->nums[$M];
    }
    else
    {
      return $this->convension($M / $N, $N) . $this->nums[bcmod($M , $N)];
    }
  }
}