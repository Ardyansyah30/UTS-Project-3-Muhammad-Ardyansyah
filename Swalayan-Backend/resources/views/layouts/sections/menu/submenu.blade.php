<ul class="menu-sub">
    @if (isset($menu))
        @foreach ($menu as $submenu)
            {{-- active menu method --}}
            @php
                $activeClass = null;
                $active = 'active open';
                $currentRouteName = Route::currentRouteName();

                if (Auth()->user()->role === 'Admin') {
                    if ($currentRouteName === 'users.show') {
                        $currentRouteName = 'users.index';
                    } elseif ($currentRouteName === 'users.edit') {
                        $currentRouteName = 'users.create';
                    }
                } elseif (Auth()->user()->role === 'Inventaris') {
                    if ($currentRouteName === 'supplier.show') {
                        $currentRouteName = 'supplier.index';
                    } elseif ($currentRouteName === 'supplier.edit') {
                        $currentRouteName = 'supplier.create';
                    } elseif ($currentRouteName === 'kategori.show') {
                        $currentRouteName = 'kategori.index';
                    } elseif ($currentRouteName === 'kategori.edit') {
                        $currentRouteName = 'kategori.create';
                    } elseif ($currentRouteName === 'produk.show') {
                        $currentRouteName = 'produk.index';
                    } elseif ($currentRouteName === 'produk.edit') {
                        $currentRouteName = 'produk.create';
                    }
                }

                if ($currentRouteName === $submenu->slug) {
                    $activeClass = 'active';
                } elseif (isset($submenu->submenu)) {
                    if (gettype($submenu->slug) === 'array') {
                        foreach ($submenu->slug as $slug) {
                            if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                $activeClass = $active;
                            }
                        }
                    } else {
                        if (
                            str_contains($currentRouteName, $submenu->slug) and
                            strpos($currentRouteName, $submenu->slug) === 0
                        ) {
                            $activeClass = $active;
                        }
                    }
                }
            @endphp

            <li class="menu-item {{ $activeClass }}">
                <a href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)' }}"
                    class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
                    @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif>
                    @if (isset($submenu->icon))
                        <i class="{{ $submenu->icon }}"></i>
                    @endif
                    <div>{{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                    @isset($submenu->badge)
                        <div class="badge bg-{{ $submenu->badge[0] }} rounded-pill ms-auto">{{ $submenu->badge[1] }}</div>
                    @endisset
                </a>

                {{-- submenu --}}
                @if (isset($submenu->submenu))
                    @include('layouts.sections.menu.submenu', ['menu' => $submenu->submenu])
                @endif
            </li>
        @endforeach
    @endif
</ul>
