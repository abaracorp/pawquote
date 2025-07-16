<div class="table-container">

            

            @php
                $headers = [
                    '<label class="check-container"><input type="checkbox" id="selectAllChecked"><span class="checkmark" ></span></label>',
                    'Title',
                    'Label',
                    'Last Updated',
                    'Actions',
                ];

               $rows = $fans->map(function ($fan) {
                return [
                    '<label class="check-container">
                        <input type="checkbox" name="selected_ids[]" class="row-checkbox" id="fan-' . $fan->id . '" value="'.$fan->id.'">
                        <span class="checkmark" ></span>
                    </label>',
                    $fan->title ?? '',
                    $fan->label ?? '',
                    optional($fan->updated_at)->format('m-d-Y') ?? '',
                  
                    '<div class="action">
                        <a href="' . route('admin.editFan', ['fan' => $fan]) . '">' . editIcon() . '</a>
                        <a href="' . route('admin.deleteFan', ['fan' => $fan]) . '">' . deleteIcon() . '</a>
                        <a href="' . route('frontend.successStory', ['slug' => $fan->slug]) . '">' . viewIcon() . '</a>
                    </div>',
                ];
            });


            @endphp

           

            <x-backend.table-component 
                :headers="$headers" 
                :rows="$rows" 
                :pagination="request()->has('search') ? $fans->appends(request()->only('search'))->links() : $fans->links()" 
            />



        </div>