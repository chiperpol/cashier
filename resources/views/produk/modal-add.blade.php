<div class="modal fade" id="addProduk" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control input-default " id="namaProduk" name="namaProduk">
                        </div>

                        <div class="form-group">
                            <label for="">Harga</label>
                            <div class="input-group">
                                <div class="input-group-text">Rp</div>
                                <input type="number" class="form-control" placeholder="10000" id="harga" name="harga">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="form-control input-default ">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
                            @endforeach
                            </select>                                                                                                                                                                                                                                                                               
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" class="form-control input-default " id="deskripsi" name="deskripsi">
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select id="status" name="status" class="form-control input-default ">
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pict">Gambar Produk</label>
                            <input class="form-control" type="file" id="formFile" id="pict" name="pict">
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