<x-admin.header />
<x-admin.aside />

    <x-admin.navbar />

    <main id="main">
        <div class="container-fluid">
            <div class="row pt-4">
                <div class="pagetitle">
                    <h1>Admin</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Admin</a></li>
                            <li class="breadcrumb-item active">list</li>
                        </ol>
                    </nav>
                </div><!-- End Breadcrumbs with a page title -->

<x-data-table :headers="$headers" :rows="$rows" :url="$url" />



   <!-- Pagination links -->
   <div class="mt-4">
    {{ $admins->links() }}  <!-- This will display the pagination links -->
</div>
<x-web.footer />


