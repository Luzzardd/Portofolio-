<nav  class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"  style="background-color: #492b23">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.html">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Content</div>
            <a class="nav-link" href="{{route('slider')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-image" ></i></div>
                Slider
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Product
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('brand')}}">Brand</a>
                    <a class="nav-link" href="{{route('category')}}">Category</a>
                    <a class="nav-link" href="{{route('product')}}">product</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                User
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="{{route('role')}}">Role</a>
                    <a class="nav-link" href="{{route('user')}}">User</a>
                </nav>
            </div>

        </div>
    </div>
    <div  class="sb-sidenav-footer"  style="background-color: #331f19">
        <div class="small" >Logged in as:</div>
        {{Auth::user()->name }}
        ({{{Auth::user()->role->name}}})
    </div>
</nav>
