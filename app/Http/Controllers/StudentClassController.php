<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function classes()
    {
        $classes = StudentClass::all();
        return view('admin.classes', compact('classes'));
    }

    public function addClass(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:10',
        ]);

        $name = Str::upper($request->class_name);

        $class = new StudentClass();
        $class->class_name = $name;
        $class->save();

        return back()->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function editClass(Request $request, $id)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:10',
        ]);

        $name = Str::upper($request->class_name);
    
        $class = StudentClass::findOrFail($id);
        $class->update([
            'class_name' => $name,
        ]);
    
        return back()->with('success', 'Kelas berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        $user = StudentClass::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Kelas berhasil dihapus!');
    }
}
