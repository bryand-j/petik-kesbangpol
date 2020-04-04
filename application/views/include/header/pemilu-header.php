 <header id="header">
    <div class="container">


      <div class="logo float-left">
        <!-- <h1 class="text-light"><a href="index"><span>Peranko</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="<?=base_url()?>home/index#topbar"><img src="<?=base_url()?>home/assets/img/logo.svg" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li ><a href="<?=base_url()?>home/index#topbar">Beranda<i class="la la-angle-down"></i></a></li>
          <li  onclick="window.location.href='<?=base_url()?>home/service?page=Peta';"><a href="">Peta</a></li>
          <li  onclick="window.location.href='<?=base_url()?>home/service?page=Grafik';"><a href="">Grafik</a></li>
          <li  onclick="window.location.href='<?=base_url()?>home/service?page=Data';"><a href="">Data</a></li>
          <li class="active" onclick="window.location.href='<?=base_url()?>home/service?page=pemilu';"><a href="">Peta Pemilu</a></li>
          <li><a href="<?=base_url()?>home/berita">Berita</a></li>
          <li><a href="#footer">Kontak</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <script type="text/javascript">
    
  </script>