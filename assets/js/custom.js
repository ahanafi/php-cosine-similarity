/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(".select2").select2();

function formatRupiah(element) {
    const nominal = $(element).val();
    const numberString = nominal.replace(/[^,\d]/g, '').toString();
    const split = numberString.split(',');
    const sisa = split[0].length % 3;
    let rupiah = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
        const separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    ribuan = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    $(element).css({
        'font-style': 'italic'
    });
    $(element).val(ribuan);
}

function toRupiah(nominal) {
    let numberString = nominal.replace(/[^,\d]/g, '').toString();
    const split = numberString.split(',');
    const sisa = split[0].length % 3;
    let rupiah = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
        const separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;

}

const showNotaByPelanggan = (element) => {
    const id_pelanggan = element.value;
    if(id_pelanggan !== '' && typeof id_pelanggan !== 'undefined') {
        const actionURL = `${BASE_URL}/pelanggan/get-daftar-nota/${id_pelanggan}`;
        $.ajax({
            method: 'GET',
            url: actionURL,
            success: function (response) {
                const data = JSON.parse(response);
                if(data !== '') {
                    // $(".list-nota > option").remove();
                    // $(".list-nota").append(`<option disabled selected>-- Pilih Nota --</option>`);
                    // $.each(data, function (index, val) {
                    //     const newOption = `<option value="${val.no_nota}">${val.no_nota}</option>`;
                    //     $(".list-nota").append(newOption);
                    // });
                    
                }
            }
        });
    }
}