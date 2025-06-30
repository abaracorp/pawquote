<table class="table" id="component-table">
    <thead class="table-head">
        <tr>
            @foreach($headers as $header)
                <th>{!! $header !!}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse($rows as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}">No Data Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

@if($pagination)
    <nav 
    {{ request()->has('search') ? 'id=paginationLinks' : '' }}
    aria-label="Page navigation example">
        <ul class="pagination custom-pagination">
            <div class="d-flex justify-content-center">
                {!! $pagination !!}
            </div>
        </ul>
    </nav>
@endif
