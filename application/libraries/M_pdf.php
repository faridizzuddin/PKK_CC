<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//include_once APPPATH.'/third_party/mpdf/mpdf.php';
require_once APPPATH . '/third_party/mpdf/vendor/autoload.php';
// require_once APPPATH . 'third_party/mpdf/vendor/autoload.php';
// /klinikpanel/myklinik/app/

class M_pdf
{

    public $param;
    public $pdf;

    public function __construct($param = '"en-GB-x","A4","","",10,10,10,10,6,3')
    {
        $this->param = $param;
        //$this->pdf = new mPDF($this->param);
        //$this->pdf = new \Mpdf\Mpdf(); 
        $this->pdf = new \Mpdf\Mpdf(['tempDir' => APPPATH . 'logs/mpdf']);
    }
}