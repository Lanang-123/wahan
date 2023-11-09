{{-- <style>
    .nav-item-hold {
        padding: 20px 0 !important;
    }
</style> --}}
@php
    $helper = new \App\Helper\Helper;
@endphp
<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item">
                <a class="nav-item-hold" href="{{ route('dashboard') }}">
                    <i class="nav-icon i-Home1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            @if ($helper->canAccess('master-data'))
                <li class="nav-item {{ request()->is('starter/*') ? 'active' : '' }}" data-item="starter">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Big-Data"></i>
                        <span class="nav-text">Master Data</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif
            @if ($helper->canAccess('transaction'))
                <li class="nav-item " data-item="transaksi">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Dollar-Sign"></i>
                        <span class="nav-text">Transaksi</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif

            @if ($helper->canAccess('report'))
                <li class="nav-item {{ request()->is('starter/*') ? 'active' : '' }}" data-item="laporan">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text">Laporan</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif

            @if (\Auth::user()->role_id == 0)
                <li class="nav-item {{ request()->is('starter/*') ? 'active' : '' }}" data-item="settings">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Gear"></i>
                        <span class="nav-text">Pengaturan</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endif

            
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="starter">
            @if ($helper->canAccess('ticket-type-list'))
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='ticket-type-list' ? 'open' : '' }}" href="{{route('ticket-type-list')}}">
                        <i class="nav-icon i-Ticket"></i>
                        <span class="item-name">Jenis Tiket</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('ticket-list'))
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='ticket-list' ? 'open' : '' }}" href="{{route('ticket-list')}}">
                        <i class="nav-icon i-Ticket"></i>
                        <span class="item-name">Tiket</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('car-type-list'))
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='car-type-list' ? 'open' : '' }}" href="{{route('car-type-list')}}">
                        <i class="nav-icon i-Car"></i>
                        <span class="item-name">Jenis Kendaraan</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('ride-owner-list'))
                <li class="nav-item">
                    <a href="{{route('ride-owner-list')}}" class="{{ Route::currentRouteName()=='ride-owner-list' ? 'open' : '' }}">
                        <i class="nav-icon i-Business-Man"></i>
                        <span class="item-name">Pemilik Wahana</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('ride-list'))
                <li class="nav-item">
                    <a href="{{route('ride-list')}}" class="{{ Route::currentRouteName()=='ride-list' ? 'open' : '' }}">
                        <i class="nav-icon i-Landscape1"></i>
                        <span class="item-name">Wahana</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('guide-list'))
                <li class="nav-item">
                    <a href="{{route('guide-list')}}" class="{{ Route::currentRouteName()=='guide-list' ? 'open' : '' }}">
                        <i class="nav-icon i-Boy"></i>
                        <span class="item-name">Guide</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('voucher-list'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='voucher-list' ? 'open' : '' }}" href="{{route('voucher-list')}}">
                        <i class="nav-icon i-Tag-4"></i>
                        <span class="item-name">Voucher</span>
                    </a>
                </li>
            @endif
        </ul>

        <ul class="childNav" data-parent="transaksi">
            @if ($helper->canAccess('print-list'))
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='print-list' ? 'open' : '' }}" href="{{route('print-list')}}">
                        <i class="nav-icon i-Fax"></i>
                        <span class="item-name">Cetak Tiket/Voucher</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('handover-list'))
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='handover-list' ? 'open' : '' }}" href="{{route('handover-list')}}">
                        <i class="nav-icon i-Check"></i>
                        <span class="item-name">Serah Terima Tiket/Voucher</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('new-parking'))
                <li class="nav-item">
                    <a href="{{route('new-parking')}}" class="{{ Route::currentRouteName()=='new-parking' ? 'open' : '' }}">
                        <i class="nav-icon i-Receipt-3"></i>
                        <span class="item-name">Check in Parkir</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('new-order'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='new-order' ? 'open' : '' }}" href="{{route('new-order')}}">
                        <i class="nav-icon i-Money-2"></i>
                        <span class="item-name">Penjualan Tiket/Voucher</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('new-order-with-parking'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='new-order-with-parking' ? 'open' : '' }}" href="{{route('new-order-with-parking')}}">
                        <i class="nav-icon i-Money-2"></i>
                        <span class="item-name">Penjualan Tiket/Voucher dengan karcis parkir</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('new-object'))
                <li class="nav-item">
                    <a href="{{route('new-object')}}" class="{{ Route::currentRouteName()=='new-object' ? 'open' : '' }}">
                        <i class="nav-icon i-Receipt-3"></i>
                        <span class="item-name">Check in Objek</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('new-checkin-ride'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='new-checkin-ride' ? 'open' : '' }}" href="{{route('new-checkin-ride')}}">
                        <i class="nav-icon i-Receipt-3"></i>
                        <span class="item-name">Check in Wahana</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('transfer-fee-list'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='transfer-fee-list' ? 'open' : '' }}" href="{{route('transfer-fee-list')}}">
                        <i class="nav-icon i-Money-Bag"></i>
                        <span class="item-name">Transfer Fee Guide</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('order-list'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='order-list' ? 'open' : '' }}" href="{{route('order-list')}}">
                        <i class="nav-icon i-Fax"></i>
                        <span class="item-name">Batal/Cetak Penjualan</span>
                    </a>
                </li>
            @endif
            {{-- <span class="badge badge-round-danger sm">5</span> --}}

        </ul>
        <ul class="childNav" data-parent="laporan">
            @if ($helper->canAccess('report-tickets'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='report-tickets' ? 'open' : '' }}" href="{{route('report-tickets')}}">
                        <i class="nav-icon i-Ticket"></i>
                        <span class="item-name">Tiket</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-vouchers'))
                <li class="nav-item">
                    <a class="{{ Route::currentRouteName()=='report-vouchers' ? 'open' : '' }}" href="{{route('report-vouchers')}}">
                        <i class="nav-icon i-Tag-4"></i>
                        <span class="item-name">Voucher</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-object'))
                <li class="nav-item">
                    <a href="{{route('report-object')}}" class="{{ Route::currentRouteName()=='report-object' ? 'open' : '' }}">
                        <i class="nav-icon i-Network"></i>
                        <span class="item-name">Kunjungan Objek</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-rides'))
                <li class="nav-item">
                    <a href="{{route('report-rides')}}" class="{{ Route::currentRouteName()=='report-rides' ? 'open' : '' }}">
                        <i class="nav-icon i-Network"></i>
                        <span class="item-name">Kunjungan Wahana</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-parkings'))
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='report-parkings' ? 'open' : '' }}" href="{{route('report-parkings')}}">
                        <i class="nav-icon i-Car-3"></i>
                        <span class="item-name">Parkir</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-fee-transfers'))
                <li class="nav-item">
                    <a href="{{route('report-fee-transfers')}}" class="{{ Route::currentRouteName()=='report-fee-transfers' ? 'open' : '' }}">
                        <i class="nav-icon i-Money-Bag"></i>
                        <span class="item-name">Fee Guide</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-sales'))
                <li class="nav-item">
                    <a href="{{route('report-sales')}}" class="{{ Route::currentRouteName()=='report-sales' ? 'open' : '' }}">
                        <i class="nav-icon i-Money-2"></i>
                        <span class="item-name">Penjualan</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-cancel-order'))
                <li class="nav-item">
                    <a href="{{route('report-cancel-order')}}" class="{{ Route::currentRouteName()=='report-cancel-order' ? 'open' : '' }}">
                        <i class="nav-icon i-Close"></i>
                        <span class="item-name">Penjualan dibatalkan</span>
                    </a>
                </li>
            @endif
            @if ($helper->canAccess('report-checkout'))
                <li class="nav-item">
                    <a href="{{route('report-checkout')}}" class="{{ Route::currentRouteName()=='report-checkout' ? 'open' : '' }}">
                        <i class="nav-icon i-Money-2"></i>
                        <span class="item-name">Tiket/Voucher Keluar</span>
                    </a>
                </li>
            @endif
        </ul>
        <ul class="childNav" data-parent="settings">
            <li class="nav-item ">
                <a href="{{route('role-list')}}" class="{{ Route::currentRouteName()=='role-list' ? 'open' : '' }}">
                    <i class="nav-icon i-Medal-3"></i>
                    <span class="item-name">Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user-list')}}" class="{{ Route::currentRouteName()=='user-list' ? 'open' : '' }}">
                    <i class="nav-icon i-MaleFemale"></i>
                    <span class="item-name">Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('profil')}}" class="{{ Route::currentRouteName()=='profil' ? 'open' : '' }}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="item-name">Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('ticket-expiration')}}" class="{{ Route::currentRouteName()=='ticket-expiration' ? 'open' : '' }}">
                    <i class="nav-icon i-Ticket"></i>
                    <span class="item-name">Kadaluarsa Tiket</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->