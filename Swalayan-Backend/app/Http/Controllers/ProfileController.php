<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Kasir;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::find(Auth()->user()->id_user);

        return view('content.pages.profile.index', ['profile' => $profile]);
    }

    public function update(Request $request, string $id)
    {
        $model = "";
        $userId = "";
        $idName = "";

        $role = Auth()->user()->role;

        if ($role === "Inventaris") {
            $inventaris = Inventaris::where('user_id', $id)->first();

            $model = "inventaris";
            $userId = $inventaris->id_inventaris;
            $idName = "id_inventaris";
        } elseif ($role === "Kasir") {
            $kasir = Kasir::where('user_id', $id)->first();

            $model = "kasir";
            $userId = $kasir->id_kasir;
            $idName = "id_kasir";
        }

        $validateData = $request->validate([
            'email' => 'required|email|max:30|unique:users,email,' . $id . ',id_user',
            'nama' => 'required|max:30',
            'nik' => 'required|numeric|max_digits:16|unique:' . $model . ',nik,' . $userId . ',' . $idName,
            'jenis_kelamin' => 'required|filled|max:10',
            'tempat_lahir' => 'required|max:15',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric|max_digits:13|unique:' . $model . ',no_hp,' . $userId . ',' . $idName,
            'alamat' => 'required|max:50'
        ]);

        $user = User::find($id);

        $user->email = $validateData['email'];
        $user->save();

        if ($role === "Inventaris") {
            $inventaris = Inventaris::where('user_id', $id)->first();
            $inventaris->nama = $validateData['nama'];
            $inventaris->nik = $validateData['nik'];
            $inventaris->jenis_kelamin = $validateData['jenis_kelamin'];
            $inventaris->tempat_lahir = $validateData['tempat_lahir'];
            $inventaris->tanggal_lahir = $validateData['tanggal_lahir'];
            $inventaris->no_hp = $validateData['no_hp'];
            $inventaris->alamat = $validateData['alamat'];
            $inventaris->save();
        } else {
            $kasir = Kasir::where('user_id', $id)->first();
            $kasir->nama = $validateData['nama'];
            $kasir->nik = $validateData['nik'];
            $kasir->jenis_kelamin = $validateData['jenis_kelamin'];
            $kasir->tempat_lahir = $validateData['tempat_lahir'];
            $kasir->tanggal_lahir = $validateData['tanggal_lahir'];
            $kasir->no_hp = $validateData['no_hp'];
            $kasir->alamat = $validateData['alamat'];
            $kasir->save();
        }

        return redirect('/profile')->with('pesan', 'Data updated successfully');
    }
}
