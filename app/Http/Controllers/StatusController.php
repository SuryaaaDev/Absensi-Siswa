<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function statuses()
    {
        $statuses = Status::all();
        return view('admin.statuses', compact('statuses'));
    }

    public function addStatus(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string',
        ]);
        
        $name = Str::ucfirst($request->status_name);
        
        $status = new Status();
        $status->status_name = $name;
        $status->save();

        return back()->with('success', 'Status berhasil ditambahkan!');
    }
    
    public function editStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:20',
        ]);

        $name = Str::ucfirst($request->status_name);
    
        $class = Status::findOrFail($id);
        $class->update([
            'status_name' => $name,
        ]);
    
        return back()->with('success', 'Status berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = Status::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Status berhasil dihapus!');
    }
}
