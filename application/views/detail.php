
<?php $this->load->view('include/head',$title); ?>
<body>

<?php $this->load->view('include/header/berita-header'); ?>
  <main id="main">
    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h4 class="ml-3"><?=$isi->JUDUL?></h4>
        <p class="ml-3"><small class="text-muted">Kategori :<?=$isi->NMBENTUK?> </small></p>
        <div class="row">
          <div class="col-md-8 col-sm-12">
              <div class=" mb-4 ">
                <div class="mb-3 card-body">
      
                    <div class="">
                      <p class="card-text"><?=$isi->ISI?></p>
                      <p class="card-text"><span class="icofont-calendar"> </span><small class="text-muted"><?=$isi->TGL?></small></p>
                      <p class="card-text"><span class="icofont-map"> </span> <small class="text-muted"><?=$isi->NMWIL?></small></p>
                      <p class="card-text"><span class="icofont-user"> </span> <small class="text-muted"><?=$isi->NMUSER?></small></p>
                    </div>
                  </div>

                  <div class="social-l mt-3 ml-3">
                    <span>Bagikan :</span>
                    <a href="http://twitter.com/share?text=<?=$title?>&url=<?=$url?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="http://facebook.com/sharer.php?u=<?=$url?>"  target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="whatsapp://send?text=0<?=$title."%20%2D%20".$url?>" class="instagram"><i class="bx bxl-whatsapp"></i></a>
                  </div>
              </div>

          </div>
          <div class="col-md-4 col-sm-12">
           
            <div class="cat-box">
              <h5 class="mb-1 px-3 pt-3">Kategori</h5>
              <div class="list-group list-group-flush ">
                <a href="" class="list-group-item list-group-item-action disabled "></a>
                <a href="berita" class="list-group-item list-group-item-action">Semua Kategori</a>
                <?php foreach ($kat as $key): ?>
                <a href="berita?id=<?=$key->IDBENTUK?>&kategori=<?=$key->NMBENTUK?>" class="list-group-item list-group-item-action "><?=$key->NMBENTUK?></a>  
                <?php endforeach ?>
              </div>
            </div>


          </div>
        </div>

        



      </div>
    </section><!-- End Our Portfolio Section -->


  </main><!-- End #main -->

  <?php $this->load->view('include/footer'); ?>

 