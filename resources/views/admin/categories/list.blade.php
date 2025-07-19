<x-admin.header />
<x-admin.aside />

    <x-admin.navbar />


    <main id="main">
        <div class="container-fluid">
            <div class="row pt-4">
                <div class="pagetitle">
                    <h1>Categories</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Categories</a></li>
                            <li class="breadcrumb-item active">list</li>
                        </ol>
                    </nav>
                </div><!-- End Breadcrumbs with a page title -->

<x-data-table :headers="$headers" :rows="$rows" :url="$url"/>






<style>
.btn-danger{

    display: none;
}
</style>

  <!-- Pagination links -->
  <div class="mt-4">
    {{ $data->links() }}  <!-- This will display the pagination links -->
</div>
<x-web.footer />
