<?php $this->load->view('include/head',$title); ?>
<body>







  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">

    <div class="container clearfix ">
      <div class="d-flex justify-content-center animated pulse infinite">
       
          <p style="font-size:16px"><strong>NKRI HARGA MATI</strong></p>
 
      </div>
    </div>
  
  </section>

<?php $this->load->view('include/header/home-header'); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->

          <div class="carousel-item active " style="background-image: url('<?php echo base_url()?>assets/slide/<?=$slide1->FILESLIDE ?>');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown"> <?=$slide1->JDSLIDE ?></h2>
                <p class="animated fadeInUp"> <?=$slide1->ISISLIDE ?> </p>
                <a href="#services" class="btn-get-started animated fadeInUp scrollto">lihat Layanan</a>
              </div>
            </div>
          </div>
          <?php foreach ($slide as $row): ?>
            
          <div class="carousel-item " style="background-image: url('<?php echo base_url()?>assets/slide/<?=$row->FILESLIDE ?>');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <h2 class="animated fadeInDown"> <?=$row->JDSLIDE ?></h2>
                <p class="animated fadeInUp"> <?=$row->ISISLIDE ?> </p>
                <a href="#services" class="btn-get-started animated fadeInUp scrollto">lihat Layanan</a>
              </div>
            </div>
          </div>

          <?php endforeach ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Services Section ======= -->
     <section class="about-lists">
      <div class="container">

        <div class="section-title">
          <h2>Bidang Konflik</h2>
        </div>

        <div class="row no-gutters">
          <?php foreach ($bidang as $key): ?>
            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
              <h4 style="font-family: 'Amaranth', sans-serif;"><?=$key->NMBENTUK?></h4>
              <p style="color:#1b1e2b; text-align: justify; font-family: 'Catamaran', sans-serif;"><?=$key->DESKRIPSI?></p>
            </div>
          <?php endforeach ?>

        </div>

      </div>
    </section><!-- End About Lists Section -->

    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Layanan</h2>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 icon-box" data-aos="fade-up">
            <a href="service?page=Peta" class="icon"><i class="icofont-map" style="color: #20b38e;"></i></a>
            <h4 class="title"><a href="">Peta Konflik</a></h4>
             <p class="description" style="font-family: 'Alegreya Sans', sans-serif; color: black; font-weight: 500pt;">Peta Informasi Rawan Konflik Di Provinsi Nusa Tenggara Timur</p>
          </div>
          <div class="col-lg-3 col-md-3 icon-box" data-aos="fade-up" data-aos-delay="100">
            <a href="service?page=Grafik" class="icon"><i class="icofont-chart-bar-graph" style="color: #46d1ff;"></i></a>
            <h4 class="title"><a href="">Grafik Konflik</a></h4>
            <p class="description" style="font-family: 'Alegreya Sans', sans-serif;  color: black;">Grafik Informasi Konflik Wilayah Nusa Tenggara Timur</p>

          </div>
          <div class="col-lg-3 col-md-3 icon-box" data-aos="fade-up" data-aos-delay="200">
            <a href="service?page=Data" class="icon"><i class="icofont-table" style="color: #ffb459;"></i></a>
            <h4 class="title"><a href="">Data Konflik</a></h4>
            <p class="description" style="font-family: 'Alegreya Sans', sans-serif;  color: black;">Tabel Informasi Data Konflik Provinsi Nusa Tenggra Timur</p>
            
          </div>
          <div class="col-lg-3 col-md-3 icon-box" data-aos="fade-up" data-aos-delay="200">
            <a href="service?page=Pemilu" class="icon"><i class="icofont-flag" style="color: #dc3545;"></i></a>
            <h4 class="title"><a href="">Peta Pemilu</a></h4>
            <p class="description" style="font-family: 'Alegreya Sans', sans-serif;  color: black;">Peta Perolehan Suara Partai Politik Provinsi Nusa Tenggara Timur</p>
            
          </div>

         
        </div>

      </div>
    </section><!-- End Services Section -->

    

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Berita</h2>
          <p></p>
        </div>

        <div class="row">
          <?php foreach ($berita as $key): ?>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card text-white">
              <img class="card-img img-fluid " style="height: 250px; width: auto;"  src="<?php echo base_url(); ?>home/assets/img/<?=$key->IMG?>" alt="Card image">
              <div class="card-img-overlay" style="background-color: #00000070;">
                <h6 class="card-title"> <?=substr($key->NMANGKET,0,50)."..."?></h6>
                <p class="card-text" style="font-size: 13px;"><?=substr($key->DESKRIPSI,0,70)."..."?></p>
                <p class="card-text"><small class=""><?=$key->TGLANGKET?> - <?=$key->NMWIL?></small></p>
                <a href="detail?berita=<?=$key->IDTRXANGKET?>" class="btn btn-primary btn-sm" style="bottom: 10px; right: 10px; position: absolute;">Baca selengkapnya</a>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        
        	
        	<div class="col-lg-3 col-md-6 col-sm-12 mb-3">
        		<div class="card text-white ">
				      <img class="card-img" src="<?php echo base_url(); ?>home/assets/img/default.jpg" style="height: 250px; width: auto;" alt="Card image">
				      <div class="card-img-overlay" style="background-color: #00000070; ">
								
					  	  <div class="row justify-content-center align-items-center" style="height: 100%;">
					  		  <a href="<?=base_url()?>home/berita" class="btn btn-outline-light btn-sm" >Semua Berita <span class="icofont-rounded-right"></span></a>
					  	  </div>
				    
				      </div>
				    </div>
        	</div>

        </div>



      </div>
    </section><!-- End Our Portfolio Section -->

     <!-- ======= Our Team Section ======= -->
     <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Pejabat</h2>
         
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6 content-item" data-aos="fade-up">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>home/assets/img/gub.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Viktor Bungtilu Laiskodat SH,M.Kn</h4>
                <span>Gubernur Provinsi NTT</span>
                
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>home/assets/img/wagub.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Drs Josef Nae Soi, M.M.</h4>
                <span> Wakil Gubernur Provinsi NTT</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>home/assets/img/kab.jpg" style="max-width: 1000px;" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Johanna E. Lisapaly, SH. M.Si</h4>
                <span>Kepala Badan</span>
               
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="pic"><img src="<?php echo base_url(); ?>home/assets/img/sek.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Nama</h4>
                <span>Sekertaris</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Our Team Section -->

  </main><!-- End #main -->

  <?php $this->load->view('include/footer'); ?>