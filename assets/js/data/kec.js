    $(document).ready(function(){
        tampil_data();
        //Menampilkan Data di tabel
        function tampil_data(){
            $.ajax({
                url: '<?php echo base_url(); ?>kecamatan',
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var i;
                    var no = 0;
                    var html = "";
                    for(i=0;i < response.length ; i++){
                        no++;
                        html = html + '<tr>'
                                    + '<td>' + no  + '</td>'
                                    + '<td>' +response[i].NMKEC  + '</td>'
                                                            
                                    + '</tr>';
                    }
                    $("#kecamatan").html(html);
                }
 
            });
        }
        //Hapus Data dengan konfirmasi
        // $("#tbl_data").on('click','.btn_hapus',function(){
        //     var noinduk = $(this).attr('data-id');
        //     var status = confirm('Yakin ingin menghapus?');
        //     if(status){
        //         $.ajax({
        //             url: '<?php echo base_url(); ?>C_Index/hapusData',
        //             type: 'POST',
        //             data: {noinduk:noinduk},
        //             success: function(response){
        //                 tampil_data();
        //             }
        //         })
        //     }
        // })
        //Menambahkan Data ke database
        // $("#btn_add_data").on('click',function(){
        //     var noinduk = $('input[name="noinduk"]').val();
        //     var nama = $('input[name="nama"]').val();
        //     var alamat = $('input[name="alamat"]').val();
        //     var hobi = $('input[name="hobi"]').val();
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>C_Index/tambahData',
        //         type: 'POST',
        //         data: {noinduk:noinduk,nama:nama,alamat:alamat,hobi:hobi},
        //         success: function(response){
        //             $('input[name="noinduk"]').val("");
        //             $('input[name="nama"]').val("");
        //             $('input[name="alamat"]').val("");
        //             $('input[name="hobi"]').val("");
        //             $("#addModal").modal('hide');
        //             tampil_data();
        //         }
        //     })
 
        // });
        //Memunculkan modal edit
        // $("#tbl_data").on('click','.btn_edit',function(){
        //     var noinduk = $(this).attr('data-id');
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>C_Index/ambilDataByNoinduk',
        //         type: 'POST',
        //         data: {noinduk:noinduk},
        //         dataType: 'json',
        //         success: function(response){
        //             console.log(response);
        //             $("#editModal").modal('show');
        //             $('input[name="noinduk_edit"]').val(response[0].noinduk);
        //             $('input[name="nama_edit"]').val(response[0].nama);
        //             $('input[name="alamat_edit"]').val(response[0].alamat);
        //             $('input[name="hobi_edit"]').val(response[0].hobi);
        //         }
        //     })
        // });
 
        //Meng-Update Data
        // $("#btn_update_data").on('click',function(){
        //     var noinduk = $('input[name="noinduk_edit"]').val();
        //     var nama = $('input[name="nama_edit"]').val();
        //     var alamat = $('input[name="alamat_edit"]').val();
        //     var hobi = $('input[name="hobi_edit"]').val();
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>C_Index/perbaruiData',
        //         type: 'POST',
        //         data: {noinduk:noinduk,nama:nama,alamat:alamat,hobi:hobi},
        //         success: function(response){
        //             $('input[name="noinduk_edit"]').val("");
        //             $('input[name="nama_edit"]').val("");
        //             $('input[name="alamat_edit"]').val("");
        //             $('input[name="hobi_edit"]').val("");
        //             $("#editModal").modal('hide');
        //             tampil_data();
        //         }
        //     })
 
        // });
    });
