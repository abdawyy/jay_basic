<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="/"><img src="{{ asset('assets/img/logo.jpg') }} " alt="" style="width: 120px;"></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Category
                </a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                    <li><a class="dropdown-item" href="/product/list/category/{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
                </ul>
            </li>

            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Type
                </a> --}}
               <!-- Dropdown for Types -->
{{-- <ul class="dropdown-menu">
@foreach($types as $type)
<li><a class="dropdown-item" href="/show-type/{{ $type->id }}">{{ $type->name }}</a></li>
@endforeach
</ul> --}}

            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li> --}}
        </ul>
    </div>
</div>
