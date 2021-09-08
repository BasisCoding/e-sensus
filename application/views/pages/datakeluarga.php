 <section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              DATA KELUARGA
            </h2>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover" id="table-keluarga">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>NO KK</th>
                    <th>NAMA LENGKAP</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th>STATUS KELUARGA</th>
                    <th>VIEW</th>
                  </tr>
                </thead>
                
                <tbody id="view-keluarga">

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

<div class="modal fade" id="modal-penduduk" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">#<span id="title-kk"></span></h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>NIK</th>
              <th>NO KK</th>
              <th>NAMA LENGKAP</th>
              <th>TEMPAT LAHIR</th>
              <th>TANGGAL LAHIR</th>
              <th>JENIS KELAMIN</th>
              <th>STATUS KELUARGA</th>
            </thead>
            <tbody id="view-penduduk"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>