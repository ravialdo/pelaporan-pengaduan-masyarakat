<!doctype html>
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <title>Laporan Pengaduan Masyarakat</title>

</head>
<body>

      <style>
            .page-break {
                  page-break-after: always;
            }
            .text-center {
                  text-align: center;
            }
            .text-header {
                  font-size: 1.1rem;
            }
            .size2 {
                  font-size: 1.4rem;
            }
            .border-bottom {
                  border-bottom: 1px black solid;
            }
            .border {
                  border: 2px block solid;
            }
            .border-top {
                  border-top: 1px black solid;
            }
            .float-right {
                  float: right;
            }
            .mt-4 {
                  margin-top: 4px;
            }
            .mx-1 {
                  margin: 1rem 0 1rem 0;
            }
            .mr-1 {
                  margin-right: 1rem;
            }
            .mt-1 {
                  margin-top: 1rem;
            }
            ml-2 {
                  margin-left: 2rem;
            }
            .ml-min-5 {
                  margin-left: -5px;
            }
            .text-uppercase {
                  font: uppercase;
            }
            .d1 {
                  font-size: 2rem;
            }
            .img {
                  position: absolute;
            }
            .link {
                  font-style: underline;
            }
            .text-desc {
                  font-size: 14px;
            }
            .text-bold {
                  font-style: bold;
            }
            .underline {
                  text-decoration: underline;
            }

            table {
                  font-family: Arial, Helvetica, sans-serif;
                  color: #666;
                  text-shadow: 1px 1px 0px #fff;
                  background: #eaebec;
                  border: #ccc 1px solid;
            }
            table th {
                  padding: 10px 15px;
                  border-left: 1px solid #e0e0e0;
                  border-bottom: 1px solid #e0e0e0;
                  background: #ededed;
            }
            table tr {
                  text-align: center;
                  padding-left: 20px;
            }
            table td {
                  padding: 10px 15px;
                  border-top: 1px solid #ffffff;
                  border-bottom: 1px solid #e0e0e0;
                  border-left: 1px solid #e0e0e0;
                  background: #fafafa;
                  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
                  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
            }
            .table-center {
                  margin-left: auto;
                  margin-right: auto;
            }
            .mb-1 {
                  margin-bottom: 1rem;
            }
      </style>

      <!-- header -->
      <div class="text-center">

            <div>
                  <span class="text-header text-bold text-danger">
                        PEMERINTAH DAERAH PROVINSI JAWA BARAT <br> DINAS PENDIDIKAN <br>
                        <span class="size2">CABANG DINAS PENDIDIKAN WILAYAH IX</span> <br>
                        SEKOLAH MENENGAH KEJURUAN NEGERI 1 TALAGA <br>
                  </span>
                  <span class="text-desc">Jalan Sekolah Nomor 20 Telepon (0233) 319238<br>FAX (0233) 319238 Website <span class="underline">www.smkn1talaga-mjl.net</span> - Email <span class="underline">sekolah@smkn1talaga-mjl.net</span> <br> Desa Talaga Kulon Kec. Talaga Kab. Majalengka 45463 <br> </span>
            </div>
      </div>
      <div>
            <!-- /header -->

            <hr class="border">

            <!-- content -->

            <div class="size2 text-center mb-1">
                  LAPORAN PENGADUAN MASYARAKAT
            </div>

            <table class="table-center mb-1">
                  <thead>
                        <tr>
                              <th>NIK</th>
                              <th>Pelapor</th>
                              <th>Laporan</th>
                              <th>Status</th>
                              <th>Nomor Telepon</th>
                              <th>Tanggal Lapor</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach($pengaduan as $row)
                        <tr>

                              <td>{{ $row->nik }}</td>
                              <td>{{ $row->masyarakat->nama }}</td>
                              <td>{{ $row->isi_laporan }}</td>
                              <td>{{ $row->status == '0' ? 'menunggu' : $row->status }}</td>
                              <td>{{ $row->masyarakat->telepon }}</td>
                              <td>{{ $row->tanggal_pengaduan->format('d M, Y') }}</td>

                        </tr>
                        @endforeach
                  </tbody>


            </table>
            <!-- /content -->

            <!-- footer -->
            <div>
                  Pembuat : {{ session('nama') }}
            </div>
            <!-- /footer -->
      </body>
</html>