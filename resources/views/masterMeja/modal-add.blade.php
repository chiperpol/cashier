<div class="modal fade" id="addMeja" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Meja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('mastermeja.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="">Nama Meja</label>
                            <input type="text" class="form-control input-default " id="namaMeja" name="namaMeja">
                        </div>

                        <div class="form-group">
                            <label for="">Lantai</label>
                            <select id="lantai" name="lantai" class="form-control input-default ">
                                <option value="1">Lantai 1</option>
                                <option value="2">Lantai 2</option>
                                <option value="3">Lantai 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select id="status" name="status" class="form-control input-default ">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>