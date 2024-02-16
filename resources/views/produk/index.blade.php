@extends('templates.default')

@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CW</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
        </ol>
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="mb-5">
                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProduk">Tambah Produk</button>
            </div>
            @include('produk.modal-add')
        </div>
    </div>

    <div class="row">
    @foreach ($products as $product)
        <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body product-grid-card">
                    <div class="text-center">
                        <div class="row align-items-baseline">
                            <div class="col text-start">
                                @if($product->status == 1)
                                    <span class="badge badge-sm badge-success light mb-1 mb-sm-0 fst-italic">Available</span>
                                @else
                                    <span class="badge badge-sm badge-danger light mb-1 mb-sm-0 fst-italic">Unavailable</span>
                                @endif
                            </div>
                            <div class="col text-end">
                                <div class="dropdown text-sans-serif show">
                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                        <div class="py-2">
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editProduk{{$product->id}}">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item text-danger btnHapus" data-nama-produk="{{ $product->namaProduk }}">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('produk.modal-edit')
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            @if($product->pict)
                            <img class="img-fluid rounded" src="{{ asset('storage/products/' . $product->pict) }}" alt="">
                            @else
                            <img class="img-fluid rounded" src="{{ asset('cwtemplate/images/no-img-avatar.png') }}" alt="Default Image">
                            @endif
                        </div>
                        <div class="new-arrival-content text-center mt-3">
                            <h4 class="mb-0">{{ $product->namaProduk }}</h4>
                            <span class="fst-italic  fs-12">
                                {{ $product->deskripsi }}
                            </span><br>
                            <span class="price">{{ number_format($product->harga / 1000, 0) }}K</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('cwtemplate')}}/vendor/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $('.btnHapus').click(function(event) {
            var form =  $(this).closest("form");
            var namaProduk = $(this).data('nama-produk');

            event.preventDefault();
            swal.fire({
            title: 'Hapus produk ' + namaProduk + '?',
            text: "Produk " + namaProduk + " akan dihapus permanen!",
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
                'Produk ' + namaProduk + 'berhasil dihapus.',
                'success'
                )
            }
        });
        });
    </script>
@endsection