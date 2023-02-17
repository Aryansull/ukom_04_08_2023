<!-- Modal -->
<div class="modal fade" id="createRuangan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createRuangan">Modal title</h1>
            </div>
            <div class="modal-body">
                <form action='{{ url('ruangan') }}' method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nama_ruangan" class="col-sm-2 col-form-label">Nama_ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_ruangan' id="nama_ruangan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto_ruangan" class="col-sm-2 col-form-label">foto_ruangan</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name='foto_ruangan' id="foto_ruangan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto_ruangan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>