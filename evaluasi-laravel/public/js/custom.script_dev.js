// input NIP
function form_nip_old() {
    Swal.fire({
        title: 'Evaluasi Tenaga Pengajar',
        text: "Masukkan NIP Anda untuk memulai evaluasi",
        //icon: 'warning',
        input: 'text',
        inputPlaceholder: 'Masukkan NIP tanpa spasi',
        showCancelButton: true,
        confirmButtonColor: '#DC3545',
        confirmButtonText: 'Mulai Evaluasi',
        showLoaderOnConfirm: true,
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            cek_nip(result.value);
        }
    });
    $('.swal2-input').attr('required', 'required');

    return false;
}

// fungsi ajax cek NIP peserta
function cek_nip() {
    var nip_peserta = $('#cari-nip-peserta').val();
    var datastring = 'nip_peserta=' + nip_peserta;

    // NIP harus diisi
    if (nip_peserta === '') {
        $('#cari-nip-peserta').focus();
    }
    // jika sudah diisi
    else {
        // loading and disabled button
        $('#btn-cekNipPeserta').html('<i class="fa fa-spin fa-spinner"></i> Sedang mengecek');
        $('#btn-cekNipPeserta').attr({'aria-disabled': 'true', 'class': 'btn btn-danger disabled'});
        $.ajax({
            url: 'cek_nip_peserta_dev.php',
            type: 'POST',
            data: datastring,
            cache: false,
            success: function success(returndata) {
                send_to_form(returndata);
            }
        });
        // kembalikan button ke kondisi awal
        $('#btn-cekNipPeserta').html('Cek NIP');
        $('#btn-cekNipPeserta').removeAttr('aria-disabled');
        $('#btn-cekNipPeserta').attr('class', 'btn btn-danger');
    }

    return false;
}

// fungsi teruskan data peserta ke form konfirmasi tp
//
function send_to_form(data_json) {
    $('#modal-nip-peserta-evaltp').modal('hide');
    var data_peserta = JSON.parse(data_json);
    // jika data peserta ditemukan
    if (data_peserta.ditemukan === 'yes') {
        $('#input-nip-peserta').val(data_peserta.nip_peserta);
        $('#input-nama-peserta').val(data_peserta.nama_peserta);
        $('#input-jabatan-peserta').val(data_peserta.jabatan);
        $('#input-instansi-peserta').val(data_peserta.instansi);
        $('#input-id-pelatihan').val(data_peserta.id_pelatihan);
        $('#input-jenis-pelatihan').val(data_peserta.jenis_pelatihan);
        $('#input-nama-pelatihan').val(data_peserta.nama_pelatihan);
        $('#input-tahun').val(data_peserta.tahun);
        // tampilkan modal konfirmasi untuk melanjutkan evaluasi Tenaga Pengajar
        $('#modal-konfirm-evaltp').modal('show');
    }
    // jika tidak ditemukan
    else {
        Swal.fire('Data peserta tidak ditemukan');
    }
    console.log(data_json);
}