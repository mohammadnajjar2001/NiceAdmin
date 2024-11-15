
@foreach ($items as $item)
    <li class="nav-item">
        <a class="nav-link"
        style="{{ $item['route'] === $active ? 'color: #ff9922; font-weight: bold;' : '' }}">
        {{-- " href="{{ route($item['route']) }}"> --}}
        <i class="{{ $item['icon'] }}"></i>
            <span>{{ $item['title'] }}</span>
        </a>
    </li>
@endforeach
