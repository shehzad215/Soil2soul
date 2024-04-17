<?php

App::import('Vendor', 'tcpdf/tcpdf');

class XTCPDF extends TCPDF {

    var $xheadertext = 'Heading';
    var $xheadercolor = array(0, 0, 200);
    var $xfootertext = '<hr noshade="noshade" align="left" style="border-color: #CFCFCF; border-style: dashed; color: #CFCFCF; height: 1px; margin-top: -5px; text-align: center;">
        <span style="font-family: verdana, arial, sans-serif; font-size:10px;" >
        <b>B.K. Birla College of Arts, Science & Commerce, Kalyan</b></span>';
    var $xfooterfont = 'times';
    var $xfooterfontsize = 12;

    /**
     * Overwrites the default header
     * set the text in the view using
     *    $fpdf->xheadertext = 'YOUR ORGANIZATION';
     * set the fill color in the view using
     *    $fpdf->xheadercolor = array(0,0,100); (r, g, b)
     * set the font in the view using
     *    $fpdf->setHeaderFont(array('YourFont','',fontsize));
     */
    function Header() {

        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 10, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
         
    }

    /**
     * Overwrites the default footer
     * set the text in the view using
     * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.';
     */
    function Footer() {
        $footertext = sprintf($this->xfootertext, date('Y'));
        $this->SetY(-20);
        $this->SetFillColor(255, 255, 255);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
         $this->Cell(220, 20, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
         $this->SetY(-18);

        // write the second column
        $this->writeHTMLCell(0, 10, '', '', $this->xfootertext, '', 1, 0, true, 'L', true);
      }

}

?>  
