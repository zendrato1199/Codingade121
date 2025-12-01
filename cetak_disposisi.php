<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header("Location: ./");
        die();
    } else {

        echo '
        <style type="text/css">
            table {
                background: #fff;
                padding: 5px;
            }
            tr, td {
                border: table-cell;
                border: 1px  solid #444;
            }
            tr,td {
                vertical-align: top!important;
            }
            #right {
                border-right: none !important;
            }
            #left {
                border-left: none !important;
            }
            .isi {
                height: 200px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 100px;
                height: 100px;
                margin: 0 0 0 1rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                nav {
                    display: none;
                }
                table {
                    width: 100%;
                    font-size: 15px;
                    color: #212121;
                }
                tr, td {
                    border: table-cell;
                    border: 1px  solid #444;
                    padding: 8px!important;

                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 40px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 100px;
                    height: 100px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    width: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -20px 0;
                }
                .up {
                    font-size: 17px!important;
                    font-weight: normal;
                }
                .status {
                    font-size: 12px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                #lbr {
                    font-size: 17px;
                    font-weight: bold;
                }
                .separator {
                    border-bottom: 2px solid #616161;
                    margin: -1rem 0 1rem;
                }

            }
        </style>

        <body onload="window.print()">

        <!-- Container START -->
            <div id="colres">
                <div class="disp">';
                    $query2 = mysqli_query($config, "SELECT institusi, nama, status, alamat, logo FROM tbl_instansi");
                    list($institusi, $nama, $status, $alamat, $logo) = mysqli_fetch_array($query2);
                        echo '<img class="logodisp" src="https://betesdabatam.wordpress.com/wp-content/uploads/2016/12/img_20161221_163959.jpg?w=661'.$logo.'"/>';
                        echo '<h5 class="up"><strong>'.$institusi.'</strong></h5>';
                        echo '<h5 class="up" id="nama">'.$nama.'</h5><br/>';
                        echo '<h7 class="alamat">SK MENTRI HUKUM DAN HAK AZASI MANUSIA REPUBLIK INDONESIA<br/> 
                        NO: AHU-0019162.AH.01.12.TAHUN 2017</h6>';
                        echo '<h7 class=""><br>SEKRETARIAT KOMP. GREEN TOWN BLOK Q NO. 13 - 15 BENGKONG CENTER</br></h7>';
                        echo '<h7 class="alamat">Telepon 0852-7778 7963, 0812-7045 817,  Email : mpz_zendrato@hotmail.com, zebu ap@hotmail.com, kepri, Batam</h7>';

                    echo '
                </div>
                <div class="separator"></div>';

                $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk WHERE id_surat='$id_surat'");

                if(mysqli_num_rows($query) > 0){
                $no = 0;
                while($row = mysqli_fetch_array($query)){

                echo '
                    <table class="bordered" id="tbl">
                        <tbody>
                            <tr>
                                <td class="tgh" id="lbr" colspan="10">LEMBAR DISPOSISI</td>
                            </tr>
                            <tr>
                                <td id="right" width="20%"><strong>Indeks Berkas</strong></td>
                                <td id="left" style="border-right: none;" width="57%">: '.$row['indeks'].'</td>
                                <td id="left" width="25"><strong>Kode</strong> : '.$row['kode'].'</td>
                            </tr>
                            <tr><td id="right"><strong>Tanggal Surat</strong></td>
                                <td id="left" colspan="2">: '.indoDate($row['tgl_surat']).'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Asal Surat</strong></td>
                                <td id="left" colspan="2">: '.$row['asal_surat'].'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Diterima Tanggal</strong></td>
                                <td id="left" style="border-right: none;">: '.indoDate($row['tgl_diterima']).'</td>
                                <td id="left"><strong>No. Agenda</strong> : '.$row['no_agenda'].'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Perihal</strong></td>
                                <td id="left" colspan="2">: '.$row['isi'].'</td>
                            </tr>
                    </tbody>
                    </table>
                        <table class="bordered" id="tbl">
                        <tbody>
                            <tr>';
                            $query3 = mysqli_query($config, "SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk ON tbl_disposisi.id_surat = tbl_surat_masuk.id_surat WHERE tbl_disposisi.id_surat='$id_surat'");

                            if(mysqli_num_rows($query3) > 0){
                                $no = 0;
                                $row = mysqli_fetch_array($query3);{
                                echo '
                            <tr class="isi">
                                <td colspan="2">
                                    <strong>Isi Disposisi :</strong><br/>'.$row['isi_disposisi'].'
                                    <strong>
                                    <div style="height: 50px;"></div>
                                    <strong>Batas Waktu</strong> : '.indoDate($row['batas_waktu']).'<br/>
                                    <strong>Sifat</strong> : '.$row['sifat'].'<br/>
                                    <strong>Catatan</strong> :<br/> '.$row['catatan'].'
                                    <div style="height: 25px;"></div>
                                </td>
                                <td><strong>Diteruskan Kepada</strong> : <br/>'.$row['tujuan'].'</td>
                            </tr>';
                                }
                            } else {
                                echo '
                              <tbody>  
                                <tr>
                                <br>
                                <td colspan="5" id="right"><strong>Nomor Surat : '.$row['no_surat'].'</strong></td>
                                </tr>
                            </tbody
                            <tr>
                            <tbody>
                                    <td colspan="2"><strong>Diteruskan Kepada :
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>KETUA Yayasan
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>WAKET Yayasan
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>SEKRETARIS
                                     <td><strong> <br><span style="font-size:30px; line-height:1em,">&#9633;</span>ADMINISTRASI
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>PENGAWAS LEMBAGA
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>ANALISIS & EVALUASI
                                                    </br></strong>
                                    </td>
                                </tbody>
                                    <td colspan="2"><strong>Disposisi :</strong>
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>Laksanakan / Sesuaikan
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>Beri Penjelasan / Lisan
                                                    <br><span style="font-size:30px; line-height:1em,">&#9633;</span>Jadwalkan / Mewakili
                                                
                                    </td>
                                    <td><strong></strong> <br><span style="font-size:30px; line-height:1em,">&#9633;</span>Saran
                                                        <br><span style="font-size:30px; line-height:1em,">&#9633;</span>Segera
                                                        <br><span style="font-size:30px; line-height:1em,">&#9633;</span>Proses
                                    </td>
                                    <tr>
                                    <td colspan="5"><table style="font-size:20; line-heigth:1em,">Catatan :</table>
                                    <br></br>
                                    <br></br>
                                    </td>
                                    </tr>
                                </tr>';
                            }
                        } echo '
                        </tbody>
                        </table> 
                </tbody>
            </table>
            
        </div>
        <div class="jarak2"></div>
    <!-- Container END -->

    </body>';
    }
}
?>
