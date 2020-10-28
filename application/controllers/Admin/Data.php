<?php
class Data extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pdf");
    }

    function tgl_indo($tanggal)
    {
        $bulan= array(
        1 =>'January',
            'February',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ].' '.$pecahkan[0];
    }


    public function pdf()
    {
        $nama=$this->db->query("select * from tb_conf where prop='nama'")->row()->value;
        $nip=$this->db->query("select * from tb_conf where prop='nip'")->row()->value;
        $Judul=$this->db->query("select * from tb_conf where prop='judul'")->row()->value." ";
        $tingkat="Pembina Utama Madya";

        $pdf = new TCPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        // $pdf->Write(0, '<center>Rekap Potensi Konflik 2019</center>', '', 0, 'L', true, 0, false, false, 0);
        // $pdf->SetFont('');
        $pdf->SetFont('dejavusans', '', 9);
 

        $wil = "";
        $thn = "";
        $bdg = "";

        if (isset($_POST['wilayah'])) {

            if ($_POST['wilayah'] == "") {
                $wil = "";
                $Judul .="Provinsi NTT ";
            }
            else { $wil = $_POST['wilayah']; }
           

        }
        if (isset($_POST['bidang'])) {
            if ( $_POST['bidang'] == "") {
                $bdg = "";
            }
            else { $bdg = $_POST['bidang']; }
           
        }
        if (isset($_POST['tahun'])) {
            if ($_POST['tahun'] == "") {
               $thn = "";
            }
            else { $thn = $_POST['tahun']; }
           
        }


        $tabel = '<h3 style="text-align:center;">'.$Judul.' '. $wil.' '.$thn.'</h3><br><br>
        <table border="0.5pt" cellpadding="5">       
              <tr style="height:100px">
                    <th border="0.5pt" align="center" width="3.5%" style="height:22px; padding-top:25px"> <b  style="top:15px">No</b> </th>
                    <th border="0.5pt" valign="center" width="16%" align="center" > <b>Tgl/Kab/Kota</b> </th>
                    <th border="0.5pt" valign="center" width="10%" align="center" > <b>Bidang</b> </th>
                    <th border="0.5pt" valign="center" width="25%" align="center" > <b>Judul</b> </th>
                    <th border="0.5pt" valign="center" width="38%" align="center"> <b>Deskripsi</b> </th>
                    <th border="0.5pt" valign="center" width="8%" align="center" > <b>Status</b> </th>
              </tr>';
                $row = $this->db->query("
                    SELECT
                      tr_angket.NMANGKET   AS KONFLIK,
                      m_status.NMSTATUS    AS STATUS,
                      m_kecamatan.NMKEC    AS KECAMATAN,
                      m_kabkota.NMWIL    AS KABUPATEN,
                      m_btkangket.NMBENTUK AS BIDANG,
                      tr_angket.TGLANGKET  AS TANGGAL,
                      tr_angket.DESKRIPSI  AS DESKRIPSI
                    FROM tr_angket
                         LEFT JOIN m_kecamatan
                           ON m_kecamatan.IDKEC = tr_angket.IDKEC
                        LEFT JOIN m_kabkota
                           ON m_kecamatan.IDKAB = m_kabkota.IDWIL
                        LEFT JOIN m_btkangket
                          ON m_btkangket.IDBENTUK = tr_angket.IDBENTUK
                       LEFT JOIN m_status
                         ON m_status.IDSTATUS = tr_angket.STATUS
                         WHERE m_kabkota.NMWIL LIKE '%$wil%' AND 
                         m_btkangket.NMBENTUK LIKE '%$bdg%' AND 
                         tr_angket.TGLANGKET LIKE '%$thn%' ")->result();
                $no =1;
                foreach ($row as $data):

         $tabel .=     '
 
              <tr>
                    <td border="0.5pt" align="center" style="height:18px;" > '.$no.' </td>
                    <td border="0.5pt" valign="b" align="center"> '.$data->TANGGAL.'<br>'.$data->KECAMATAN.', '.$data->KABUPATEN.' </td>
                    <td border="0.5pt" align="center">'.$data->BIDANG.' </td>
                    <td border="0.5pt" style="text-align:justify; padding:2px;"> '.$data->KONFLIK.'</td>
                    <td border="0.5pt" style="text-align:justify; padding:2px;"> '.$data->DESKRIPSI.' </td>
                    <td border="0.5pt" > '.$data->STATUS.' </td>
              </tr> ';
              $no++;
          endforeach;
              $tabel .= '
             
        </table>
        ';
        if ( $this->input->post('wilayah')==='') {
          $tabel.='<br><br><table width= "100%" >
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    
                    <td width="70%">
                    </td>
                  
                    <td width="30%" align="center">
                      Kupang, '.$this->tgl_indo(date('Y-m-d')).' <br><br>
                      Kepala Badan Kesbangpol<br> Provinsi Nusa Tenggara Timur,  <br>
                      <br>
                      <br><br>
                      <u>'.$nama.'</u><br>
                      '.$tingkat.'
                      <br>
                      Nip. '.$nip.'
                    </td>
                  
                  </tr>
          </table>';
        }
        
        $pdf->writeHTML($tabel);
        $pdf->Output('file-pdf-codeigniter.pdf', 'I');

        echo("wil : ".$wil);
    }
 
}