<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Brian2694\Toastr\Facades\Toastr;

class AdminComplaintController extends Controller
{
    /**
     * Complaint list (Admin panel)
     * AJAX + Pagination supported
     */
    public function index(Request $request)
    {
        // ✅ Pagination (fast load)
        $complaints = Complaint::latest()->paginate(10);

        // ✅ AJAX request হলে শুধু table অংশ return করবে
        if ($request->ajax()) {
            return view('backEnd.complaints.partials.table', compact('complaints'))->render();
        }

        // ✅ Normal page load
        return view('backEnd.complaints.index', compact('complaints'));
    }

    /**
     * Update complaint status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,resolved',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->status = $request->status;
        $complaint->save();

        Toastr::success('Complaint status updated successfully', 'Success');

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return back()->with('success', 'Complaint status updated successfully');
    }

    /**
     * Delete complaint
     */
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        // ✅ Image delete (public/complaints folder)
        if ($complaint->image) {
            $imagePath = public_path('complaints/' . $complaint->image);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
        }

        $complaint->delete();

        Toastr::success('Complaint deleted successfully', 'Success');

        return back()->with('success', 'Complaint deleted successfully');
    }
}
