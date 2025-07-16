<div class="table-container">

            @php
                $headers = [
                    '<label class="check-container"><input type="checkbox" id="selectAllChecked"><span class="checkmark" ></span></label>',
                    'Question',
                    'Last Updated',
                    'Status',
                    'Actions',
                ];

               $rows = $faqGuide->map(function ($item) use ($type) {
                return [
                    '<label class="check-container">
                        <input type="checkbox" name="selected_ids[]" class="row-checkbox" id="item-' . $item->id . '" value="'.$item->id.'">
                        <span class="checkmark" ></span>
                    </label>',
                    $item->question_text ?? '',
                    optional($item->updated_at)->format('m-d-Y') ?? '',
                    $item->status_text ?? '',
                    '<div class="action">
                        <a href="' . route('admin.editFaqGuide', ['type' => $type,'faqguide' => $item]) . '">' . editIcon() . '</a>
                        <a href="' . route('admin.deleteFaqGuide', ['type' => $type,'faqguide' => $item]) . '">' . deleteIcon() . '</a>
                        <a href="' . route('frontend.'.$type) . '">' . viewIcon() . '</a>
                    </div>',
                ];
            });

            @endphp

           

            <x-backend.table-component 
                :headers="$headers" 
                :rows="$rows" 
                :pagination="request()->has('search') ? $faqGuide->appends(request()->only('search'))->links() : $faqGuide->links()" 
            />

        </div>