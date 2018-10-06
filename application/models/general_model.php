<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class general_model extends CI_Model{
    public function convert_date($date){
      $tgl = substr($date, 8, 2) ;
      $bln = intval(substr($date, 5, 2)) ;
      $thn = substr($date, 0, 4) ;

      if ($bln==1) {
        $bb = "January";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==2) {
        $bb = "February";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==3) {
        $bb = "March";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==4) {
        $bb = "April";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==5) {
        $bb = "May";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==6) {
        $bb = "June";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==7) {
        $bb = "July";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==8) {
        $bb = "August";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==9) {
       $bb = "September";
       return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==10) {
        $bb = "October";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif ($bln==11) {
        $bb = "November";
        return $tgl.' '.$bb.' '.$thn;
      }
      elseif($bln==12) {
        $bb = "December";
        return $tgl.' '.$bb.' '.$thn;
      }
    }
  }

?>