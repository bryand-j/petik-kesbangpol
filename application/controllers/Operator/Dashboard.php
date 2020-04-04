<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['hari'] = $this->db->query("SELECT
											  tr_angket.NMANGKET   AS NAMA,
											  m_status.IDSTATUS    AS STATUS,
											  m_kecamatan.NMKEC    AS KECAMATAN,
											  m_kabkota.NMWIL    AS KABUPATEN,
											  m_btkangket.NMBENTUK AS BIDANG,
											  tr_angket.TGLANGKET  AS TANGGAL
											FROM tr_angket
											     LEFT JOIN m_kecamatan
											       ON m_kecamatan.IDKEC = tr_angket.IDKEC
											      LEFT JOIN m_kabkota
											       ON m_kabkota.IDWIL = m_kecamatan.IDKAB
											    LEFT JOIN m_btkangket
											      ON m_btkangket.IDBENTUK = tr_angket.IDBENTUK
											   LEFT JOIN m_status
											     ON m_status.IDSTATUS = tr_angket.STATUS WHERE DATE(tr_angket.TGLANGKET) = DATE(NOW())")->result();
		$data['minggu'] = $this->db->query("SELECT
												  tr_angket.NMANGKET   AS NAMA,
												  m_status.IDSTATUS    AS STATUS,
												  m_kecamatan.NMKEC    AS KECAMATAN,
												  m_kabkota.NMWIL    AS KABUPATEN,
												  m_btkangket.NMBENTUK AS BIDANG,
												  tr_angket.TGLANGKET  AS TANGGAL
												FROM tr_angket
												     LEFT JOIN m_kecamatan
												       ON m_kecamatan.IDKEC = tr_angket.IDKEC
												      LEFT JOIN m_kabkota
												       ON m_kabkota.IDWIL = m_kecamatan.IDKAB
												    LEFT JOIN m_btkangket
												      ON m_btkangket.IDBENTUK = tr_angket.IDBENTUK
												   LEFT JOIN m_status
												     ON m_status.IDSTATUS = tr_angket.STATUS WHERE WEEK(tr_angket.TGLANGKET) = WEEK(NOW())")->result();
		$data['bulan'] = $this->db->query("SELECT
													  tr_angket.NMANGKET   AS NAMA,
													  m_status.IDSTATUS    AS STATUS,
													  m_kecamatan.NMKEC    AS KECAMATAN,
													  m_kabkota.NMWIL    AS KABUPATEN,
													  m_btkangket.NMBENTUK AS BIDANG,
													  tr_angket.TGLANGKET  AS TANGGAL
													FROM tr_angket
													     LEFT JOIN m_kecamatan
													       ON m_kecamatan.IDKEC = tr_angket.IDKEC
													      LEFT JOIN m_kabkota
													       ON m_kabkota.IDWIL = m_kecamatan.IDKAB
													    LEFT JOIN m_btkangket
													      ON m_btkangket.IDBENTUK = tr_angket.IDBENTUK
													   LEFT JOIN m_status
													     ON m_status.IDSTATUS = tr_angket.STATUS WHERE MONTH(tr_angket.TGLANGKET) = MONTH(NOW())")->result();


		$data['jmldesa'] = $this->db->query("SELECT COUNT(IDDESA) AS DESA FROM m_desakel")->row();
		$data['jmlkec'] = $this->db->query("SELECT COUNT(IDKEC) AS KEC FROM m_kecamatan")->row();
		$data['jmlkab'] = $this->db->query("SELECT COUNT(IDWIL) AS KAB FROM m_kabkota")->row();
		$data['kab'] = $this->db->get('m_slide')->result();
		$data['title'] = "PeranKo | Dashboard";
		$this->load->view('Operator/include/head', $data);
		$this->load->view('Operator/include/header');
		$this->load->view('Operator/index', $data);
		$this->load->view('Operator/include/footer');
	}
}
 