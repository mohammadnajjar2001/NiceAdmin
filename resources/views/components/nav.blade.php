@foreach ($items as $item)
    <li class="nav-item">
        <a class="nav-link" href="{{ route($item['route']) }}"
            style="{{ $item['route'] === $active ? 'color: #ff9922; font-weight: bold;' : '' }}">
            <i class="{{ $item['icon'] }}"></i>
            <span>{{ $item['title'] }}</span>
        </a>
    </li>
@endforeach
