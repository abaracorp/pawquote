<div class="leftside">
    <ul>
        <li>
            <a href="javascript:void(0);" class="all f-20 c-dark f-w-5 freedoka">
                All
                <span class="f-18 c-light f-w-4 freedoka">({{ $count['all'] ?? 0 }})</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="before publish f-20 c-dark f-w-5 freedoka">
                Publish
                <span class="f-18 c-light f-w-4 freedoka">({{ $count['published'] ?? 0 }})</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="before draft f-20 c-dark f-w-5 freedoka">
                Draft
                <span class="f-18 c-light f-w-4 freedoka">({{ $count['draft'] ?? 0 }})</span>
            </a>
        </li>
        {{-- You can uncomment this for trash when needed --}}
        {{-- <li>
            <a href="javascript:void(0);" class="before trash f-20 c-dark f-w-5 freedoka">
                Trash
                <span class="f-18 c-light f-w-4 freedoka">(0)</span>
            </a>
        </li> --}}
    </ul>
</div>
