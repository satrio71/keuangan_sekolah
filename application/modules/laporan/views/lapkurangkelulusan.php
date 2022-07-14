<?php
$id_tahunpelajaran = id_tahunpelajaran_siswa($r->id_siswa);
$id_tagihan_tahunan = id_tagihan_tahunan($id_tahunpelajaran,$id_tagihan,0);
$biaya = biaya($id_tahunpelajaran,$id_tagihan,3,$r->bsm);
if($biaya)
{   
    $sudah_dibayar = sudah_dibayar($id_tagihan_tahunan, $r->id_siswa);
    $kurang = $biaya - $sudah_dibayar;

    $biaya_akhir = $biaya_akhir + $biaya;
    $sudah_dibayar_akhir = $sudah_dibayar_akhir + $sudah_dibayar;
    $kurang_akhir = $kurang_akhir + $kurang;

    if($kurang > 0)
    {
        $status = '<label class="badge badge-danger">BELUM LUNAS</label>';
    }else{
        $status = '<label class="badge badge-primary">LUNAS</label>';
    }
    echo'<tr>
            <td align="center">'.$no++.'.</td>
            <td>'.$r->nis.'</td>
            <td>'.$r->nama.'</td>
            <td align="center">'.tahun(id_tahunpelajaran_siswa($r->id_siswa)).'</td>
            <td align="center">'.siswa_kelas($r->id_siswa).'</td>
            <td>'.strtoupper(tagihan($id_tagihan)).' ( TP '.tahun($id_tahunpelajaran).' KELAS XII )</td>
            <td align="right">'.number_format($biaya, 0, ',', '.').'</td>
            <td align="right">'.number_format($sudah_dibayar, 0, ',', '.').'</td>
            <td align="right">'.number_format($kurang, 0, ',', '.').'</td>
            <td align="center">'.$status.'</td>
        </tr>';
}
?>