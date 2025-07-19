 <!-- ======= Sidebar ======= -->

 <aside id="sidebar" class="sidebar pt-5">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.dashboard") }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Products-nav" data-bs-toggle="collapse" href="#">
                <i class='bx bx-package'></i></i><span>Products</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("products.list") }}">
                        <i class="bi bi-circle"></i><span>View all Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("products.edit") }}">
                        <i class="bi bi-circle"></i><span>Add Products</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Products Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Categories-nav" data-bs-toggle="collapse" href="#">
                <i class='bx bx-category'></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("categories.list") }}">
                        <i class="bi bi-circle"></i><span>View all Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("categories.edit") }}">
                        <i class="bi bi-circle"></i><span>Add Categories</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Categories Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Admins-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-chess-king"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Admins-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("admin.list") }}">
                        <i class="bi bi-circle"></i><span>View all Admins</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("admin.register") }}">
                        <i class="bi bi-circle"></i><span>Add Admins</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Admin Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cities-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-chess-king"></i><span>Cities</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cities-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("cities.list") }}">
                        <i class="bi bi-circle"></i><span>View all Cities</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("cities.edit") }}">
                        <i class="bi bi-circle"></i><span>Add Cities</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Cities Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Types-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-chess-king"></i><span>Types</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Types-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("type.list") }}">
                        <i class="bi bi-circle"></i><span>View all Types</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("type.edit") }}">
                        <i class="bi bi-circle"></i><span>Add Types</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Admin Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Discount-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-chess-king"></i><span>Discount Codes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Discount-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("discountCodes.list") }}">
                        <i class="bi bi-circle"></i><span>View all Discount Codes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("discountCodes.edit") }}">
                        <i class="bi bi-circle"></i><span>Add Discount Codes</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Admin Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route("order.list") }}">
                <i class='bx bx-file'></i>
                <span>Order list</span>
            </a>
        </li><!-- End Order list Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route("users.list") }}">
                <i class="bi bi-person"></i>
                <span>User List</span>
            </a>
        </li><!-- End User List Page Nav -->
                <li class="nav-item">

        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-primary">Logout</button>
</form>
        </li><!-- End User List Page Nav -->



        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav --> --}}

    </ul>

</aside><!-- End Sidebar-->
<style>

svg{
    display: none;
}

</style>
