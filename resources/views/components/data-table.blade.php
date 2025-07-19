<div class="container">
    <!-- Validation Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Search Form (Right-Aligned) -->
    <form action="{{ url()->current() }}" method="GET" class="mb-3 d-flex justify-content-end">
        <div class="input-group w-25">
            <input type="text" name="search" class="form-control mx-2" placeholder="Search..." value="{{ request('search') }}">
            <button class="btn btn-dark" type="submit">Search</button>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th scope="col">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @if($rows->isEmpty())
                    <tr>
                        <td colspan="{{ count($headers) }}" class="text-center">No results found.</td>
                    </tr>
                @else
                    @foreach ($rows as $row)
                        <tr>
                            @foreach ($headers as $header)
                                <td>{{ $row[$header] ?? '' }}

                                @if($header=='Action')
                              <a class="btn btn-danger" href="{{ $url }}/delete/{{ $row['ID'] }}">Delete</a>
                              <a class="btn btn-primary" href="{{ $url }}/edit/{{ $row['ID'] }}">View</a>

                            </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
