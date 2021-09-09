 <section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              DATA PENDUDUK
            </h2>
            <ul class="header-dropdown">
              <li class="dropdown">
                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#modal-addPenduduk">Tambah</button>
              </li>
            </ul>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="table-penduduk">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>NO KK</th>
                    <th>NAMA LENGKAP</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th>KABUPATEN</th>
                    <th>KECAMATAN</th>
                    <th>DESA</th>
                    <th>RT/RW</th>
                    <th>ALAMAT</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>NIK</th>
                    <th>NO KK</th>
                    <th>NAMA LENGKAP</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th>KABUPATEN</th>
                    <th>KECAMATAN</th>
                    <th>DESA</th>
                    <th>RT/RW</th>
                    <th>ALAMAT</th>
                    <th>STATUS</th>
                  </tr>
                </tfoot> -->
                <tbody id="view-penduduk">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Exportable Table -->
  </div>
</section>

<div class="modal fade" id="modal-addPenduduk" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">Tambah Penduduk</h4>
      </div>
      <div class="modal-body">
        <form id="form-addPenduduk" class="form_advanced_validation" method="POST">
          <div class="form-group">
            <label>NIK</label>
            <div class="form-line">
              <input type="text" class="form-control" name="nik" maxlength="16" pattern="[0-9]{13,16}" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>NO KK</label>
            <div class="form-line">
              <input type="text" class="form-control" name="no_kk" maxlength="16" pattern="[0-9]{13,16}" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>NAMA LENGKAP</label>
            <div class="form-line">
              <input type="text" class="form-control" name="nama_lengkap" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>TEMPAT LAHIR</label>
            <div class="form-line">
              <input type="text" class="form-control" name="tempat_lahir" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>TANGGAL LAHIR</label>
            <div class="form-line">
              <input type="date" class="form-control" name="tanggal_lahir" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>JENIS KELAMIN</label>
            <div class="form-line">
              <select name="jenis_kelamin" class="form-control">
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>KABUPATEN</label>
            <div class="form-line">
              <input type="text" class="form-control" name="kab" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>KECAMATAN</label>
            <div class="form-line">
              <input type="text" class="form-control" name="kec" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>DESA</label>
            <div class="form-line">
              <input type="text" class="form-control" name="desa" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">

            <label>RT / RW</label>
            <div class="row">
              <div class="col-md-6">
                <div class="form-line">
                  <input type="text" class="form-control" placeholder="RT" name="rt" required="" aria-required="true" aria-invalid="false">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-line">
                  <input type="text" class="form-control" placeholder="RW" name="rw" required="" aria-required="true" aria-invalid="false">
                </div>
              </div>
            </div>

          </div>


          <div class="form-group">
            <label>ALAMAT</label>
            <div class="form-line">
              <textarea class="form-control no-resize" cols="10" rows="5" name="alamat"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label>STATUS</label>
            <div class="form-line">
              <select name="status" class="form-control">
                <option value="1">Aktif</option>
                <option value="2">Meninggal</option>
                <option value="3">Pindah</option>
                <option value="4">Ganda</option>
              </select>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form-addPenduduk" class="btn btn-link waves-effect">SAVE</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-deletePenduduk" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">Tambah Penduduk</h4>
      </div>
      <div class="modal-body">
        <form id="form-deletePenduduk" class="form_advanced_validation" method="POST">
           <input type="hidden" name="id_delete">
           <p>Anda Yakin Ingin Menghapus Data <span id="nama_lengkap_delete"></span></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form-deletePenduduk" class="btn waves-effect btn-danger">Hapus</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-updatePenduduk" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">Update Penduduk</h4>
      </div>
      <div class="modal-body">
        <form id="form-updatePenduduk" class="form_advanced_validation" method="POST">
          <input type="hidden" name="id_update">
          <div class="form-group">
            <label>NIK</label>
            <div class="form-line">
              <input type="text" class="form-control" name="nik_update" maxlength="16" pattern="[0-9]{13,16}" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>NO KK</label>
            <div class="form-line">
              <input type="text" class="form-control" name="no_kk_update" maxlength="16" pattern="[0-9]{13,16}" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>NAMA LENGKAP</label>
            <div class="form-line">
              <input type="text" class="form-control" name="nama_lengkap_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>TEMPAT LAHIR</label>
            <div class="form-line">
              <input type="text" class="form-control" name="tempat_lahir_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>TANGGAL LAHIR</label>
            <div class="form-line">
              <input type="date" class="form-control" name="tanggal_lahir_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>JENIS KELAMIN</label>
            <div class="form-line">
              <select name="jenis_kelamin_update" class="form-control">
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>KABUPATEN</label>
            <div class="form-line">
              <input type="text" class="form-control" name="kab_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>KECAMATAN</label>
            <div class="form-line">
              <input type="text" class="form-control" name="kec_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>DESA</label>
            <div class="form-line">
              <input type="text" class="form-control" name="desa_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">

            <label>RT / RW</label>
            <div class="row">
              <div class="col-md-6">
                <div class="form-line">
                  <input type="text" class="form-control" placeholder="RT" name="rt_update" required="" aria-required="true" aria-invalid="false">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-line">
                  <input type="text" class="form-control" placeholder="RW" name="rw_update" required="" aria-required="true" aria-invalid="false">
                </div>
              </div>
            </div>

          </div>

          <div class="form-group">
            <label>ALAMAT</label>
            <div class="form-line">
              <textarea class="form-control no-resize" cols="10" rows="5" name="alamat_update"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label>STATUS</label>
            <div class="form-line">
              <select name="status_update" class="form-control">
                <option value="1">Aktif</option>
                <option value="2">Meninggal</option>
                <option value="3">Pindah</option>
                <option value="4">Ganda</option>
              </select>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form-updatePenduduk" class="btn btn-link waves-effect">SAVE</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>