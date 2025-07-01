<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FaqGuide;
use App\Services\FaqGuideService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FaqGuideController extends Controller
{


    protected $faqGuideService;

    public function __construct(FaqGuideService $faqGuideService)
    {

        $this->faqGuideService = $faqGuideService;
    }


    public function getFaqGuideListing($type)
    {

        $text = $this->getTypeText($type);

        $faqGuide = $this->faqGuideService->getAll(10, $this->getType($type));

        $count = $this->faqGuideService->getBlogCountsByStatus([
            'published' => 0,
            'draft' => 1,
        ], $this->getType($type));

        return view('backend.faq_guide.faq_and_guide_listing', compact('type', 'text', 'faqGuide', 'count'));
    }

    public function createNewFaqGuide($type)
    {

        $text = $this->getTypeText($type);

        return view('backend.faq_guide.create_new_faq_and_guide', compact('type', 'text'));
    }

    public function saveFaqGuideData(Request $request, $type)
    {

        
        try {
            $validated = $request->validate([
                'question_text' => 'required|string|max:255',
                'content'       => 'required|string',
                'status'        => 'nullable|in:0,1',
            ], [
                'question_text.required' => 'The question field is required.',
                'question_text.string'   => 'The question must be a valid text.',
                'question_text.max'      => 'The question may not be greater than 255 characters.',

                'content.required'       => 'The answer is required.',
                'content.string'         => 'The answer must be valid text.',
            ]);


            $this->faqGuideService->store($validated, $this->getType($type));

            return redirect()->route('admin.faqGuide', ['type' => $type])->with('success', $this->getTypeText($type) . ' created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

     public function editFaqGuide($type,FaqGuide $faqguide)
    {

        $text = $this->getTypeText($type);

        return view('backend.faq_guide.edit_faq_guide', ['faqGuide' => $faqguide , 'text' => $text  , 'type' => $type] );
    }

    public function updateFaqGuide(Request $request, $type, FaqGuide $faqguide)
    {

       $validated = $request->validate([
                'question_text' => 'required|string|max:255',
                'content'       => 'required|string',
                'status'        => 'nullable|in:0,1',
            ], [
                'question_text.required' => 'The question field is required.',
                'question_text.string'   => 'The question must be a valid text.',
                'question_text.max'      => 'The question may not be greater than 255 characters.',

                'content.required'       => 'The answer is required.',
                'content.string'         => 'The answer must be valid text.',
            ]);

        $this->faqGuideService->update($faqguide, $validated);

        return redirect()->route('admin.faqGuide', ['type' => $type])->with('success', $this->getTypeText($type) . ' updated successfully.');

    }

    public function deleteFaqGuide($type,FaqGuide $faqguide )
    {
        $this->faqGuideService->delete($faqguide);

        return redirect()->route('admin.faqGuide', ['type' => $type])->with('success', $this->getTypeText($type) . ' deleted successfully.');
    }


        public function handleFaqGuideBulkAction(Request $request)
    {
        $action = $request->input('bulk_action');
        $selectedIds = $request->input('selected_ids', []);

        if (empty($selectedIds)) {
            return redirect()->back()->with('error', 'No blogs selected.');
        }

        switch ($action) {
            case 'delete':
                $this->faqGuideService->deleteMultipleFaqGuide($selectedIds);
                break;

            case 'publish':
                $this->faqGuideService->updateStatusMultiple($selectedIds, 0); 
                break;

            case 'draft':
                $this->faqGuideService->updateStatusMultiple($selectedIds, 1); 
                break;
        }

        return redirect()->back()->with('message', 'Bulk action applied successfully.');
    }

    public function searchFaqGuide(Request $request , $type)
    {

       

        $search = $request->input('search');
        $faqGuide = $this->faqGuideService->searchFaqGuides($this->getType($type),$search);

       
        $count = [
            'all' => $faqGuide->count(),
            'published' => $faqGuide->where('status', 0)->count(),
            'draft' => $faqGuide->where('status', 1)->count(),
        ];

        
        $countFilterPage = view('components.backend.status-filter', compact('count'))->render();

        $tableData = view('backend.faq_guide.faq_guide_table', compact('faqGuide','type'))->render();

        return response()->json([
            'countFilterPage' => $countFilterPage,
            'tableData' => $tableData,
        ]);

    }

    protected function getTypeText($type)
    {

        return $type == "faq" ? 'FAQ' : 'Guide';
    }

    protected function getType($type)
    {

        return $type == "faq" ? 0 : 1;
    }
}
