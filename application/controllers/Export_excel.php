<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_excel extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('DataLB1_model');
      $this->load->model('M_Kepala_puskesmas');
      $this->load->model('M_Dinkes');
      $this->load->model('M_Penyakit_banyak');
      $this->load->model('Login_model');
      $this->load->helper(array('form', 'url'));
    }
    public function header() {
        if ($this->session->userdata('level') == '2') {
            $data['user'] = $this->Login_model->get()->result();
          $pesan = $this->DataLB1_model->pesan();
          $data['pesan'] = count($pesan);
          $data['data_pesan'] = $pesan;
          $result = $this->DataLB1_model->notif();
          $data['notif'] = count($result);
          $data['data_notif'] = $result;
          $this->load->view('header/lb_header', $data);
        } elseif ($this->session->userdata('level') == '3') {
            $data['user'] = $this->Login_model->get()->result();
          $result = $this->M_Kepala_puskesmas->notif();
          $data['notif'] = count($result);
          $data['data_notif'] = $result;
          $this->load->view('header/kp_header', $data);
        } elseif ($this->session->userdata('level') == '4') {
            $data['user'] = $this->Login_model->get()->result();
          $result = $this->M_Dinkes->notif();
          $data['notif'] = count($result);
          $data['data_notif'] = $result;
          $this->load->view('header/d_header', $data);
        } 
    }

    public function cetakExcelLB()
    {
      $data['daftarBulan'] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November", "Desember");
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $spreadsheet = new Spreadsheet();
      $spreadsheet->getProperties()->setCreator('Export - Excel')
      ->setLastModifiedBy('Export - Excel')
      ->setTitle('Office 2007 XLSX Test Document')
      ->setSubject('Office 2007 XLSX Test Document')
      ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
      ->setKeywords('office 2007 openxml php')
      ->setCategory('Test result file');
      $spreadsheet->setActiveSheetIndex(0);
      $activeSheet = $spreadsheet->getActiveSheet();

      $activeSheet
      ->setCellValue('A1', 'LAPORAN DATA KESAKITAN TAHUN 2020')
      ->setCellValue('A2', 'Kode Puskesmas')
      ->setCellValue('A3', 'Puskesmas')
      ->setCellValue('A4', 'Kecamatan')
      ->setCellValue('A5', 'Kota')
      ->setCellValue('A6', 'KODE DX')
      ->mergeCells('A6:A9')
      ->setCellValue('B6', 'KODE ICDX')
      ->mergeCells('B6:B9')
      ->setCellValue('C6', 'NAMA PENYAKIT')
      ->mergeCells('C6:C9')
      ->setCellValue('D6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
      ->mergeCells('D6:AI6')
      ->setCellValue('D7', '0-7 Hari')
      ->mergeCells('D7:K7')
      ->setCellValue('D8', 'BARU')
      ->mergeCells('D8:E8')
      ->setCellValue('D9', 'L')
      ->setCellValue('E9', 'P')
      ->setCellValue('F8', 'LAMA')
      ->mergeCells('F8:G8')
      ->setCellValue('F9', 'L')
      ->setCellValue('G9', 'P')
      ->setCellValue('H8', 'KKL')
      ->mergeCells('H8:I8')
      ->setCellValue('H9', 'L')
      ->setCellValue('I9', 'P')
      ->setCellValue('J8', 'JKK')
      ->mergeCells('J8:K8')
      ->setCellValue('J9', 'L')
      ->setCellValue('K9', 'P')
      ->setCellValue('L7', '8-28 Hari')
      ->mergeCells('L7:S7')
      ->setCellValue('L8', 'BARU')
      ->mergeCells('L8:M8')
      ->setCellValue('L9', 'L')
      ->setCellValue('M9', 'P')
      ->setCellValue('N8', 'LAMA')
      ->mergeCells('N8:O8')
      ->setCellValue('N9', 'L')
      ->setCellValue('O9', 'P')
      ->setCellValue('P8', 'KKL')
      ->mergeCells('P8:Q8')
      ->setCellValue('P9', 'L')
      ->setCellValue('Q9', 'P')
      ->setCellValue('R8', 'JKK')
      ->mergeCells('R8:S8')
      ->setCellValue('R9', 'L')
      ->setCellValue('S9', 'P')
      ->setCellValue('T7', '>29-1 Tahun')
      ->mergeCells('T7:AA7')
      ->setCellValue('T8', 'BARU')
      ->mergeCells('T8:U8')
      ->setCellValue('T9', 'L')
      ->setCellValue('U9', 'P')
      ->setCellValue('V8', 'LAMA')
      ->mergeCells('V8:W8')
      ->setCellValue('V9', 'L')
      ->setCellValue('W9', 'P')
      ->setCellValue('X8', 'KKL')
      ->mergeCells('X8:Y8')
      ->setCellValue('X9', 'L')
      ->setCellValue('Y9', 'P')
      ->setCellValue('Z8', 'JKK')
      ->mergeCells('Z8:AA8')
      ->setCellValue('Z9', 'L')
      ->setCellValue('AA9', 'P')
      ->setCellValue('AB7', '1-4 Tahun')
      ->mergeCells('AB7:AI7')
      ->setCellValue('AB8', 'BARU')
      ->mergeCells('AB8:AC8')
      ->setCellValue('AB9', 'L')
      ->setCellValue('AC9', 'P')
      ->setCellValue('AD8', 'LAMA')
      ->mergeCells('AD8:AE8')
      ->setCellValue('AD9', 'L')
      ->setCellValue('AE9', 'P')
      ->setCellValue('AF8', 'KKL')
      ->mergeCells('AF8:AG8')
      ->setCellValue('AF9', 'L')
      ->setCellValue('AG9', 'P')
      ->setCellValue('AH8', 'JKK')
      ->mergeCells('AH8:AI8')
      ->setCellValue('AH9', 'L')
      ->setCellValue('AI9', 'P')
      ->setCellValue('AJ6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
      ->mergeCells('AJ6:BO6')
      ->setCellValue('AJ7', '5-9 Tahun')
      ->mergeCells('AJ7:AQ7')
      ->setCellValue('AJ8', 'BARU')
      ->mergeCells('AJ8:AK8')
      ->setCellValue('AJ9', 'L')
      ->setCellValue('AK9', 'P')
      ->setCellValue('AL8', 'LAMA')
      ->mergeCells('AL8:AM8')
      ->setCellValue('AL9', 'L')
      ->setCellValue('AM9', 'P')
      ->setCellValue('AN8', 'KKL')
      ->mergeCells('AN8:AO8')
      ->setCellValue('AN9', 'L')
      ->setCellValue('AO9', 'P')
      ->setCellValue('AP8', 'JKK')
      ->mergeCells('AP8:AQ8')
      ->setCellValue('AP9', 'L')
      ->setCellValue('AQ9', 'P')
      ->setCellValue('AR7', '10-14 Tahun')
      ->mergeCells('AR7:AY7')
      ->setCellValue('AR8', 'BARU')
      ->mergeCells('AR8:AS8')
      ->setCellValue('AR9', 'L')
      ->setCellValue('AS9', 'P')
      ->setCellValue('AT8', 'LAMA')
      ->mergeCells('AT8:AU8')
      ->setCellValue('AT9', 'L')
      ->setCellValue('AU9', 'P')
      ->setCellValue('AV8', 'KKL')
      ->mergeCells('AV8:AW8')
      ->setCellValue('AV9', 'L')
      ->setCellValue('AW9', 'P')
      ->setCellValue('AX8', 'JKK')
      ->mergeCells('AX8:AY8')
      ->setCellValue('AX9', 'L')
      ->setCellValue('AY9', 'P')
      ->setCellValue('AZ7', '15-19 Tahun')
      ->mergeCells('AZ7:BG7')
      ->setCellValue('AZ8', 'BARU')
      ->mergeCells('AZ8:BA8')
      ->setCellValue('AZ9', 'L')
      ->setCellValue('BA9', 'P')
      ->setCellValue('BB8', 'LAMA')
      ->mergeCells('BB8:BC8')
      ->setCellValue('BB9', 'L')
      ->setCellValue('BC9', 'P')
      ->setCellValue('BD8', 'KKL')
      ->mergeCells('BD8:BE8')
      ->setCellValue('BD9', 'L')
      ->setCellValue('BE9', 'P')
      ->setCellValue('BF8', 'JKK')
      ->mergeCells('BF8:BG8')
      ->setCellValue('BF9', 'L')
      ->setCellValue('BG9', 'P')
      ->setCellValue('BH7', '20-44 Tahun')
      ->mergeCells('BH7:BO7')
      ->setCellValue('BH8', 'BARU')
      ->mergeCells('BH8:BI8')
      ->setCellValue('BH9', 'L')
      ->setCellValue('BI9', 'P')
      ->setCellValue('BJ8', 'LAMA')
      ->mergeCells('BJ8:BK8')
      ->setCellValue('BJ9', 'L')
      ->setCellValue('BK9', 'P')
      ->setCellValue('BL8', 'KKL')
      ->mergeCells('BL8:BM8')
      ->setCellValue('BL9', 'L')
      ->setCellValue('BM9', 'P')
      ->setCellValue('BN8', 'JKK')
      ->mergeCells('BN8:BO8')
      ->setCellValue('BN9', 'L')
      ->setCellValue('BO9', 'P')
      ->setCellValue('BP6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
      ->mergeCells('BP6:CU6')
      ->setCellValue('BP7', '45-54 Tahun')
      ->mergeCells('BP7:BW7')
      ->setCellValue('BP8', 'BARU')
      ->mergeCells('BP8:BQ8')
      ->setCellValue('BP9', 'L')
      ->setCellValue('BQ9', 'P')
      ->setCellValue('BR8', 'LAMA')
      ->mergeCells('BR8:BS8')
      ->setCellValue('BR9', 'L')
      ->setCellValue('BS9', 'P')
      ->setCellValue('BT8', 'KKL')
      ->mergeCells('BT8:BU8')
      ->setCellValue('BT9', 'L')
      ->setCellValue('BU9', 'P')
      ->setCellValue('BV8', 'JKK')
      ->mergeCells('BV8:BW8')
      ->setCellValue('BV9', 'L')
      ->setCellValue('BW9', 'P')
      ->setCellValue('BX7', '55-59 Tahun')
      ->mergeCells('BX7:CE7')
      ->setCellValue('BX8', 'BARU')
      ->mergeCells('BX8:BY8')
      ->setCellValue('BX9', 'L')
      ->setCellValue('BY9', 'P')
      ->setCellValue('BZ8', 'LAMA')
      ->mergeCells('BZ8:CA8')
      ->setCellValue('BZ9', 'L')
      ->setCellValue('CA9', 'P')
      ->setCellValue('CB8', 'KKL')
      ->mergeCells('CB8:CC8')
      ->setCellValue('CB9', 'L')
      ->setCellValue('CC9', 'P')
      ->setCellValue('CD8', 'JKK')
      ->mergeCells('CD8:CE8')
      ->setCellValue('CD9', 'L')
      ->setCellValue('CE9', 'P')
      ->setCellValue('CF7', '60-69 Tahun')
      ->mergeCells('CF7:CM7')
      ->setCellValue('CF8', 'BARU')
      ->mergeCells('CF8:CG8')
      ->setCellValue('CF9', 'L')
      ->setCellValue('CG9', 'P')
      ->setCellValue('CH8', 'LAMA')
      ->mergeCells('CH8:CI8')
      ->setCellValue('CH9', 'L')
      ->setCellValue('CI9', 'P')
      ->setCellValue('CJ8', 'KKL')
      ->mergeCells('CJ8:CK8')
      ->setCellValue('CJ9', 'L')
      ->setCellValue('CK9', 'P')
      ->setCellValue('CL8', 'JKK')
      ->mergeCells('CL8:CM8')
      ->setCellValue('CL9', 'L')
      ->setCellValue('CM9', 'P')
      ->setCellValue('CN7', '>70 Tahun')
      ->mergeCells('CN7:CU7')
      ->setCellValue('CN8', 'BARU')
      ->mergeCells('CN8:CO8')
      ->setCellValue('CN9', 'L')
      ->setCellValue('CO9', 'P')
      ->setCellValue('CP8', 'LAMA')
      ->mergeCells('CP8:CQ8')
      ->setCellValue('CP9', 'L')
      ->setCellValue('CQ9', 'P')
      ->setCellValue('CR8', 'KKL')
      ->mergeCells('CR8:CS8')
      ->setCellValue('CR9', 'L')
      ->setCellValue('CS9', 'P')
      ->setCellValue('CT8', 'JKK')
      ->mergeCells('CT8:CU8')
      ->setCellValue('CT9', 'L')
      ->setCellValue('CU9', 'P')
      ->setCellValue('CV6', 'TOTAL')
      ->mergeCells('CV6:DC7')
      ->setCellValue('CV8', 'BARU')
      ->mergeCells('CV8:CW8')
      ->setCellValue('CV9', 'L')
      ->setCellValue('CW9', 'P')
      ->setCellValue('CX8', 'LAMA')
      ->mergeCells('CX8:CY8')
      ->setCellValue('CX9', 'L')
      ->setCellValue('CY9', 'P')
      ->setCellValue('CZ8', 'KKL')
      ->mergeCells('CZ8:DA8')
      ->setCellValue('CZ9', 'L')
      ->setCellValue('DA9', 'P')
      ->setCellValue('DB8', 'JKK')
      ->mergeCells('DB8:DC8')
      ->setCellValue('DB9', 'L')
      ->setCellValue('DC9', 'P')
      ->setCellValue('A459', 'JUMLAH')
      ->mergeCells('A459:C459')
      ;
      $activeSheet->getColumnDimension('B')->setAutoSize(true);
      $activeSheet->getColumnDimension('C')->setAutoSize(true);
      foreach (range('D','Z') as $col) {
          $activeSheet->getColumnDimension($col)->setWidth(3);  
      }
      $activeSheet->getColumnDimension('AA')->setWidth(3);
      $activeSheet->getColumnDimension('AB')->setWidth(3);
      $activeSheet->getColumnDimension('AC')->setWidth(3);
      $activeSheet->getColumnDimension('AD')->setWidth(3);
      $activeSheet->getColumnDimension('AE')->setWidth(3);
      $activeSheet->getColumnDimension('AF')->setWidth(3);
      $activeSheet->getColumnDimension('AG')->setWidth(3);
      $activeSheet->getColumnDimension('AH')->setWidth(3);
      $activeSheet->getColumnDimension('AI')->setWidth(3);
      $activeSheet->getColumnDimension('AJ')->setWidth(3);
      $activeSheet->getColumnDimension('AK')->setWidth(3);
      $activeSheet->getColumnDimension('AL')->setWidth(3);
      $activeSheet->getColumnDimension('AM')->setWidth(3);
      $activeSheet->getColumnDimension('AN')->setWidth(3);
      $activeSheet->getColumnDimension('AO')->setWidth(3);
      $activeSheet->getColumnDimension('AP')->setWidth(3);
      $activeSheet->getColumnDimension('AQ')->setWidth(3);
      $activeSheet->getColumnDimension('AR')->setWidth(3);
      $activeSheet->getColumnDimension('AS')->setWidth(3);
      $activeSheet->getColumnDimension('AT')->setWidth(3);
      $activeSheet->getColumnDimension('AU')->setWidth(3);
      $activeSheet->getColumnDimension('AV')->setWidth(3);
      $activeSheet->getColumnDimension('AW')->setWidth(3);
      $activeSheet->getColumnDimension('AX')->setWidth(3);
      $activeSheet->getColumnDimension('AY')->setWidth(3);
      $activeSheet->getColumnDimension('AZ')->setWidth(3);
      $activeSheet->getColumnDimension('BA')->setWidth(3);
      $activeSheet->getColumnDimension('BB')->setWidth(3);
      $activeSheet->getColumnDimension('BC')->setWidth(3);
      $activeSheet->getColumnDimension('BD')->setWidth(3);
      $activeSheet->getColumnDimension('BE')->setWidth(3);
      $activeSheet->getColumnDimension('BF')->setWidth(3);
      $activeSheet->getColumnDimension('BG')->setWidth(3);
      $activeSheet->getColumnDimension('BH')->setWidth(3);
      $activeSheet->getColumnDimension('BI')->setWidth(3);
      $activeSheet->getColumnDimension('BJ')->setWidth(3);
      $activeSheet->getColumnDimension('BK')->setWidth(3);
      $activeSheet->getColumnDimension('BL')->setWidth(3);
      $activeSheet->getColumnDimension('BM')->setWidth(3);
      $activeSheet->getColumnDimension('BN')->setWidth(3);
      $activeSheet->getColumnDimension('BO')->setWidth(3);
      $activeSheet->getColumnDimension('BP')->setWidth(3);
      $activeSheet->getColumnDimension('BQ')->setWidth(3);
      $activeSheet->getColumnDimension('BR')->setWidth(3);
      $activeSheet->getColumnDimension('BS')->setWidth(3);
      $activeSheet->getColumnDimension('BT')->setWidth(3);
      $activeSheet->getColumnDimension('BU')->setWidth(3);
      $activeSheet->getColumnDimension('BV')->setWidth(3);
      $activeSheet->getColumnDimension('BW')->setWidth(3);
      $activeSheet->getColumnDimension('BX')->setWidth(3);
      $activeSheet->getColumnDimension('BY')->setWidth(3);
      $activeSheet->getColumnDimension('BZ')->setWidth(3);
      $activeSheet->getColumnDimension('CA')->setWidth(3);
      $activeSheet->getColumnDimension('CB')->setWidth(3);
      $activeSheet->getColumnDimension('CC')->setWidth(3);
      $activeSheet->getColumnDimension('CD')->setWidth(3);
      $activeSheet->getColumnDimension('CE')->setWidth(3);
      $activeSheet->getColumnDimension('CF')->setWidth(3);
      $activeSheet->getColumnDimension('CG')->setWidth(3);
      $activeSheet->getColumnDimension('CH')->setWidth(3);
      $activeSheet->getColumnDimension('CI')->setWidth(3);
      $activeSheet->getColumnDimension('CJ')->setWidth(3);
      $activeSheet->getColumnDimension('CK')->setWidth(3);
      $activeSheet->getColumnDimension('CL')->setWidth(3);
      $activeSheet->getColumnDimension('CM')->setWidth(3);
      $activeSheet->getColumnDimension('CN')->setWidth(3);
      $activeSheet->getColumnDimension('CO')->setWidth(3);
      $activeSheet->getColumnDimension('CP')->setWidth(3);
      $activeSheet->getColumnDimension('CQ')->setWidth(3);
      $activeSheet->getColumnDimension('CR')->setWidth(3);
      $activeSheet->getColumnDimension('CS')->setWidth(3);
      $activeSheet->getColumnDimension('CT')->setWidth(3);
      $activeSheet->getColumnDimension('CU')->setWidth(3);
      $activeSheet->getColumnDimension('CV')->setWidth(3);
      $activeSheet->getColumnDimension('CW')->setWidth(3);
      $activeSheet->getColumnDimension('CX')->setWidth(3);
      $activeSheet->getColumnDimension('CY')->setWidth(3);
      $activeSheet->getColumnDimension('CZ')->setWidth(3);
      $activeSheet->getColumnDimension('DA')->setWidth(3);
      $activeSheet->getColumnDimension('DB')->setWidth(3);
      $activeSheet->getColumnDimension('DC')->setWidth(3);
      $styleArray = [
          'borders' => [
              'allBorders' => [
                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
              ],
          ],
      ];
      $activeSheet->getStyle('A6:DC459')->applyFromArray($styleArray);
      $styleAlg = [
          'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
          ],
      ];
      $activeSheet->getStyle('A6:DC9')->applyFromArray($styleAlg);
      if ($this->session->userdata('level') == '2') {
        $dt = $this->DataLB1_model->getCetakLB1($bulan, $tahun);
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
            $this->header();
            $this->load->view('laporan_bulanan/cetak_LB1bulan');
            $this->load->view('footer/lb_footer');
        }else {
            $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
            $data = $this->DataLB1_model->getCetakLB1($bulan, $tahun);
            $datalaporan = json_decode($data[0]->datalb1);
            // var_dump($datalaporan);
            $i = 10;
            // $b = 10;
            $arrData = array();
            foreach ($dtKP as $dk) {
                // $activeSheet->setCellValue('A'.$b, $dk->kategori_penyakit);
                // $activeSheet->setCellValue('A'.$c, $dk->kategori_penyakit);
                // var_dump($dk->kode_dx); 
                // var_dump($dk->kategori_penyakit); 
                foreach($datalaporan as $d){      
                    if ($d->kode_dx == $dk->kode_dx) {
                    
                    $totBaruP = 0;
                    $totBaruL = 0;
                    $totLamaP = 0;
                    $totLamaL = 0;
                    $totKKLP = 0;
                    $totKKLL = 0;
                    $totJKKP = 0;
                    $totJKKL = 0; 
                    $arrData[$i] = [];
                    $activeSheet
                    ->setCellValue('A'.$i, $d->kode_dx)
                    ->setCellValue('B'.$i, $d->kode_icdx)
                    ->setCellValue('C'.$i, $d->nama_penyakit);
                    if (count($d->pasien) == 0) {
                        $k = 4;
                        for ($x=0;$x<12;$x++) { 
                        $dt =0;
                        $activeSheet
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt)
                        ->setCellValueByColumnAndRow($k++, $i, $dt);
                        $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                        $arrData[$i] = array_merge($arrData[$i],$tempArr);
                        }
                    }else {
                        $k = 4;
                        foreach ($d->pasien as $pas) {
                        $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                        $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                        $totBaruP += $pas->Baru->Perempuan;
                        $totBaruL += $pas->Baru->Laki;
                        $totLamaP += $pas->Lama->Perempuan;
                        $totLamaL += $pas->Lama->Laki;
                        $totKKLP += $pas->KKL->Perempuan;
                        $totKKLL += $pas->KKL->Laki;
                        $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                        $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                        $br_lk = $pas->Baru->Laki;
                        $activeSheet
                        ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                        ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                        ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                        ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                        ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                        ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                        ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                        ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                        $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                        $arrData[$i] = array_merge($arrData[$i],$tempArr);
                        }
                    }
                    $activeSheet
                    ->setCellValue('CV'.$i, $totBaruL)
                    ->setCellValue('CW'.$i, $totBaruP)
                    ->setCellValue('CX'.$i, $totLamaL)
                    ->setCellValue('CY'.$i, $totLamaP)
                    ->setCellValue('CZ'.$i, $totKKLL)
                    ->setCellValue('DA'.$i, $totKKLP)
                    ->setCellValue('DB'.$i, $totJKKL)
                    ->setCellValue('DC'.$i, $totJKKP);
                        $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                        $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    $i++; 
                    }
                }
            }
            $maxRow = $activeSheet->getHighestRow();
            $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }  
            $activeSheet->setTitle('Bulan '.date('d-m-Y H'));
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Laporan Bulanan.xlsx"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }
      }elseif ($this->session->userdata('level') == '3'){
        $dt = $this->M_Kepala_puskesmas->getCetakBulan($bulan, $tahun);
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
            $this->header();
            $this->load->view('kepala_puskesmas/view_cetakBulanLB');
            $this->load->view('footer/kp_footer');
        }else {
            $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
            $data = $this->M_Kepala_puskesmas->getCetakBulan($bulan, $tahun);
            $datalaporan = json_decode($data[0]->datalb1);
            $i = 10;
            $arrData = array();
            foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
            }
            $maxRow = $activeSheet->getHighestRow();
            $maxLoop = $maxRow - 10;
            for($x=0;$x<104;$x++){
                $count = 0;
                for($i=10;$i<=$maxLoop;$i++){
                    $count += $arrData[$i][$x];
                }
                $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
            }
            $activeSheet->setTitle('Bulan '.date('d-m-Y H'));
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Laporan Bulanan.xlsx"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }
      }elseif ($this->session->userdata('level') == '4') {
        $dt = $this->M_Dinkes->CetakBulan($bulan, $tahun);
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
            $this->header();
            $this->load->view('dinkes/view_cetakBulan');
            $this->load->view('footer/d_footer');
        }else {
            $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
            $data = $this->M_Dinkes->CetakBulan($bulan, $tahun);
            $datalaporan = json_decode($data[0]->datalb1);
            $i = 10;
            $arrData = array();
            foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
            }
            $maxRow = $activeSheet->getHighestRow();
            $maxLoop = $maxRow - 10;
            for($x=0;$x<104;$x++){
                $count = 0;
                for($i=10;$i<=$maxLoop;$i++){
                    $count += $arrData[$i][$x];
                }
                $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
            }
            $activeSheet->setTitle('Bulan '.date('d-m-Y H'));
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Laporan Bulanan.xlsx"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;
        }
      }      
    }
    public function cetakTribln()
    {
        $data['daftarTribulan'] = array("Tribulan 1","Tribulan 2","Tribulan 3", "Tribulan 4");
        $tribulan = $this->input->post('tribulan');
        $tahun = $this->input->post('tahun');
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Export - Excel')
        ->setLastModifiedBy('Export - Excel')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet
        ->setCellValue('A1', 'LAPORAN DATA KESAKITAN TAHUN 2020')
        ->setCellValue('A2', 'Kode Puskesmas')
        ->setCellValue('A3', 'Puskesmas')
        ->setCellValue('A4', 'Kecamatan')
        ->setCellValue('A5', 'Kota')
        ->setCellValue('A6', 'KODE DX')
        ->mergeCells('A6:A9')
        ->setCellValue('B6', 'KODE ICDX')
        ->mergeCells('B6:B9')
        ->setCellValue('C6', 'NAMA PENYAKIT')
        ->mergeCells('C6:C9')
        ->setCellValue('D6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
        ->mergeCells('D6:AI6')
        ->setCellValue('D7', '0-7 Hari')
        ->mergeCells('D7:K7')
        ->setCellValue('D8', 'BARU')
        ->mergeCells('D8:E8')
        ->setCellValue('D9', 'L')
        ->setCellValue('E9', 'P')
        ->setCellValue('F8', 'LAMA')
        ->mergeCells('F8:G8')
        ->setCellValue('F9', 'L')
        ->setCellValue('G9', 'P')
        ->setCellValue('H8', 'KKL')
        ->mergeCells('H8:I8')
        ->setCellValue('H9', 'L')
        ->setCellValue('I9', 'P')
        ->setCellValue('J8', 'JKK')
        ->mergeCells('J8:K8')
        ->setCellValue('J9', 'L')
        ->setCellValue('K9', 'P')
        ->setCellValue('L7', '8-28 Hari')
        ->mergeCells('L7:S7')
        ->setCellValue('L8', 'BARU')
        ->mergeCells('L8:M8')
        ->setCellValue('L9', 'L')
        ->setCellValue('M9', 'P')
        ->setCellValue('N8', 'LAMA')
        ->mergeCells('N8:O8')
        ->setCellValue('N9', 'L')
        ->setCellValue('O9', 'P')
        ->setCellValue('P8', 'KKL')
        ->mergeCells('P8:Q8')
        ->setCellValue('P9', 'L')
        ->setCellValue('Q9', 'P')
        ->setCellValue('R8', 'JKK')
        ->mergeCells('R8:S8')
        ->setCellValue('R9', 'L')
        ->setCellValue('S9', 'P')
        ->setCellValue('T7', '>29-1 Tahun')
        ->mergeCells('T7:AA7')
        ->setCellValue('T8', 'BARU')
        ->mergeCells('T8:U8')
        ->setCellValue('T9', 'L')
        ->setCellValue('U9', 'P')
        ->setCellValue('V8', 'LAMA')
        ->mergeCells('V8:W8')
        ->setCellValue('V9', 'L')
        ->setCellValue('W9', 'P')
        ->setCellValue('X8', 'KKL')
        ->mergeCells('X8:Y8')
        ->setCellValue('X9', 'L')
        ->setCellValue('Y9', 'P')
        ->setCellValue('Z8', 'JKK')
        ->mergeCells('Z8:AA8')
        ->setCellValue('Z9', 'L')
        ->setCellValue('AA9', 'P')
        ->setCellValue('AB7', '1-4 Tahun')
        ->mergeCells('AB7:AI7')
        ->setCellValue('AB8', 'BARU')
        ->mergeCells('AB8:AC8')
        ->setCellValue('AB9', 'L')
        ->setCellValue('AC9', 'P')
        ->setCellValue('AD8', 'LAMA')
        ->mergeCells('AD8:AE8')
        ->setCellValue('AD9', 'L')
        ->setCellValue('AE9', 'P')
        ->setCellValue('AF8', 'KKL')
        ->mergeCells('AF8:AG8')
        ->setCellValue('AF9', 'L')
        ->setCellValue('AG9', 'P')
        ->setCellValue('AH8', 'JKK')
        ->mergeCells('AH8:AI8')
        ->setCellValue('AH9', 'L')
        ->setCellValue('AI9', 'P')
        ->setCellValue('AJ6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
        ->mergeCells('AJ6:BO6')
        ->setCellValue('AJ7', '5-9 Tahun')
        ->mergeCells('AJ7:AQ7')
        ->setCellValue('AJ8', 'BARU')
        ->mergeCells('AJ8:AK8')
        ->setCellValue('AJ9', 'L')
        ->setCellValue('AK9', 'P')
        ->setCellValue('AL8', 'LAMA')
        ->mergeCells('AL8:AM8')
        ->setCellValue('AL9', 'L')
        ->setCellValue('AM9', 'P')
        ->setCellValue('AN8', 'KKL')
        ->mergeCells('AN8:AO8')
        ->setCellValue('AN9', 'L')
        ->setCellValue('AO9', 'P')
        ->setCellValue('AP8', 'JKK')
        ->mergeCells('AP8:AQ8')
        ->setCellValue('AP9', 'L')
        ->setCellValue('AQ9', 'P')
        ->setCellValue('AR7', '10-14 Tahun')
        ->mergeCells('AR7:AY7')
        ->setCellValue('AR8', 'BARU')
        ->mergeCells('AR8:AS8')
        ->setCellValue('AR9', 'L')
        ->setCellValue('AS9', 'P')
        ->setCellValue('AT8', 'LAMA')
        ->mergeCells('AT8:AU8')
        ->setCellValue('AT9', 'L')
        ->setCellValue('AU9', 'P')
        ->setCellValue('AV8', 'KKL')
        ->mergeCells('AV8:AW8')
        ->setCellValue('AV9', 'L')
        ->setCellValue('AW9', 'P')
        ->setCellValue('AX8', 'JKK')
        ->mergeCells('AX8:AY8')
        ->setCellValue('AX9', 'L')
        ->setCellValue('AY9', 'P')
        ->setCellValue('AZ7', '15-19 Tahun')
        ->mergeCells('AZ7:BG7')
        ->setCellValue('AZ8', 'BARU')
        ->mergeCells('AZ8:BA8')
        ->setCellValue('AZ9', 'L')
        ->setCellValue('BA9', 'P')
        ->setCellValue('BB8', 'LAMA')
        ->mergeCells('BB8:BC8')
        ->setCellValue('BB9', 'L')
        ->setCellValue('BC9', 'P')
        ->setCellValue('BD8', 'KKL')
        ->mergeCells('BD8:BE8')
        ->setCellValue('BD9', 'L')
        ->setCellValue('BE9', 'P')
        ->setCellValue('BF8', 'JKK')
        ->mergeCells('BF8:BG8')
        ->setCellValue('BF9', 'L')
        ->setCellValue('BG9', 'P')
        ->setCellValue('BH7', '20-44 Tahun')
        ->mergeCells('BH7:BO7')
        ->setCellValue('BH8', 'BARU')
        ->mergeCells('BH8:BI8')
        ->setCellValue('BH9', 'L')
        ->setCellValue('BI9', 'P')
        ->setCellValue('BJ8', 'LAMA')
        ->mergeCells('BJ8:BK8')
        ->setCellValue('BJ9', 'L')
        ->setCellValue('BK9', 'P')
        ->setCellValue('BL8', 'KKL')
        ->mergeCells('BL8:BM8')
        ->setCellValue('BL9', 'L')
        ->setCellValue('BM9', 'P')
        ->setCellValue('BN8', 'JKK')
        ->mergeCells('BN8:BO8')
        ->setCellValue('BN9', 'L')
        ->setCellValue('BO9', 'P')
        ->setCellValue('BP6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
        ->mergeCells('BP6:CU6')
        ->setCellValue('BP7', '45-54 Tahun')
        ->mergeCells('BP7:BW7')
        ->setCellValue('BP8', 'BARU')
        ->mergeCells('BP8:BQ8')
        ->setCellValue('BP9', 'L')
        ->setCellValue('BQ9', 'P')
        ->setCellValue('BR8', 'LAMA')
        ->mergeCells('BR8:BS8')
        ->setCellValue('BR9', 'L')
        ->setCellValue('BS9', 'P')
        ->setCellValue('BT8', 'KKL')
        ->mergeCells('BT8:BU8')
        ->setCellValue('BT9', 'L')
        ->setCellValue('BU9', 'P')
        ->setCellValue('BV8', 'JKK')
        ->mergeCells('BV8:BW8')
        ->setCellValue('BV9', 'L')
        ->setCellValue('BW9', 'P')
        ->setCellValue('BX7', '55-59 Tahun')
        ->mergeCells('BX7:CE7')
        ->setCellValue('BX8', 'BARU')
        ->mergeCells('BX8:BY8')
        ->setCellValue('BX9', 'L')
        ->setCellValue('BY9', 'P')
        ->setCellValue('BZ8', 'LAMA')
        ->mergeCells('BZ8:CA8')
        ->setCellValue('BZ9', 'L')
        ->setCellValue('CA9', 'P')
        ->setCellValue('CB8', 'KKL')
        ->mergeCells('CB8:CC8')
        ->setCellValue('CB9', 'L')
        ->setCellValue('CC9', 'P')
        ->setCellValue('CD8', 'JKK')
        ->mergeCells('CD8:CE8')
        ->setCellValue('CD9', 'L')
        ->setCellValue('CE9', 'P')
        ->setCellValue('CF7', '60-69 Tahun')
        ->mergeCells('CF7:CM7')
        ->setCellValue('CF8', 'BARU')
        ->mergeCells('CF8:CG8')
        ->setCellValue('CF9', 'L')
        ->setCellValue('CG9', 'P')
        ->setCellValue('CH8', 'LAMA')
        ->mergeCells('CH8:CI8')
        ->setCellValue('CH9', 'L')
        ->setCellValue('CI9', 'P')
        ->setCellValue('CJ8', 'KKL')
        ->mergeCells('CJ8:CK8')
        ->setCellValue('CJ9', 'L')
        ->setCellValue('CK9', 'P')
        ->setCellValue('CL8', 'JKK')
        ->mergeCells('CL8:CM8')
        ->setCellValue('CL9', 'L')
        ->setCellValue('CM9', 'P')
        ->setCellValue('CN7', '>70 Tahun')
        ->mergeCells('CN7:CU7')
        ->setCellValue('CN8', 'BARU')
        ->mergeCells('CN8:CO8')
        ->setCellValue('CN9', 'L')
        ->setCellValue('CO9', 'P')
        ->setCellValue('CP8', 'LAMA')
        ->mergeCells('CP8:CQ8')
        ->setCellValue('CP9', 'L')
        ->setCellValue('CQ9', 'P')
        ->setCellValue('CR8', 'KKL')
        ->mergeCells('CR8:CS8')
        ->setCellValue('CR9', 'L')
        ->setCellValue('CS9', 'P')
        ->setCellValue('CT8', 'JKK')
        ->mergeCells('CT8:CU8')
        ->setCellValue('CT9', 'L')
        ->setCellValue('CU9', 'P')
        ->setCellValue('CV6', 'TOTAL')
        ->mergeCells('CV6:DC7')
        ->setCellValue('CV8', 'BARU')
        ->mergeCells('CV8:CW8')
        ->setCellValue('CV9', 'L')
        ->setCellValue('CW9', 'P')
        ->setCellValue('CX8', 'LAMA')
        ->mergeCells('CX8:CY8')
        ->setCellValue('CX9', 'L')
        ->setCellValue('CY9', 'P')
        ->setCellValue('CZ8', 'KKL')
        ->mergeCells('CZ8:DA8')
        ->setCellValue('CZ9', 'L')
        ->setCellValue('DA9', 'P')
        ->setCellValue('DB8', 'JKK')
        ->mergeCells('DB8:DC8')
        ->setCellValue('DB9', 'L')
        ->setCellValue('DC9', 'P')
        ->setCellValue('A459', 'JUMLAH')
        ->mergeCells('A459:C459')
        ;
        $activeSheet->getColumnDimension('B')->setAutoSize(true);
      $activeSheet->getColumnDimension('C')->setAutoSize(true);
      foreach (range('D','Z') as $col) {
        $activeSheet->getColumnDimension($col)->setWidth(3);  
      }
      $activeSheet->getColumnDimension('AA')->setWidth(3);
      $activeSheet->getColumnDimension('AB')->setWidth(3);
      $activeSheet->getColumnDimension('AC')->setWidth(3);
      $activeSheet->getColumnDimension('AD')->setWidth(3);
      $activeSheet->getColumnDimension('AE')->setWidth(3);
      $activeSheet->getColumnDimension('AF')->setWidth(3);
      $activeSheet->getColumnDimension('AG')->setWidth(3);
      $activeSheet->getColumnDimension('AH')->setWidth(3);
      $activeSheet->getColumnDimension('AI')->setWidth(3);
      $activeSheet->getColumnDimension('AJ')->setWidth(3);
      $activeSheet->getColumnDimension('AK')->setWidth(3);
      $activeSheet->getColumnDimension('AL')->setWidth(3);
      $activeSheet->getColumnDimension('AM')->setWidth(3);
      $activeSheet->getColumnDimension('AN')->setWidth(3);
      $activeSheet->getColumnDimension('AO')->setWidth(3);
      $activeSheet->getColumnDimension('AP')->setWidth(3);
      $activeSheet->getColumnDimension('AQ')->setWidth(3);
      $activeSheet->getColumnDimension('AR')->setWidth(3);
      $activeSheet->getColumnDimension('AS')->setWidth(3);
      $activeSheet->getColumnDimension('AT')->setWidth(3);
      $activeSheet->getColumnDimension('AU')->setWidth(3);
      $activeSheet->getColumnDimension('AV')->setWidth(3);
      $activeSheet->getColumnDimension('AW')->setWidth(3);
      $activeSheet->getColumnDimension('AX')->setWidth(3);
      $activeSheet->getColumnDimension('AY')->setWidth(3);
      $activeSheet->getColumnDimension('AZ')->setWidth(3);
      $activeSheet->getColumnDimension('BA')->setWidth(3);
      $activeSheet->getColumnDimension('BB')->setWidth(3);
      $activeSheet->getColumnDimension('BC')->setWidth(3);
      $activeSheet->getColumnDimension('BD')->setWidth(3);
      $activeSheet->getColumnDimension('BE')->setWidth(3);
      $activeSheet->getColumnDimension('BF')->setWidth(3);
      $activeSheet->getColumnDimension('BG')->setWidth(3);
      $activeSheet->getColumnDimension('BH')->setWidth(3);
      $activeSheet->getColumnDimension('BI')->setWidth(3);
      $activeSheet->getColumnDimension('BJ')->setWidth(3);
      $activeSheet->getColumnDimension('BK')->setWidth(3);
      $activeSheet->getColumnDimension('BL')->setWidth(3);
      $activeSheet->getColumnDimension('BM')->setWidth(3);
      $activeSheet->getColumnDimension('BN')->setWidth(3);
      $activeSheet->getColumnDimension('BO')->setWidth(3);
      $activeSheet->getColumnDimension('BP')->setWidth(3);
      $activeSheet->getColumnDimension('BQ')->setWidth(3);
      $activeSheet->getColumnDimension('BR')->setWidth(3);
      $activeSheet->getColumnDimension('BS')->setWidth(3);
      $activeSheet->getColumnDimension('BT')->setWidth(3);
      $activeSheet->getColumnDimension('BU')->setWidth(3);
      $activeSheet->getColumnDimension('BV')->setWidth(3);
      $activeSheet->getColumnDimension('BW')->setWidth(3);
      $activeSheet->getColumnDimension('BX')->setWidth(3);
      $activeSheet->getColumnDimension('BY')->setWidth(3);
      $activeSheet->getColumnDimension('BZ')->setWidth(3);
      $activeSheet->getColumnDimension('CA')->setWidth(3);
      $activeSheet->getColumnDimension('CB')->setWidth(3);
      $activeSheet->getColumnDimension('CC')->setWidth(3);
      $activeSheet->getColumnDimension('CD')->setWidth(3);
      $activeSheet->getColumnDimension('CE')->setWidth(3);
      $activeSheet->getColumnDimension('CF')->setWidth(3);
      $activeSheet->getColumnDimension('CG')->setWidth(3);
      $activeSheet->getColumnDimension('CH')->setWidth(3);
      $activeSheet->getColumnDimension('CI')->setWidth(3);
      $activeSheet->getColumnDimension('CJ')->setWidth(3);
      $activeSheet->getColumnDimension('CK')->setWidth(3);
      $activeSheet->getColumnDimension('CL')->setWidth(3);
      $activeSheet->getColumnDimension('CM')->setWidth(3);
      $activeSheet->getColumnDimension('CN')->setWidth(3);
      $activeSheet->getColumnDimension('CO')->setWidth(3);
      $activeSheet->getColumnDimension('CP')->setWidth(3);
      $activeSheet->getColumnDimension('CQ')->setWidth(3);
      $activeSheet->getColumnDimension('CR')->setWidth(3);
      $activeSheet->getColumnDimension('CS')->setWidth(3);
      $activeSheet->getColumnDimension('CT')->setWidth(3);
      $activeSheet->getColumnDimension('CU')->setWidth(3);
      $activeSheet->getColumnDimension('CV')->setWidth(3);
      $activeSheet->getColumnDimension('CW')->setWidth(3);
      $activeSheet->getColumnDimension('CX')->setWidth(3);
      $activeSheet->getColumnDimension('CY')->setWidth(3);
      $activeSheet->getColumnDimension('CZ')->setWidth(3);
      $activeSheet->getColumnDimension('DA')->setWidth(3);
      $activeSheet->getColumnDimension('DB')->setWidth(3);
      $activeSheet->getColumnDimension('DC')->setWidth(3);
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

                ],
            ],
        ];
        $activeSheet->getStyle('A6:DC459')->applyFromArray($styleArray);
        $styleAlg = [
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle('A6:DC9')->applyFromArray($styleAlg);
        if ($this->session->userdata('level') == '2') {
            $dt = $this->DataLB1_model->getCetakTribln($tribulan, $tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data Laporan Tribulan(LB1) belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_LB1tribulan');
                $this->load->view('footer/lb_footer');
            }else {
                $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
                $data = $this->DataLB1_model->getCetakTribln($tribulan, $tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 10;
                $arrData = array();
                foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
                }
                $maxRow = $activeSheet->getHighestRow();
                $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                    $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }
                $activeSheet->setTitle('Tribulan '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tribulan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }elseif ($this->session->userdata('level') == '3'){
            $dt = $this->M_Kepala_puskesmas->getCetakTribulan($tribulan, $tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data Laporan Tribulan(LB1) belum tersedia');
                $this->header();
                $this->load->view('kepala_puskesmas/view_cetakTriblnLB');
                $this->load->view('footer/kp_footer');
            }else {
                $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
                $data = $this->M_Kepala_puskesmas->getCetakTribulan($tribulan, $tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 10;
                $arrData = array();
                foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
                }
                $maxRow = $activeSheet->getHighestRow();
                $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                    $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }
                $activeSheet->setTitle('Tribulan '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tribulan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }elseif ($this->session->userdata('level') == '4') {
            $dt = $this->M_Dinkes->CetakTribulan($tribulan, $tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data Laporan Tribulan(LB1) belum tersedia');
                $this->header();
                $this->load->view('dinkes/view_cetakTribulan');
                $this->load->view('footer/kp_footer');
            }else {
                $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
                $data = $this->M_Dinkes->CetakTribulan($tribulan, $tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 10;
                $arrData = array();
                foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
                }
                $maxRow = $activeSheet->getHighestRow();
                $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                    $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }
                $activeSheet->setTitle('Tribulan '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tribulan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }        
    }
    public function cetakTahun()
    {
        $tahun = $this->input->post('tahun');
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Export - Excel')
        ->setLastModifiedBy('Export - Excel')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet
        ->setCellValue('A1', 'LAPORAN DATA KESAKITAN TAHUN 2020')
        ->setCellValue('A2', 'Kode Puskesmas')
        ->setCellValue('A3', 'Puskesmas')
        ->setCellValue('A4', 'Kecamatan')
        ->setCellValue('A5', 'Kota')
        ->setCellValue('A6', 'KODE DX')
        ->mergeCells('A6:A9')
        ->setCellValue('B6', 'KODE ICDX')
        ->mergeCells('B6:B9')
        ->setCellValue('C6', 'NAMA PENYAKIT')
        ->mergeCells('C6:C9')
        ->setCellValue('D6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
        ->mergeCells('D6:AI6')
        ->setCellValue('D7', '0-7 Hari')
        ->mergeCells('D7:K7')
        ->setCellValue('D8', 'BARU')
        ->mergeCells('D8:E8')
        ->setCellValue('D9', 'L')
        ->setCellValue('E9', 'P')
        ->setCellValue('F8', 'LAMA')
        ->mergeCells('F8:G8')
        ->setCellValue('F9', 'L')
        ->setCellValue('G9', 'P')
        ->setCellValue('H8', 'KKL')
        ->mergeCells('H8:I8')
        ->setCellValue('H9', 'L')
        ->setCellValue('I9', 'P')
        ->setCellValue('J8', 'JKK')
        ->mergeCells('J8:K8')
        ->setCellValue('J9', 'L')
        ->setCellValue('K9', 'P')
        ->setCellValue('L7', '8-28 Hari')
        ->mergeCells('L7:S7')
        ->setCellValue('L8', 'BARU')
        ->mergeCells('L8:M8')
        ->setCellValue('L9', 'L')
        ->setCellValue('M9', 'P')
        ->setCellValue('N8', 'LAMA')
        ->mergeCells('N8:O8')
        ->setCellValue('N9', 'L')
        ->setCellValue('O9', 'P')
        ->setCellValue('P8', 'KKL')
        ->mergeCells('P8:Q8')
        ->setCellValue('P9', 'L')
        ->setCellValue('Q9', 'P')
        ->setCellValue('R8', 'JKK')
        ->mergeCells('R8:S8')
        ->setCellValue('R9', 'L')
        ->setCellValue('S9', 'P')
        ->setCellValue('T7', '>29-1 Tahun')
        ->mergeCells('T7:AA7')
        ->setCellValue('T8', 'BARU')
        ->mergeCells('T8:U8')
        ->setCellValue('T9', 'L')
        ->setCellValue('U9', 'P')
        ->setCellValue('V8', 'LAMA')
        ->mergeCells('V8:W8')
        ->setCellValue('V9', 'L')
        ->setCellValue('W9', 'P')
        ->setCellValue('X8', 'KKL')
        ->mergeCells('X8:Y8')
        ->setCellValue('X9', 'L')
        ->setCellValue('Y9', 'P')
        ->setCellValue('Z8', 'JKK')
        ->mergeCells('Z8:AA8')
        ->setCellValue('Z9', 'L')
        ->setCellValue('AA9', 'P')
        ->setCellValue('AB7', '1-4 Tahun')
        ->mergeCells('AB7:AI7')
        ->setCellValue('AB8', 'BARU')
        ->mergeCells('AB8:AC8')
        ->setCellValue('AB9', 'L')
        ->setCellValue('AC9', 'P')
        ->setCellValue('AD8', 'LAMA')
        ->mergeCells('AD8:AE8')
        ->setCellValue('AD9', 'L')
        ->setCellValue('AE9', 'P')
        ->setCellValue('AF8', 'KKL')
        ->mergeCells('AF8:AG8')
        ->setCellValue('AF9', 'L')
        ->setCellValue('AG9', 'P')
        ->setCellValue('AH8', 'JKK')
        ->mergeCells('AH8:AI8')
        ->setCellValue('AH9', 'L')
        ->setCellValue('AI9', 'P')
        ->setCellValue('AJ6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
        ->mergeCells('AJ6:BO6')
        ->setCellValue('AJ7', '5-9 Tahun')
        ->mergeCells('AJ7:AQ7')
        ->setCellValue('AJ8', 'BARU')
        ->mergeCells('AJ8:AK8')
        ->setCellValue('AJ9', 'L')
        ->setCellValue('AK9', 'P')
        ->setCellValue('AL8', 'LAMA')
        ->mergeCells('AL8:AM8')
        ->setCellValue('AL9', 'L')
        ->setCellValue('AM9', 'P')
        ->setCellValue('AN8', 'KKL')
        ->mergeCells('AN8:AO8')
        ->setCellValue('AN9', 'L')
        ->setCellValue('AO9', 'P')
        ->setCellValue('AP8', 'JKK')
        ->mergeCells('AP8:AQ8')
        ->setCellValue('AP9', 'L')
        ->setCellValue('AQ9', 'P')
        ->setCellValue('AR7', '10-14 Tahun')
        ->mergeCells('AR7:AY7')
        ->setCellValue('AR8', 'BARU')
        ->mergeCells('AR8:AS8')
        ->setCellValue('AR9', 'L')
        ->setCellValue('AS9', 'P')
        ->setCellValue('AT8', 'LAMA')
        ->mergeCells('AT8:AU8')
        ->setCellValue('AT9', 'L')
        ->setCellValue('AU9', 'P')
        ->setCellValue('AV8', 'KKL')
        ->mergeCells('AV8:AW8')
        ->setCellValue('AV9', 'L')
        ->setCellValue('AW9', 'P')
        ->setCellValue('AX8', 'JKK')
        ->mergeCells('AX8:AY8')
        ->setCellValue('AX9', 'L')
        ->setCellValue('AY9', 'P')
        ->setCellValue('AZ7', '15-19 Tahun')
        ->mergeCells('AZ7:BG7')
        ->setCellValue('AZ8', 'BARU')
        ->mergeCells('AZ8:BA8')
        ->setCellValue('AZ9', 'L')
        ->setCellValue('BA9', 'P')
        ->setCellValue('BB8', 'LAMA')
        ->mergeCells('BB8:BC8')
        ->setCellValue('BB9', 'L')
        ->setCellValue('BC9', 'P')
        ->setCellValue('BD8', 'KKL')
        ->mergeCells('BD8:BE8')
        ->setCellValue('BD9', 'L')
        ->setCellValue('BE9', 'P')
        ->setCellValue('BF8', 'JKK')
        ->mergeCells('BF8:BG8')
        ->setCellValue('BF9', 'L')
        ->setCellValue('BG9', 'P')
        ->setCellValue('BH7', '20-44 Tahun')
        ->mergeCells('BH7:BO7')
        ->setCellValue('BH8', 'BARU')
        ->mergeCells('BH8:BI8')
        ->setCellValue('BH9', 'L')
        ->setCellValue('BI9', 'P')
        ->setCellValue('BJ8', 'LAMA')
        ->mergeCells('BJ8:BK8')
        ->setCellValue('BJ9', 'L')
        ->setCellValue('BK9', 'P')
        ->setCellValue('BL8', 'KKL')
        ->mergeCells('BL8:BM8')
        ->setCellValue('BL9', 'L')
        ->setCellValue('BM9', 'P')
        ->setCellValue('BN8', 'JKK')
        ->mergeCells('BN8:BO8')
        ->setCellValue('BN9', 'L')
        ->setCellValue('BO9', 'P')
        ->setCellValue('BP6', 'JUMLAH  PENDERITA MENURUT GOLONGAN UMUR')
        ->mergeCells('BP6:CU6')
        ->setCellValue('BP7', '45-54 Tahun')
        ->mergeCells('BP7:BW7')
        ->setCellValue('BP8', 'BARU')
        ->mergeCells('BP8:BQ8')
        ->setCellValue('BP9', 'L')
        ->setCellValue('BQ9', 'P')
        ->setCellValue('BR8', 'LAMA')
        ->mergeCells('BR8:BS8')
        ->setCellValue('BR9', 'L')
        ->setCellValue('BS9', 'P')
        ->setCellValue('BT8', 'KKL')
        ->mergeCells('BT8:BU8')
        ->setCellValue('BT9', 'L')
        ->setCellValue('BU9', 'P')
        ->setCellValue('BV8', 'JKK')
        ->mergeCells('BV8:BW8')
        ->setCellValue('BV9', 'L')
        ->setCellValue('BW9', 'P')
        ->setCellValue('BX7', '55-59 Tahun')
        ->mergeCells('BX7:CE7')
        ->setCellValue('BX8', 'BARU')
        ->mergeCells('BX8:BY8')
        ->setCellValue('BX9', 'L')
        ->setCellValue('BY9', 'P')
        ->setCellValue('BZ8', 'LAMA')
        ->mergeCells('BZ8:CA8')
        ->setCellValue('BZ9', 'L')
        ->setCellValue('CA9', 'P')
        ->setCellValue('CB8', 'KKL')
        ->mergeCells('CB8:CC8')
        ->setCellValue('CB9', 'L')
        ->setCellValue('CC9', 'P')
        ->setCellValue('CD8', 'JKK')
        ->mergeCells('CD8:CE8')
        ->setCellValue('CD9', 'L')
        ->setCellValue('CE9', 'P')
        ->setCellValue('CF7', '60-69 Tahun')
        ->mergeCells('CF7:CM7')
        ->setCellValue('CF8', 'BARU')
        ->mergeCells('CF8:CG8')
        ->setCellValue('CF9', 'L')
        ->setCellValue('CG9', 'P')
        ->setCellValue('CH8', 'LAMA')
        ->mergeCells('CH8:CI8')
        ->setCellValue('CH9', 'L')
        ->setCellValue('CI9', 'P')
        ->setCellValue('CJ8', 'KKL')
        ->mergeCells('CJ8:CK8')
        ->setCellValue('CJ9', 'L')
        ->setCellValue('CK9', 'P')
        ->setCellValue('CL8', 'JKK')
        ->mergeCells('CL8:CM8')
        ->setCellValue('CL9', 'L')
        ->setCellValue('CM9', 'P')
        ->setCellValue('CN7', '>70 Tahun')
        ->mergeCells('CN7:CU7')
        ->setCellValue('CN8', 'BARU')
        ->mergeCells('CN8:CO8')
        ->setCellValue('CN9', 'L')
        ->setCellValue('CO9', 'P')
        ->setCellValue('CP8', 'LAMA')
        ->mergeCells('CP8:CQ8')
        ->setCellValue('CP9', 'L')
        ->setCellValue('CQ9', 'P')
        ->setCellValue('CR8', 'KKL')
        ->mergeCells('CR8:CS8')
        ->setCellValue('CR9', 'L')
        ->setCellValue('CS9', 'P')
        ->setCellValue('CT8', 'JKK')
        ->mergeCells('CT8:CU8')
        ->setCellValue('CT9', 'L')
        ->setCellValue('CU9', 'P')
        ->setCellValue('CV6', 'TOTAL')
        ->mergeCells('CV6:DC7')
        ->setCellValue('CV8', 'BARU')
        ->mergeCells('CV8:CW8')
        ->setCellValue('CV9', 'L')
        ->setCellValue('CW9', 'P')
        ->setCellValue('CX8', 'LAMA')
        ->mergeCells('CX8:CY8')
        ->setCellValue('CX9', 'L')
        ->setCellValue('CY9', 'P')
        ->setCellValue('CZ8', 'KKL')
        ->mergeCells('CZ8:DA8')
        ->setCellValue('CZ9', 'L')
        ->setCellValue('DA9', 'P')
        ->setCellValue('DB8', 'JKK')
        ->mergeCells('DB8:DC8')
        ->setCellValue('DB9', 'L')
        ->setCellValue('DC9', 'P')
        ->setCellValue('A459', 'JUMLAH')
        ->mergeCells('A459:C459')
        ;
        $activeSheet->getColumnDimension('B')->setAutoSize(true);
      $activeSheet->getColumnDimension('C')->setAutoSize(true);
      foreach (range('D','Z') as $col) {
        $activeSheet->getColumnDimension($col)->setWidth(3);  
      }
      $activeSheet->getColumnDimension('AA')->setWidth(3);
      $activeSheet->getColumnDimension('AB')->setWidth(3);
      $activeSheet->getColumnDimension('AC')->setWidth(3);
      $activeSheet->getColumnDimension('AD')->setWidth(3);
      $activeSheet->getColumnDimension('AE')->setWidth(3);
      $activeSheet->getColumnDimension('AF')->setWidth(3);
      $activeSheet->getColumnDimension('AG')->setWidth(3);
      $activeSheet->getColumnDimension('AH')->setWidth(3);
      $activeSheet->getColumnDimension('AI')->setWidth(3);
      $activeSheet->getColumnDimension('AJ')->setWidth(3);
      $activeSheet->getColumnDimension('AK')->setWidth(3);
      $activeSheet->getColumnDimension('AL')->setWidth(3);
      $activeSheet->getColumnDimension('AM')->setWidth(3);
      $activeSheet->getColumnDimension('AN')->setWidth(3);
      $activeSheet->getColumnDimension('AO')->setWidth(3);
      $activeSheet->getColumnDimension('AP')->setWidth(3);
      $activeSheet->getColumnDimension('AQ')->setWidth(3);
      $activeSheet->getColumnDimension('AR')->setWidth(3);
      $activeSheet->getColumnDimension('AS')->setWidth(3);
      $activeSheet->getColumnDimension('AT')->setWidth(3);
      $activeSheet->getColumnDimension('AU')->setWidth(3);
      $activeSheet->getColumnDimension('AV')->setWidth(3);
      $activeSheet->getColumnDimension('AW')->setWidth(3);
      $activeSheet->getColumnDimension('AX')->setWidth(3);
      $activeSheet->getColumnDimension('AY')->setWidth(3);
      $activeSheet->getColumnDimension('AZ')->setWidth(3);
      $activeSheet->getColumnDimension('BA')->setWidth(3);
      $activeSheet->getColumnDimension('BB')->setWidth(3);
      $activeSheet->getColumnDimension('BC')->setWidth(3);
      $activeSheet->getColumnDimension('BD')->setWidth(3);
      $activeSheet->getColumnDimension('BE')->setWidth(3);
      $activeSheet->getColumnDimension('BF')->setWidth(3);
      $activeSheet->getColumnDimension('BG')->setWidth(3);
      $activeSheet->getColumnDimension('BH')->setWidth(3);
      $activeSheet->getColumnDimension('BI')->setWidth(3);
      $activeSheet->getColumnDimension('BJ')->setWidth(3);
      $activeSheet->getColumnDimension('BK')->setWidth(3);
      $activeSheet->getColumnDimension('BL')->setWidth(3);
      $activeSheet->getColumnDimension('BM')->setWidth(3);
      $activeSheet->getColumnDimension('BN')->setWidth(3);
      $activeSheet->getColumnDimension('BO')->setWidth(3);
      $activeSheet->getColumnDimension('BP')->setWidth(3);
      $activeSheet->getColumnDimension('BQ')->setWidth(3);
      $activeSheet->getColumnDimension('BR')->setWidth(3);
      $activeSheet->getColumnDimension('BS')->setWidth(3);
      $activeSheet->getColumnDimension('BT')->setWidth(3);
      $activeSheet->getColumnDimension('BU')->setWidth(3);
      $activeSheet->getColumnDimension('BV')->setWidth(3);
      $activeSheet->getColumnDimension('BW')->setWidth(3);
      $activeSheet->getColumnDimension('BX')->setWidth(3);
      $activeSheet->getColumnDimension('BY')->setWidth(3);
      $activeSheet->getColumnDimension('BZ')->setWidth(3);
      $activeSheet->getColumnDimension('CA')->setWidth(3);
      $activeSheet->getColumnDimension('CB')->setWidth(3);
      $activeSheet->getColumnDimension('CC')->setWidth(3);
      $activeSheet->getColumnDimension('CD')->setWidth(3);
      $activeSheet->getColumnDimension('CE')->setWidth(3);
      $activeSheet->getColumnDimension('CF')->setWidth(3);
      $activeSheet->getColumnDimension('CG')->setWidth(3);
      $activeSheet->getColumnDimension('CH')->setWidth(3);
      $activeSheet->getColumnDimension('CI')->setWidth(3);
      $activeSheet->getColumnDimension('CJ')->setWidth(3);
      $activeSheet->getColumnDimension('CK')->setWidth(3);
      $activeSheet->getColumnDimension('CL')->setWidth(3);
      $activeSheet->getColumnDimension('CM')->setWidth(3);
      $activeSheet->getColumnDimension('CN')->setWidth(3);
      $activeSheet->getColumnDimension('CO')->setWidth(3);
      $activeSheet->getColumnDimension('CP')->setWidth(3);
      $activeSheet->getColumnDimension('CQ')->setWidth(3);
      $activeSheet->getColumnDimension('CR')->setWidth(3);
      $activeSheet->getColumnDimension('CS')->setWidth(3);
      $activeSheet->getColumnDimension('CT')->setWidth(3);
      $activeSheet->getColumnDimension('CU')->setWidth(3);
      $activeSheet->getColumnDimension('CV')->setWidth(3);
      $activeSheet->getColumnDimension('CW')->setWidth(3);
      $activeSheet->getColumnDimension('CX')->setWidth(3);
      $activeSheet->getColumnDimension('CY')->setWidth(3);
      $activeSheet->getColumnDimension('CZ')->setWidth(3);
      $activeSheet->getColumnDimension('DA')->setWidth(3);
      $activeSheet->getColumnDimension('DB')->setWidth(3);
      $activeSheet->getColumnDimension('DC')->setWidth(3);
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

                ],
            ],
        ];
        $activeSheet->getStyle('A6:DC459')->applyFromArray($styleArray);
        $styleAlg = [
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle('A6:DC9')->applyFromArray($styleAlg);
        if ($this->session->userdata('level') == '2') {
            $dt = $this->DataLB1_model->getCetakTahun($tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data Laporan Tahunan(LB1) belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_LB1tahun');
                $this->load->view('footer/lb_footer');
            }else {
                $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
                $data = $this->DataLB1_model->getCetakTahun($tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 10;
                $arrData = array();
                foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
                }
                $maxRow = $activeSheet->getHighestRow();
                $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                    $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }
                $activeSheet->setTitle('Tahun '.date('Y'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tahunan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        } elseif ($this->session->userdata('level') == '3'){
            $dt = $this->M_Kepala_puskesmas->getCetakTahun($tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data Laporan Tahunan(LB1) belum tersedia');
                $this->header();
                $this->load->view('kepala_puskesmas/view_cetakTahunLB');
                $this->load->view('footer/kp_footer');
            }else {
                $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
                $data = $this->M_Kepala_puskesmas->getCetakTahun($tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 10;
                $arrData = array();
                foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
                }
                $maxRow = $activeSheet->getHighestRow();
                $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                    $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }
                $activeSheet->setTitle('Tahun '.date('Y'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tahunan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }elseif ($this->session->userdata('level') == '4') {
            $dt = $this->M_Dinkes->CetakTahun($tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data Laporan Tahunan(LB1) belum tersedia');
                $this->header();
                $this->load->view('dinkes/view_cetakTahun');
                $this->load->view('footer/d_footer');
            }else {
                $dtKP = $this->DataLB1_model->getKategoriPeny()->result();
                $data = $this->M_Dinkes->CetakTahun($tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 10;
                $arrData = array();
                foreach ($dtKP as $dk) {
                foreach($datalaporan as $d){
                if ($d->kode_dx == $dk->kode_dx) {
                $totBaruP = 0;
                $totBaruL = 0;
                $totLamaP = 0;
                $totLamaL = 0;
                $totKKLP = 0;
                $totKKLL = 0;
                $totJKKP = 0;
                $totJKKL = 0; 
                $arrData[$i] = [];
                $activeSheet
                ->setCellValue('A'.$i, $d->kode_dx)
                ->setCellValue('B'.$i, $d->kode_icdx)
                ->setCellValue('C'.$i, $d->nama_penyakit);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    $tempArr=[$dt,$dt,$dt,$dt,$dt,$dt,$dt,$dt];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $jumJKKP = $pas->Baru->Perempuan + $pas->Lama->Perempuan + $pas->KKL->Perempuan;
                    $jumJKKL = $pas->Baru->Laki + $pas->Lama->Laki + $pas->KKL->Laki; 
                    $totBaruP += $pas->Baru->Perempuan;
                    $totBaruL += $pas->Baru->Laki;
                    $totLamaP += $pas->Lama->Perempuan;
                    $totLamaL += $pas->Lama->Laki;
                    $totKKLP += $pas->KKL->Perempuan;
                    $totKKLL += $pas->KKL->Laki;
                    $totJKKP = $totBaruP + $totLamaP + $totKKLP;
                    $totJKKL = $totBaruL + $totLamaL + $totKKLL; 
                    $br_lk = $pas->Baru->Laki;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Baru->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Lama->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->KKL->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKL)
                    ->setCellValueByColumnAndRow($k++, $i, $jumJKKP); 
                    $tempArr = [$pas->Baru->Laki,$pas->Baru->Perempuan,$pas->Lama->Laki,$pas->Lama->Perempuan,$pas->KKL->Laki,$pas->KKL->Perempuan,$jumJKKL,$jumJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                    }
                }
                $activeSheet
                ->setCellValue('CV'.$i, $totBaruL)
                ->setCellValue('CW'.$i, $totBaruP)
                ->setCellValue('CX'.$i, $totLamaL)
                ->setCellValue('CY'.$i, $totLamaP)
                ->setCellValue('CZ'.$i, $totKKLL)
                ->setCellValue('DA'.$i, $totKKLP)
                ->setCellValue('DB'.$i, $totJKKL)
                ->setCellValue('DC'.$i, $totJKKP);
                    $tempArr = [$totBaruL,$totBaruP,$totLamaL,$totLamaP,$totKKLL,$totKKLP,$totJKKL,$totJKKP];
                    $arrData[$i] = array_merge($arrData[$i],$tempArr);
                $i++; 
                }
                }
                }
                $maxRow = $activeSheet->getHighestRow();
                $maxLoop = $maxRow - 10;
                for($x=0;$x<104;$x++){
                    $count = 0;
                    for($i=10;$i<=$maxLoop;$i++){
                        $count += $arrData[$i][$x];
                    }
                    $activeSheet->setCellValueByColumnAndRow($x+4, $maxRow, $count); 
                }
                $activeSheet->setTitle('Tahun '.date('Y'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tahunan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }
    }
    public function cetakPenyBln()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Export - Excel')
        ->setLastModifiedBy('Export - Excel')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        $activeSheet
        ->setCellValue('A1', '15 BESAR PENYAKIT')
        ->mergeCells('A1:F1')
        ->setCellValue('A2', 'PUSKESMAS DINOYO')
        ->mergeCells('A2:F2')
        ->setCellValue('A3', 'TAHUN 2020')
        ->mergeCells('A3:F3')
        ->setCellValue('A5', 'Bulan')
        ->setCellValue('A6', 'NO')
        ->mergeCells('A6:A7')
        ->setCellValue('B6', 'PENYAKIT')
        ->mergeCells('B6:B7')
        ->setCellValue('C6', 'KODE ICDX')
        ->mergeCells('C6:C7')
        ->setCellValue('D6', 'JUMLAH')
        ->mergeCells('D6:E6')
        ->setCellValue('F6', 'TOTAL')
        ->mergeCells('F6:F7')
        ->setCellValue('D7', 'LAKI-LAKI')
        ->setCellValue('E7', 'PEREMPUAN')
        ;
        $activeSheet->getColumnDimension('B')->setAutoSize(true);
        $activeSheet->getColumnDimension('C')->setAutoSize(true);
        $activeSheet->getColumnDimension('D')->setAutoSize(true);
        $activeSheet->getColumnDimension('E')->setAutoSize(true);
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

                ],
            ],
        ];
        $activeSheet->getStyle('A6:F22')->applyFromArray($styleArray);
        $styleAlg = [
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle('A1:F7')->applyFromArray($styleAlg);
        if ($this->session->userdata('level') == '2') {
            $dt = $this->M_Penyakit_banyak->getCetakPeny($bulan,$tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Bulanan belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_penyakitbln');
                $this->load->view('footer/lb_footer');
            }else {
                $data = $this->M_Penyakit_banyak->getCetakPeny($bulan,$tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 8;
                foreach($datalaporan as $d){
                $total = 0;
                $activeSheet
                ->setCellValue('A'.$i, '1')
                ->setCellValue('B'.$i, $d->nama_penyakit)
                ->setCellValue('C'.$i, $d->kode_icdx);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    $dt =0;
                    $activeSheet
                    ->setCellValue('D'.$i, $dt)
                    ->setCellValue('E'.$i, $dt);
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $total = $pas->Laki + $pas->Perempuan ;
                    $activeSheet
                    ->setCellValue('D'.$i, $pas->Laki)
                    ->setCellValue('E'.$i, $pas->Perempuan);
                    }
                }
                $activeSheet
                ->setCellValue('F'.$i, $total);
                $i++; 
                }
                $activeSheet->setTitle('15 Besar Penyakit '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="15 Besar Penyakit.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }   
        } elseif ($this->session->userdata('level') == '3'){
            $dt = $this->M_Penyakit_banyak->getCetakPenyKP($bulan,$tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Bulanan belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_penyakitbln');
                $this->load->view('footer/lb_footer');
            }else {
                $data = $this->M_Penyakit_banyak->getCetakPenyKP($bulan,$tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 8;
                foreach($datalaporan as $d){
                $total = 0;
                $activeSheet
                ->setCellValue('A'.$i, '1')
                ->setCellValue('B'.$i, $d->nama_penyakit)
                ->setCellValue('C'.$i, $d->kode_icdx);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    $dt =0;
                    $activeSheet
                    ->setCellValue('D'.$i, $dt)
                    ->setCellValue('E'.$i, $dt);
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $total = $pas->Laki + $pas->Perempuan ;
                    $activeSheet
                    ->setCellValue('D'.$i, $pas->Laki)
                    ->setCellValue('E'.$i, $pas->Perempuan);
                    }
                }
                $activeSheet
                ->setCellValue('F'.$i, $total);
                $i++; 
                }
                $activeSheet->setTitle('15 Besar Penyakit '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="15 Besar Penyakit.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }elseif ($this->session->userdata('level') == '4') {
            $dt = $this->M_Penyakit_banyak->getCetakPenyDin($bulan,$tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Bulanan belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_penyakitbln');
                $this->load->view('footer/lb_footer');
            }else {
                $data = $this->M_Penyakit_banyak->getCetakPenyDin($bulan,$tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 8;
                foreach($datalaporan as $d){
                $total = 0;
                $activeSheet
                ->setCellValue('A'.$i, '1')
                ->setCellValue('B'.$i, $d->nama_penyakit)
                ->setCellValue('C'.$i, $d->kode_icdx);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    $dt =0;
                    $activeSheet
                    ->setCellValue('D'.$i, $dt)
                    ->setCellValue('E'.$i, $dt);
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $total = $pas->Laki + $pas->Perempuan ;
                    $activeSheet
                    ->setCellValue('D'.$i, $pas->Laki)
                    ->setCellValue('E'.$i, $pas->Perempuan);
                    }
                }
                $activeSheet
                ->setCellValue('F'.$i, $total);
                $i++; 
                }
                $activeSheet->setTitle('15 Besar Penyakit '.date('d-m-Y H'));
                $spreadsheet->setActiveSheetIndex(0);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="15 Besar Penyakit.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }  
    }
    public function cetakPenyThn()
    {
        $tahun = $this->input->post('tahun');
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Export - Excel')
        ->setLastModifiedBy('Export - Excel')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        $activeSheet
        ->setCellValue('A1', '15 BESAR PENYAKIT')
        ->mergeCells('A1:AN1')
        ->setCellValue('A2', 'PUSKESMAS DINOYO')
        ->mergeCells('A2:AN2')
        ->setCellValue('A3', 'TAHUN 2020')
        ->mergeCells('A3:AN3')
        ->setCellValue('A5', 'Bulan')
        ->setCellValue('A6', 'NO')
        ->mergeCells('A6:A7')
        ->setCellValue('B6', 'DIAGNOSA')
        ->mergeCells('B6:B7')
        ->setCellValue('C6', 'KODE ICDX')
        ->mergeCells('C6:C7')
        ->setCellValue('D6', 'JANUARI')
        ->mergeCells('D6:F6')
        ->setCellValue('G6', 'FEBRUARI')
        ->mergeCells('G6:I6')
        ->setCellValue('J6', 'MARET')
        ->mergeCells('J6:L6')
        ->setCellValue('M6', 'APRIL')
        ->mergeCells('M6:O6')
        ->setCellValue('P6', 'MEI')
        ->mergeCells('P6:R6')
        ->setCellValue('S6', 'JUNI')
        ->mergeCells('S6:U6')
        ->setCellValue('V6', 'JULI')
        ->mergeCells('V6:X6')
        ->setCellValue('Y6', 'AGUSTUS')
        ->mergeCells('Y6:AA6')
        ->setCellValue('AB6', 'SEPTEMBER')
        ->mergeCells('AB6:AD6')
        ->setCellValue('AE6', 'OKTOBER')
        ->mergeCells('AE6:AG6')
        ->setCellValue('AH6', 'NOVEMBER')
        ->mergeCells('AH6:AJ6')
        ->setCellValue('AK6', 'DESEMBER')
        ->mergeCells('AK6:AM6')
        ->setCellValue('AN6', 'JUMLAH')
        ->mergeCells('AN6:AN7')
        ->setCellValue('D7', 'L')
        ->setCellValue('E7', 'P')
        ->setCellValue('F7', 'TOTAL')
        ->setCellValue('G7', 'L')
        ->setCellValue('H7', 'P')
        ->setCellValue('I7', 'TOTAL')
        ->setCellValue('J7', 'L')
        ->setCellValue('K7', 'P')
        ->setCellValue('L7', 'TOTAL')
        ->setCellValue('M7', 'L')
        ->setCellValue('N7', 'P')
        ->setCellValue('O7', 'TOTAL')
        ->setCellValue('P7', 'L')
        ->setCellValue('Q7', 'P')
        ->setCellValue('R7', 'TOTAL')
        ->setCellValue('S7', 'L')
        ->setCellValue('T7', 'P')
        ->setCellValue('U7', 'TOTAL')
        ->setCellValue('V7', 'L')
        ->setCellValue('W7', 'P')
        ->setCellValue('X7', 'TOTAL')
        ->setCellValue('Y7', 'L')
        ->setCellValue('Z7', 'P')
        ->setCellValue('AA7', 'TOTAL')
        ->setCellValue('AB7', 'L')
        ->setCellValue('AC7', 'P')
        ->setCellValue('AD7', 'TOTAL')
        ->setCellValue('AE7', 'L')
        ->setCellValue('AF7', 'P')
        ->setCellValue('AG7', 'TOTAL')
        ->setCellValue('AH7', 'L')
        ->setCellValue('AI7', 'P')
        ->setCellValue('AJ7', 'TOTAL')
        ->setCellValue('AK7', 'L')
        ->setCellValue('AL7', 'P')
        ->setCellValue('AM7', 'TOTAL')
        ;
        foreach (range('B','Z') as $col) {
            $activeSheet->getColumnDimension($col)->setAutoSize(true);
        }
        $activeSheet->getColumnDimension('AA')->setAutoSize(true);
        $activeSheet->getColumnDimension('AB')->setAutoSize(true);
        $activeSheet->getColumnDimension('AC')->setAutoSize(true);
        $activeSheet->getColumnDimension('AD')->setAutoSize(true);
        $activeSheet->getColumnDimension('AE')->setAutoSize(true);
        $activeSheet->getColumnDimension('AF')->setAutoSize(true);
        $activeSheet->getColumnDimension('AG')->setAutoSize(true);
        $activeSheet->getColumnDimension('AH')->setAutoSize(true);
        $activeSheet->getColumnDimension('AI')->setAutoSize(true);
        $activeSheet->getColumnDimension('AJ')->setAutoSize(true);
        $activeSheet->getColumnDimension('AK')->setAutoSize(true);
        $activeSheet->getColumnDimension('AL')->setAutoSize(true);
        $activeSheet->getColumnDimension('AM')->setAutoSize(true);
        $activeSheet->getColumnDimension('AN')->setAutoSize(true);
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

                ],
            ],
        ];
        $activeSheet->getStyle('A6:AN22')->applyFromArray($styleArray);
        $styleAlg = [
            'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $activeSheet->getStyle('A1:F7')->applyFromArray($styleAlg);
        if ($this->session->userdata('level') == '2') {
            $dt = $this->M_Penyakit_banyak->CetakPenyTahun($tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Tahun belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_penyakitThn');
                $this->load->view('footer/lb_footer');
            }else {
                $data = $this->M_Penyakit_banyak->CetakPenyTahun($tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 8;
                foreach($datalaporan as $d){
                $total = 0;
                $jumlah = 0; 
                $activeSheet
                ->setCellValue('A'.$i, '1')
                ->setCellValue('B'.$i, $d->nama_penyakit)
                ->setCellValue('C'.$i, $d->kode_icdx);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $total = $pas->Laki + $pas->Perempuan;
                    $jumlah += $total;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $total);
                    }
                }
                $activeSheet
                ->setCellValue('AN'.$i, $jumlah);
                $i++; 
                }
                $activeSheet->setTitle('15 Besar Penyakit '.date('d-m-Y H'));
                $activeSheet;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tahunan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        } elseif ($this->session->userdata('level') == '3'){
            $dt = $this->M_Penyakit_banyak->CetakPenyTahunKP($tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Tahun belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_penyakitThn');
                $this->load->view('footer/lb_footer');
            }else {
                $data = $this->M_Penyakit_banyak->CetakPenyTahunKP($tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 8;
                foreach($datalaporan as $d){
                $total = 0;
                $jumlah = 0; 
                $activeSheet
                ->setCellValue('A'.$i, '1')
                ->setCellValue('B'.$i, $d->nama_penyakit)
                ->setCellValue('C'.$i, $d->kode_icdx);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $total = $pas->Laki + $pas->Perempuan;
                    $jumlah += $total;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $total);
                    }
                }
                $activeSheet
                ->setCellValue('AN'.$i, $jumlah);
                $i++; 
                }
                $activeSheet->setTitle('15 Besar Penyakit '.date('d-m-Y H'));
                $activeSheet;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tahunan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }elseif ($this->session->userdata('level') == '4') {
            $dt = $this->M_Penyakit_banyak->CetakPenyTahunDin($tahun);
            if ($dt == null) {
                $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Tahun belum tersedia');
                $this->header();
                $this->load->view('laporan_bulanan/cetak_penyakitThn');
                $this->load->view('footer/lb_footer');
            }else {
                $data = $this->M_Penyakit_banyak->CetakPenyTahunDin($tahun);
                $datalaporan = json_decode($data[0]->datalb1);
                $i = 8;
                foreach($datalaporan as $d){
                $total = 0;
                $jumlah = 0; 
                $activeSheet
                ->setCellValue('A'.$i, '1')
                ->setCellValue('B'.$i, $d->nama_penyakit)
                ->setCellValue('C'.$i, $d->kode_icdx);
                if (count($d->pasien) == 0) {
                    $k = 4;
                    for ($x=0;$x<12;$x++) { 
                    $dt =0;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt)
                    ->setCellValueByColumnAndRow($k++, $i, $dt);
                    }
                }else {
                    $k = 4;
                    foreach ($d->pasien as $pas) {
                    $total = $pas->Laki + $pas->Perempuan;
                    $jumlah += $total;
                    $activeSheet
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Laki)
                    ->setCellValueByColumnAndRow($k++, $i, $pas->Perempuan)
                    ->setCellValueByColumnAndRow($k++, $i, $total);
                    }
                }
                $activeSheet
                ->setCellValue('AN'.$i, $jumlah);
                $i++; 
                }
                $activeSheet->setTitle('15 Besar Penyakit '.date('d-m-Y H'));
                $activeSheet;
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Tahunan.xlsx"');
                header('Cache-Control: max-age=0');
                header('Cache-Control: max-age=1');
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0
                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }       
        
    }
}