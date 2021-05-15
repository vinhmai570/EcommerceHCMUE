<nav class="mega-menu mega-menu-v2">
    <!-- Brand and toggle get grouped for better mobile display -->
    <span class="icon-menu-header"></span>
    <ul class="nav navbar-nav" id="navbar">
        @foreach ($main_categories as $category)
        <li class="level1 dropdown">
            <a href="#" title="{{ $category->name }}"><span class="icon-mega icon-{{ $category->slug }}"></span></a>
            <div class="sub-menu dropdown-menu">
                <ul class="menu-level-1">
                    <li class="level2"><a href="#">Laptop</a>
                        <ul class="menu-level-2">
                            <li class="level3"><a href="#" title="Apple">Apple</a></li>
                        </ul>
                    </li>
                    <li class="level2"><a href="#">Accessories</a>
                        <ul class="menu-level-2">
                            <li class="level3"><a href="#" title="Submenu1">Submenu1</a></li>
                        </ul>
                    </li>
                    <li class="level2">
                        <img src="{{ asset($category->image) }}" alt="Sub-Menu" />
                    </li>
                </ul>
            </div>
            <!-- End Dropdow Menu -->
        </li>
        @endforeach
    </ul>
</nav>
<!-- End mega menu -->
