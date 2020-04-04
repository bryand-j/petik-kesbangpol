<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$data = array(
			'title'=>'Beranda',
			'bidang'=>$this->db->get('m_btkangket')->result(),
			'slide1'=>$this->db->query('SELECT * FROM m_slide order by IDSLIDE  asc')->row(),
			'slide'=>$this->db->query('SELECT * FROM m_slide order by IDSLIDE desc LIMIT 2')->result(),
			'berita' =>$this->db->query("SELECT ang.IDTRXANGKET, kec.NMKEC,kab.NMWIL,ang.TGLANGKET,ang.NMANGKET, ang.DESKRIPSI, ang.IMG FROM tb_berita, m_kabkota kab, m_kecamatan kec,tr_angket ang WHERE kec.IDKEC=ang.IDKEC AND kec.IDKAB=kab.IDWIL AND tb_berita.IDKONFLIK=ang.IDTRXANGKET ORDER BY ang.IDTRXANGKET DESC LIMIT 3")->result() , );
		$this->load->view('index1',$data);
	}
	public function service()
	{
		$header="";
		$page=$this->input->get('page');
		if ($page=='Data') {
			$height="1300px";
			$header="data-header";
		}
		elseif ($page=='Grafik') {
			$height="600px";
			$header="grafik-header";
		}
		elseif ($page=='Peta') {
			$height="800px";
			$header="peta-header";
		}
		elseif ($page=='pemilu') {
			$height="800px";
			$header="pemilu-header";
		}
		else {
			$height="600px";
		}


		$data = array('halaman' =>$page,
						'title'=>'layanan - '.$page,
						'header'=>$header,
						'height'=>$height);
		$this->load->view('service',$data);
	}
	public function berita()
	{
		$select="";
		if ($this->input->get('id')!="") {
			$select=$this->input->get('kategori');
			$this->db->where("IDBENTUK != '".$this->input->get('id')."'");
			$kat=$this->db->get('m_btkangket')->result();
			$berita=$this->db->query("SELECT ang.IDTRXANGKET, kec.NMKEC,kab.NMWIL,ang.TGLANGKET,ang.NMANGKET, ang.DESKRIPSI, ang.IMG FROM tb_berita, m_kabkota kab, m_kecamatan kec,tr_angket ang WHERE kec.IDKEC=ang.IDKEC AND kec.IDKAB=kab.IDWIL AND tb_berita.IDKONFLIK=ang.IDTRXANGKET AND ang.IDBENTUK='".$this->input->get('id')."'  ORDER BY ang.IDTRXANGKET DESC LIMIT 20");
		}
		elseif ($this->input->get('Cari')!="") {
			$kat=$this->db->get('m_btkangket')->result();
			$berita=$this->db->query("SELECT ang.IDTRXANGKET, kec.NMKEC,kab.NMWIL,ang.TGLANGKET,ang.NMANGKET, ang.DESKRIPSI, ang.IMG FROM tb_berita, m_kabkota kab, m_kecamatan kec,tr_angket ang WHERE kec.IDKEC=ang.IDKEC AND kec.IDKAB=kab.IDWIL AND tb_berita.IDKONFLIK=ang.IDTRXANGKET AND ang.NMANGKET OR ang.DESKRIPSI like '%".$this->input->get('Cari')."%'  ORDER BY ang.IDTRXANGKET DESC LIMIT 10");
			$select="";
		}
		else{
			$kat=$this->db->get('m_btkangket')->result();
			$berita=$this->db->query("SELECT ang.IDTRXANGKET, kec.NMKEC,kab.NMWIL,ang.TGLANGKET,ang.NMANGKET, ang.DESKRIPSI, ang.IMG FROM tb_berita, m_kabkota kab, m_kecamatan kec,tr_angket ang WHERE  tb_berita.IDKONFLIK=ang.IDTRXANGKET AND kec.IDKEC=ang.IDKEC AND kec.IDKAB=kab.IDWIL  ORDER BY ang.IDTRXANGKET DESC LIMIT 10");
			$select="";
		}

		$data = array('title'=>'Berita',
						'berita' =>$berita,
						'kat'=>$kat,
						'kategori'=>$select
					);
		$this->load->view('berita',$data);
	}
	public function detail()
	{


		$berita=$this->input->get('berita');


		$viewer=$this->db->query("select * from tb_berita where IDKONFLIK='".$berita."'")->row();
		$data = array('VIEWER' =>$viewer->VIEWER+1, );
		$this->db->where('IDKONFLIK', $berita);
		$this->db->update('tb_berita', $data);
		

		$this->db->select('tb_berita.JUDUL,tb_berita.ISI,tb_berita.TGL, m_kabkota.NMWIL,tb_user.NMUSER,m_btkangket.NMBENTUK ');
		$this->db->from('tb_berita,tr_angket,tb_user,m_kabkota,m_kecamatan,m_btkangket');
		$this->db->where('tb_berita.IDKONFLIK=tr_angket.IDTRXANGKET AND m_kecamatan.IDKEC=tr_angket.IDKEC 
			AND m_kecamatan.IDKAB=m_kabkota.IDWIL AND m_btkangket.IDBENTUK=tr_angket.IDBENTUK
			AND tb_user.IDUSER=tb_berita.AUTHOR');

		$this->db->where('tr_angket.IDTRXANGKET', $berita);
		$sql=$this->db->get('')->row();
		$data = array('title'=>$sql->JUDUL,
						'isi'=>$sql,
						'kat'=>$this->db->get('m_btkangket')->result(),
						'url'=>'192.168.137.222/home/detail?berita='.$berita.'',);
		$this->load->view('detail',$data);
	}



}
