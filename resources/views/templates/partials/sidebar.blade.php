<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{ Str::startsWith(request()->url(), route('product.index')) ? 'mm-active' : '' }}">
                <a href="{{ route('product.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-heart"></i>
                    <span class="nav-text">Product</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->url(), route('order.index')) ? 'mm-active' : '' }}">
                <a href="{{ route('order.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Order</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->url(), route('masterkategoriproduk.index')) ? 'mm-active' : '' }}">
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Master</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Str::startsWith(request()->url(), route('masterkategoriproduk.index')) ? 'mm-active' : '' }}">
                        <a href="{{ route('masterkategoriproduk.index') }}" class="{{ Str::startsWith(request()->url(), route('masterkategoriproduk.index')) ? 'mm-active' : '' }}">Kategori Produk</a>
                    </li>
                    <li class="{{ Str::startsWith(request()->url(), route('mastermeja.index')) ? 'mm-active' : '' }}">
                        <a href="{{ route('mastermeja.index') }}" class="{{ Str::startsWith(request()->url(), route('mastermeja.index')) ? 'mm-active' : '' }}">Meja</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="add-menu-sidebar">
            <img src="{{asset('cwtemplate')}}/images/calendar.png" alt="" class="me-3">
            <a href="workoutplan.html" class="font-w500 mb-0">Get special discount NOW!</a>
        </div>
        <div class="copyright">
            <p><strong>CW Cafe Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by Rhmnhdyt</p>
        </div>
    </div>
</div>