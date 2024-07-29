<?php
    /**
     * PHPExcel
     *
     * Copyright (c) 2006 - 2015 PHPExcel
     *
     * This library is free software; you can redistribute it and/or
     * modify it under the terms of the GNU Lesser General Public
     * License as published by the Free Software Foundation; either
     * version 2.1 of the License, or (at your option) any later version.
     *
     * This library is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
     * Lesser General Public License for more details.
     *
     * You should have received a copy of the GNU Lesser General Public
     * License along with this library; if not, write to the Free Software
     * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
     *
     * @category   PHPExcel
     * @package    PHPExcel
     * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
     * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
     * @version    ##VERSION##, ##DATE##
     */

    /** Error reporting */
    error_reporting(0);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
    date_default_timezone_set('Europe/London');

    if (PHP_SAPI == 'cli')
    	die('This example should only be run from a Web Browser');

    /** Include PHPExcel */
    //require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

    require_once 'PHPExcel/Classes/PHPExcel.php';


    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    							 ->setLastModifiedBy("Maarten Balliauw")
    							 ->setTitle("Office 2007 XLSX Test Document")
    							 ->setSubject("Office 2007 XLSX Test Document")
    							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    							 ->setKeywords("office 2007 openxml php")
    							 ->setCategory("Test result file");


    // Add some data
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Company')
            ->setCellValue('B1', 'BillNO')
            ->setCellValue('C1', 'Party-Info')
            ->setCellValue('D1', 'Scheme/Int')
            ->setCellValue('E1', 'JewelType')
            ->setCellValue('F1', 'LoanAmount/INT amt/Receipt amt')
            ->setCellValue('G1', 'OD-Days')
            ->setCellValue('H1', 'OD-Amount')
            ->setCellValue('I1', 'Purity-%')
            ->setCellValue('J1', 'Action-Value');


        $i=2;
        foreach($noticeissueloandetails as $loanvalues)
        {
            $loandate=date_create($loanvalues['ENDATE']);

            //get dynamic data in array
            $totalloanint=($loanvalues['AMOUNT'] * $loanvalues['INTEREST'])/100;
            $companyname = $loanvalues['COMPANYNAME'];
            $billno  = $loanvalues['BILLNO'];
            $loandate = date_format($loandate,"d-m-Y");
            $partyname = $loanvalues['NAME'];
            $intresttype  = $loanvalues['INTEREST'];
            $intname = $loanvalues['INTNAME'];
            $jeweltype =$loanvalues['JEWEL_TYPE'];
            $loanamount = $loanvalues['AMOUNT'];


            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "$companyname")
                                          ->setCellValue('B' . $i, "$billno")
                                          ->setCellValue('C' . $i, "$partyname")
                                          ->setCellValue('D' . $i, "$intname/$intresttype")
                                          ->setCellValue('E' . $i, "$jeweltype ")
                                          ->setCellValue('F' . $i, "$loanamount/$totalloanint/9000")
                                          ->setCellValue('G' . $i, "2 Month 3 Days")
                                          ->setCellValue('H' . $i, "9225.00")
                                          ->setCellValue('I' . $i, "70")
                                          ->setCellValue('J' . $i, "4881.00");
                                          $i++;                         
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('LoanNoticeReports');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Loan_NoticeReports.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
