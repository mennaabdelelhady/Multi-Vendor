<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($items as $item)
            
        
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="{{ $item['icon'] }}"></i>
                <p>
                    {{ $item['text'] }}
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
        @endforeach
    </ul>
</nav>
<!-- /.sidebar-menu -->
