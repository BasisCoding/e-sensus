<section class="content">
  <div class="container-fluid">
    <div class="block-header float-left">
      <h2 class="">DATA PENDUDUK</h2>
      <div class="m-t-10">
        <button type="button" class="btn btn-default waves-effect col-lg-3 col-xs-12" data-toggle="modal" data-target="#modal-addPenduduk">Tambah Penduduk</button>
      </div>
    </div>
  </div>
  <!-- Basic Example -->
  <div class="d-flex m-t-10" id="view-penduduk">

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
            <label>ALAMAT</label>
            <div class="form-line">
              <textarea class="form-control no-resize" cols="10" rows="5" name="alamat"></textarea>
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
            <label>ALAMAT</label>
            <div class="form-line">
              <textarea class="form-control no-resize" cols="10" rows="5" name="alamat_update"></textarea>
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