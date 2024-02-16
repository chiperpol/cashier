@extends('templates.default')

@section('head')
<link href="{{asset('cwtemplate')}}/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CW</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Kategori Produk</a></li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="mb-5">
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addKategori">Add Kategori</button>
            </div>

            <div class="filter cm-content-box box-primary">
                <div class="content-title">
                    <div class="cpa">
                        <i class="fa-solid fa-file-lines me-1"></i>Kategori List
                    </div>
                    <div class="tools">
                        <a href="javascript:void(0);" class="expand SlideToolHeader"><i class="fal fa-angle-down"></i></a>
                    </div>
                </div>
                <div class="cm-content-body form excerpt">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed flip-content">
                                <thead>
                                    <tr>
                                        <th class="text-black">No</th>
                                        <th class="text-black">Kategori</th>
                                        <th class="text-black">Status</th>
                                        <th class="text-black text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoriproduks as $kategoriproduk)
                                    <tr id="index_{{ $kategoriproduk->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategoriproduk->namaKategori }}</td>
                                        @if($kategoriproduk->status == 1)
                                            <td>
                                                <span class="badge badge-success light mb-1 mb-sm-0">Enable</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="badge badge-danger light mb-1 mb-sm-0">Disable</span>
                                            </td>
                                        @endif
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm content-icon" data-bs-toggle="modal" data-bs-target="#editKategori{{$kategoriproduk->id}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            
                                            <form action="{{ route('masterkategori.delete', $kategoriproduk->id) }}" method="POST" style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm content-icon btnHapus" data-nama-kategori="{{ $kategoriproduk->namaKategori }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @include('masterKategoriProduk.modal-edit')
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center width-defult justify-content-xl-between flex-wrap justify-content-center py-3">
                                <small class="mb-xl-0 mb-lg-1">Page 1 of 5, showing 2 records out of 8 total, starting on record 1, ending on 2</small>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination mb-2 mb-sm-0">
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="fa-solid fa-angle-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="fa-solid fa-angle-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('masterkategori.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" class="form-control input-default " id="namaKategori" name="namaKategori">
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

</div>
@endsection

@section('script')
    <script src="{{asset('cwtemplate')}}/vendor/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $('.btnHapus').click(function(event) {
            var form =  $(this).closest("form");
            var namaKategori = $(this).data('nama-kategori');

            event.preventDefault();
            swal.fire({
            title: 'Hapus kategori ' + namaKategori + '?',
            text: "Kategori " + namaKategori + " akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
            })
            .then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Berhasil!',
                'Kategori ' + namaKategori + 'berhasil dihapus.',
                'success'
                )
            }
        });
        });
    </script>
@endsection