<form action="{{ route('masterkategori.update', $kategoriproduk->id) }}" method="post">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade" id="editKategori{{$kategoriproduk->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="kategori_id">

                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control input-default " id="namaKategori" name="namaKategori" value="{{ $kategoriproduk->namaKategori }}">
                        <!-- {!! Form::text('namaKategori', $kategoriproduk->namaKategori, array('class' => 'form-control input-default', 'required' => true)) !!} -->
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control input-default">
                            <option value="1" {{ $kategoriproduk->status == 1 ? 'selected' : '' }}>Enable</option>
                            <option value="0" {{ $kategoriproduk->status == 0 ? 'selected' : '' }}>Disable</option>
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