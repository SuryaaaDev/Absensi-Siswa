<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Models\StudentClass;
use App\Models\TmpRfid;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function students()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/kartu";
        $response = $client->request('GET', $url);
        $rfidJson = $response->getBody()->getContents();
        $rfidArray = json_decode($rfidJson, true)['data'];

        $classes = StudentClass::all();
        $students = User::where('is_admin', false)
                ->orderBy('absen', 'asc')
                ->get();

        return view('admin.students', compact('students', 'rfidArray', 'classes'));
    }


    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:50',
            'absen' => 'required|numeric|max:99',
            'name' => 'required|string|max:75',
            'class_name' => 'required',
            'class_name.*' => 'exists:student_classes,id',
            'email' => 'required|email',
            'telepon' => 'required|string|max:14',
            'password' => 'required|min:3',
        ]);

        $name = Str::title($request->name);

        $user = new User();
        $user->card_number = $request->card_number;
        $user->absen = $request->absen;
        $user->name = $name;
        $user->class_id = $request->class_name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->password = bcrypt($request->password);
        $user->save();

        $attendance = Attendance::create([
            'student_id' => $user->id,
        ]);

        TmpRfid::truncate();

        return redirect()->route('students')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:50',
            'absen' => 'required|numeric|max:99',
            'name' => 'required|string|max:75',
            'class_name' => 'required|exists:student_classes,id',
            'email' => 'required|email',
            'telepon' => 'required|string|max:14',
            'password' => 'nullable|min:3',
        ]);

        $name = Str::title($request->name);

        $user = User::findOrFail($id);
        $user->card_number = $request->card_number;
        $user->absen = $request->absen;
        $user->name = $name;
        $user->class_id = $request->class_name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('students')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('students')->with('success', 'Data siswa berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $students = User::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('name', 'like', "%{$query}%")
                    ->orWhere('absen', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->orWhere('telepon', 'like', "%{$query}%")
                    ->orWhereHas('class', function ($q) use ($query) {
                        $q->where('class_name', 'like', "%{$query}%");
                    });
            })
            ->with('class')
            ->paginate(10); 
        $classes = StudentClass::all();

        return view('admin.students', compact('students', 'classes'));
    }
}
