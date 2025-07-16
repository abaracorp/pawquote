<div class="table-container">

            

            @php
                $headers = [
                    '<label class="check-container"><input type="checkbox" id="selectAllChecked"><span class="checkmark" ></span></label>',
                    'Title',
                    'URL Slug',
                    'Last Updated',
                    'Status',
                    'Actions',
                ];

               $rows = $blogs->map(function ($blog) {
                return [
                    '<label class="check-container">
                        <input type="checkbox" name="selected_ids[]" class="row-checkbox" id="blog-' . $blog->id . '" value="'.$blog->id.'">
                        <span class="checkmark" ></span>
                    </label>',
                    $blog->title ?? '',
                    $blog->slug ?? '',
                    optional($blog->updated_at)->format('m-d-Y') ?? '',
                    $blog->status_text ?? '',
                    '<div class="action">
                        <a href="' . route('admin.editBlog', ['blog' => $blog]) . '">' . editIcon() . '</a>
                        <a href="' . route('admin.deleteBlog', ['blog' => $blog]) . '">' . deleteIcon() . '</a>
                        <a href="' . route('frontend.blogDeatil',['slug' => $blog->slug]) . '">' . viewIcon() . '</a>
                    </div>',
                ];
            });

            @endphp

           

            <x-backend.table-component 
                :headers="$headers" 
                :rows="$rows" 
                :pagination="request()->has('search') ? $blogs->appends(request()->only('search'))->links() : $blogs->links()" 
            />



        </div>