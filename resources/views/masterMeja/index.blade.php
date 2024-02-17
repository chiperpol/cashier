@extends('templates.default')

@section('head')
<link href="{{asset('cwtemplate')}}/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CW</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Meja</a></li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="mb-5">
                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addMeja">Tambah Meja</button>
            </div>
            @include('masterMeja.modal-add')

            <div class="filter cm-content-box box-primary">
                <div class="content-title">
                    <div class="cpa">
                        <i class="fa-solid fa-file-lines me-1"></i>List Meja
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
                                        <th class="text-black">Meja</th>
                                        <th class="text-black">Lantai</th>
                                        <th class="text-black">Status</th>
                                        <th class="text-black text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mejas as $meja)
                                    <tr id="index_{{ $meja->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $meja->namaMeja }}</td>
                                        <td>Lantai {{ $meja->lantai }}</td>
                                        @if($meja->status == 1)
                                            <td>
                                                <span class="badge badge-success light mb-1 mb-sm-0">Enable</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="badge badge-danger light mb-1 mb-sm-0">Disable</span>
                                            </td>
                                        @endif
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm content-icon" data-bs-toggle="modal" data-bs-target="#editMeja{{$meja->id}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            
                                            <form action="{{ route('mastermeja.delete', $meja->id) }}" method="POST" style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm content-icon btnHapus" data-nama-meja="{{ $meja->namaMeja }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @include('masterMeja.modal-edit')
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
</div>
@endsection

@section('script')
    <script src="{{asset('cwtemplate')}}/vendor/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $('.btnHapus').click(function(event) {
            var form =  $(this).closest("form");
            var namaMeja = $(this).data('nama-meja');

            event.preventDefault();
            swal.fire({
            title: 'Hapus meja ' + namaMeja + '?',
            text: "Meja " + namaMeja + " akan dihapus permanen!",
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
                'Meja ' + namaMeja + 'berhasil dihapus.',
                'success'
                )
            }
        });
        });
    </script>
@endsection