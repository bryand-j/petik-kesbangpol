
<?php $this->load->view('include/head',$title); ?>
<body>

<?php $this->load->view('include/header/berita-header'); ?>
  <main id="main">
    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h4>Berita</h4>
        <div class="row">
          <div class="col-12 align-self-end">
            <div class="row justify-content-end">
              <div class="col-md-4 col-sm-12 ">
                 <form action="berita" method="get" class="" role="form">
                  <div class="form-group">
                      <input type="search" id="cari" class="cari form-control" name="Cari" id="subject" placeholder="Cari"/>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12">
            <?php if ($berita->num_rows()<1): ?>
              <?php echo "Tidak Ada Berita" ?>
            <?php else: ?>
            
            <?php foreach ($berita->result() as $key): ?>
              
            <div class="cat-box row">
              <div class="col-sm-12 col-md-4 py-3">
                <img class="img-fluid " style="height: 230px; width: auto;"  src="<?php echo base_url(); ?>home/assets/img/<?=$key->IMG?>" alt="Generic placeholder image">
              </div>
              <div class="col-md-8 col-sm-12">
                <h4 class="mx-1 my-1"><?=$key->NMANGKET?></h4>
                <p><?=$key->DESKRIPSI?></p>
                <p class="mt-3"><small class="">27 January 2020 - Manggarai Barat</small></p>
                <a href="detail?berita=<?=$key->IDTRXANGKET?>" class="btn btn-outline-primary btn-sm mb-3" >Baca Selengkapnya<span class="icofont-rounded-right"></span></a>
              </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
          </div>
          <div class="col-md-4 col-sm-12">
           
            <div class="cat-box">
              <h5 class="mb-1 px-3 pt-3">Kategori</h5>
              <div class="list-group list-group-flush ">
                <a href="" class="list-group-item list-group-item-action disabled "></a>
                <?php if ($kategori!=""): ?>
                  <a href="berita" class="list-group-item list-group-item-action">Semua Kategori</a>
                  <a href="#" class="list-group-item list-group-item-action active"><?=$kategori?></a>  
                <?php endif ?>
                <?php if ($kategori==""): ?>
                  <a href="berita" class="list-group-item list-group-item-action active">Semua Kategori</a>  
                <?php endif ?>
                
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
  <script type="text/javascript">
    

    $('#cari').focus(function(){
        // function cari(){

        //   window.location.href='berita?cari='+$('#cari').value();
        // }
      });
      
    
  </script>
