<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fan;
use App\Services\FanService;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FanStoriesController extends Controller
{
    protected $mediaService;
    protected $fanService;

    public function __construct(MediaService $mediaService, FanService $fanService)
    {
        $this->mediaService = $mediaService;
        $this->fanService = $fanService;
    }

    public function getFanListing()
    {
        $fans = $this->fanService->getAll(10);

        // $count = $this->fanService->getBlogCountsByStatus([
        //     'published' => 0,
        //     'draft' => 1,
        // ]);

        return view('backend.fan_gallery.fan_listing', compact('fans'));
    }

    public function createFan()
    {

        // dd('hi');

        return view('backend.fan_gallery.create_fan');
    }


    public function saveFanData(Request $request)
    {

        try {
            $validated = $request->validate([
                'title'   => 'required|string|max:255',
                'content' => 'required|string',
                'status'  => 'nullable|in:0,1',
                'label'   => 'required|string|max:255',
               'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10MB
            ], [
                'image.required' => 'An image is required.',
                'image.image'    => 'The uploaded file must be an image.',
                'image.mimes'    => 'Only jpeg, png, jpg, gif, and svg file types are allowed.',
                'image.max'      => 'The image must not exceed 10MB in size.',
            ]);

            $this->fanService->store($validated);

            return redirect()->route('admin.fan')->with('success', 'Fan story created successfully.');
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


    public function show(Fan $fan)
    {
        return view('blogs.show', compact('fan'));
    }

    public function editFan(Fan $fan)
    {
        return view('backend.fan_gallery.edit_fan', compact('fan'));
    }

    public function updatefan(Request $request, Fan $fan)
    {

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'status'  => 'nullable|in:0,1',
            'label'   => 'required|string|max:255',
           'image'   => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10MB
            ], [
                'image.required' => 'An image is required.',
                'image.image'    => 'The uploaded file must be an image.',
                'image.mimes'    => 'Only jpeg, png, jpg, gif, and svg file types are allowed.',
                'image.max'      => 'The image must not exceed 10MB in size.',
            ]);

        $this->fanService->update($fan, $validated);
        return redirect()->route('admin.fan')->with('success', 'Fan story updated successfully.');
    }

    public function deleteFan(Fan $fan)
    {
        $this->fanService->delete($fan);
        return redirect()->route('admin.fan')->with('success', 'Fan Story deleted successfully.');
    }



    public function handleFanBulkAction(Request $request)
    {
        $action = $request->input('bulk_action');
        $selectedIds = $request->input('selected_ids', []);

        if (empty($selectedIds)) {
            return redirect()->back()->with('error', 'No fan story selected.');
        }

        switch ($action) {
            case 'delete':
                $this->fanService->deleteMultipleFans($selectedIds);
                break;

            case 'publish':
                $this->fanService->updateStatusMultiple($selectedIds, 0);
                break;

            case 'draft':
                $this->fanService->updateStatusMultiple($selectedIds, 1);
                break;
        }

        return redirect()->back()->with('success', 'Bulk action applied successfully.');
    }

    public function searchFan(Request $request)
    {
        $search = $request->input('search');
        $fans = $this->fanService->searchFans($search);


        // $count = [
        //     'all' => $fans->count(),
        //     'published' => $fans->where('status', 0)->count(),
        //     'draft' => $fans->where('status', 1)->count(),
        // ];


        // $countFilterPage = view('components.backend.status-filter', compact('count'))->render();

        $tableData = view('backend.fan_gallery.fan_table', compact('fans'))->render();

        return response()->json([
            // 'countFilterPage' => $countFilterPage,
            'tableData' => $tableData,
        ]);
    }
}
