@extends('templates.default')

@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CW</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Order</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="mb-5">
                <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProduk">Tambah Order</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body py-0 px-3">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th class="align-middle">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="checkAll">
                                            <label class="form-check-label d-block" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Produk</th>
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">Meja</th>
                                    <th class="align-middle text-end">Status</th>
                                    <th class="align-middle text-end">Amount</th>
                                    <th class="align-middle text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody id="orders">
                                <tr class="btn-reveal-trigger">
                                    <td class="py-2">
                                        <div class="form-check custom-checkbox checkbox-primary">
                                            <input type="checkbox" class="form-check-input" id="checkbox">
                                            <label class="form-check-label" for="checkbox"></label>
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <strong class="text-primary">Arabica Coffee Milk (2)</strong>
                                    </td>
                                    <td class="py-2">
                                        20/04/2023
                                    </td>
                                    <td class="py-2">
                                        21
                                    </td>
                                    <td class="py-2 text-end">
                                        <span class="badge badge-success badge-sm light">Completed <span class="ms-1 fa fa-check"></span></span>
                                    </td>
                                    <td class="py-2 text-end">
                                        50K
                                    </td>
                                    <td class="py-2 text-end">
                                        <button type="submit" class="btn btn-danger btn-sm content-icon btnHapus" data-nama-order="Order">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('cwtemplate')}}/vendor/sweetalert2/sweetalert2.min.js"></script>
@endsection