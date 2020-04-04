<?php $this->load->view('include/head',$title); ?>

<body>





  <?php $this->load->view('include/header/'.$header); ?>
  <main id="main" >
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="section-title mt-4">
          
          <h2><?=$halaman;?> <a href="#" onclick="buka_popup()">  <i style="font-size: 20px;" class=" align-top icofont-external-link"></i></a></h2>

        </div>
        <div id="cont" class="row" style="height: <?=$height;?>;">
            <iframe id="questionnaire" class="col" style=" position: relative; height: 100%; width: 100%; border: none;" src="../service/<?=$halaman?>"></iframe>
        </div>
      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->

  <?php $this->load->view('include/footer'); ?>
  <script language="javascript">
    function buka_popup(){
     window.open('../service/<?=$halaman?>', '', 'width=2000, height=800,scrollbars=yes, resizeable=yes, status=yes, copyhistory=no,toolbar=no');
    }

    //     var fr = document.getElementById("questionnaire");
    
    // // Adjusting the iframe height onload event

  
    //   fr.contentWindow.document.body.onload=function(){

    //     fr.style.height = fr.contentWindow.document.body.scrollHeight + 'px';
    //     console.log(fr.contentWindow.document.body.scrollHeight +33+ 'px');
    
    //   }

</script>