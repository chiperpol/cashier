<form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade" id="editProduk{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="produk_id">

                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" class="form-control input-default " id="namaProduk" name="namaProduk" value="{{ $product->namaProduk }}">
                    </div>
                    <div class="form-group">
                        <label for="namaProduk">Harga</label>
                        <input type="text" class="form-control input-default " id="harga" name="harga" value="{{ $product->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select id="kategori_id" name="kategori_id" class="form-control input-default ">
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $product->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->namaKategori }}</option>
                        @endforeach
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="namaProduk">Deskripsi</label>
                        <input type="text" class="form-control input-default " id="deskripsi" name="deskripsi" value="{{ $product->deskripsi }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control input-default ">
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Unavailable</option>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="pict">Gambar Produk</label>
                        <input class="form-control" type="file" id="formFile" id="pict" name="pict">
                        @if ($product->pict)
                            <img src="{{ asset('storage/products/' . $product->pict) }}" alt="Gambar Produk" style="max-width: 200px; margin-top: 10px;">
                        @else
                            <p>Tidak ada gambar yang terkait dengan produk ini.</p>
                        @endif
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