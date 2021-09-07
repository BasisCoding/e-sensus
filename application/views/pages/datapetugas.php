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
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#modal-addPetugas">Tambah</button>
              </li>
            </ul>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="table-petugas">
                <thead>
                  <tr>
                    <th>FOTO</th>
                    <th>USERNAME</th>
                    <th>NAMA LENGKAP</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>FOTO</th>
                    <th>USERNAME</th>
                    <th>NAMA LENGKAP</th>
                    <th>STATUS</th>
                  </tr>
                </tfoot>
                <tbody id="view-petugas">

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

<div class="modal fade" id="modal-addPetugas" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">Tambah Penduduk</h4>
      </div>
      <div class="modal-body">
        <form id="form-addPetugas" class="form_advanced_validation" method="POST">
          <div class="form-group">
            <label>USERNAME</label>
            <div class="form-line">
              <input type="text" class="form-control" name="username" required="">
            </div>
          </div>

          <div class="form-group">
            <label>PASSWORD</label>
            <div class="form-line">
              <input type="password" class="form-control" name="password" required="">
            </div>
          </div>

          <div class="form-group">
            <label>NAMA LENGKAP</label>
            <div class="form-line">
              <input type="text" class="form-control" name="nama_lengkap" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>FOTO</label>
            <div class="form-line">
              <input type="file" class="form-control" name="foto">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form-addPetugas" class="btn btn-link waves-effect">SAVE</button>
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

<div class="modal fade" id="modal-updatePetugas" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="largeModalLabel">Update Petugas</h4>
      </div>
      <div class="modal-body">
        <form id="form-updatePetugas" class="form_advanced_validation" method="POST">
          <input type="hidden" name="id_update">
          <div class="form-group">
            <label>USERNAME</label>
            <div class="form-line">
              <input type="text" class="form-control" name="username_update" required="">
            </div>
          </div>

          <div class="form-group">
            <label>PASSWORD</label>
            <div class="form-line">
              <input type="password" class="form-control" name="password_update" required="">
            </div>
          </div>

          <div class="form-group">
            <label>NAMA LENGKAP</label>
            <div class="form-line">
              <input type="text" class="form-control" name="nama_lengkap_update" required="" aria-required="true" aria-invalid="false">
            </div>
          </div>

          <div class="form-group">
            <label>FOTO</label>
            <div class="form-line">
              <input type="file" class="form-control" name="foto_update">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form-updatePetugas" class="btn btn-link waves-effect">SAVE</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>