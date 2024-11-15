<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <x-nav />
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>My information</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <x-nav3 />
        </li>
        <li class="nav-heading">Pages</li>
        <x-nav2 />
    </ul>
</aside>
@push('styles')
@endpush
