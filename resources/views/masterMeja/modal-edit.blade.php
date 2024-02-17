<form action="{{ route('mastermeja.update', $meja->id) }}" method="post">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade" id="editMeja{{$meja->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Meja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="meja_id">

                    <div class="form-group">
                        <label for="namaKategori">Nama Meja</label>
                        <input type="text" class="form-control input-default " id="namaMeja" name="namaMeja" value="{{ $meja->namaMeja }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Lantai</label>
                        <select id="lantai" name="lantai" class="form-control input-default">
                            <option value="1" {{ $meja->lantai == 1 ? 'selected' : '' }}>Lantai 1</option>
                            <option value="2" {{ $meja->lantai == 2 ? 'selected' : '' }}>Lantai 2</option>
                            <option value="3" {{ $meja->lantai == 3 ? 'selected' : '' }}>Lantai 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control input-default">
                            <option value="1" {{ $meja->status == 1 ? 'selected' : '' }}>Enable</option>
                            <option value="0" {{ $meja->status == 0 ? 'selected' : '' }}>Disable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>