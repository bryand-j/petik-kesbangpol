<?php
class Data extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }
 
    public function pdf()
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
 
        $tabel = '
        <table border="1">
              <tr>
                    <th> <b>Provinsi</b> </th>
                    <th> <b>Jumlah Penduduk</b> </th>
              </tr>
 
              <tr>
                    <td> Aceh </td>
                    <td> 5.189.500 </td>
              </tr>
              <tr>
                    <td> Bali </td>
                    <td> 4.246.500 </td>
              </tr>
              <tr>
                    <td> Banten </td>
                    <td> 12.448.200 </td>
              </tr>
              <tr>
                    <td> Bengkulu </td>
                    <td> 1.934.300 </td>
              </tr>
              <tr>
                    <td> DI Yogyakarta </td>
                    <td> 3.762.200 </td>
              </tr>
              <tr>
                    <td> DKI Jakarta </td>
                    <td> 10.374.200 </td>
              </tr>
              <tr>
                    <td> Gorontalo </td>
                    <td> 1.168.200 </td>
              </tr>
              <tr>
                    <td> Jambi </td>
                    <td> 3.515.000 </td>
              </tr>
              <tr>
                    <td> Jawa Barat </td>
                    <td> 48.037.600 </td>
              </tr>
              <tr>
                    <td> Jawa Tengah </td>
                    <td> 34.257.900 </td>
              </tr>
              <tr>
                    <td> Jawa Timur </td>
                    <td> 39.293.000 </td>
              </tr>
              <tr>
                    <td> Kalimantan Barat </td>
                    <td> 4.932.500 </td>
              </tr>
              <tr>
                    <td> Kalimantan Selatan </td>
                    <td> 4.119.800 </td>
              </tr>
              <tr>
                    <td> Kalimantan Tengah </td>
                    <td> 2.605.300 </td>
              </tr>
              <tr>
                    <td> Kalimantan Timur </td>
                    <td> 3.575.400 </td>
              </tr>
              <tr>
                    <td> Kalimantan Utara </td>
                    <td> 691.100 </td>
              </tr>
              <tr>
                    <td> Kepulauan Bangka Belitung </td>
                    <td> 1.430.900 </td>
              </tr>
        </table>
        ';
        $pdf->writeHTML($tabel);
        $pdf->Output('file-pdf-codeigniter.pdf', 'I');
    }
 
}