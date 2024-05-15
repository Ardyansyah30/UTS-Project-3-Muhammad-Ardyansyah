<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Kasir;
use App\Models\OnSupply;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id_user', '!=', Auth()->user()->id_user)->get();
        return view('content.pages.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = "";

        if ($request->role === "Inventaris") {
            $model = "inventaris";
        } else {
            $model = "kasir";
        }

        $validateData = $request->validate([
            'email' => 'required|email|max:30|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|filled|max:15',
            'nama' => 'required|max:30',
            'nik' => 'required|numeric|max_digits:16|unique:' . $model . ',nik',
            'jenis_kelamin' => 'required|filled|max:10',
            'tempat_lahir' => 'required|max:15',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric|max_digits:13|unique:' . $model . ',nik',
            'alamat' => 'required|max:50'
        ]);

        $validateData['password'] = Hash::make($request->password);

        $user = new User();
        $user->email = $validateData['email'];
        $user->password = $validateData['password'];
        $user->role = $validateData['role'];
        $user->save();

        $user = User::where('email', $validateData['email'])->first();

        if ($validateData['role'] === "Inventaris") {
            $inventaris = new Inventaris();
            $inventaris->nama = $validateData['nama'];
            $inventaris->nik = $validateData['nik'];
            $inventaris->jenis_kelamin = $validateData['jenis_kelamin'];
            $inventaris->tempat_lahir = $validateData['tempat_lahir'];
            $inventaris->tanggal_lahir = $validateData['tanggal_lahir'];
            $inventaris->no_hp = $validateData['no_hp'];
            $inventaris->alamat = $validateData['alamat'];
            $inventaris->user_id = $user->id_user;
            $inventaris->save();
        } else {
            $kasir = new Kasir();
            $kasir->nama = $validateData['nama'];
            $kasir->nik = $validateData['nik'];
            $kasir->jenis_kelamin = $validateData['jenis_kelamin'];
            $kasir->tempat_lahir = $validateData['tempat_lahir'];
            $kasir->tanggal_lahir = $validateData['tanggal_lahir'];
            $kasir->no_hp = $validateData['no_hp'];
            $kasir->alamat = $validateData['alamat'];
            $kasir->user_id = $user->id_user;
            $kasir->save();
        }

        return redirect('/users')->with('pesan', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('content.pages.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('content.pages.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = "";
        $userId = "";
        $idName = "";

        if ($request->role === "Inventaris") {
            $inventaris = Inventaris::where('user_id', $id)->first();

            if (!$inventaris) {
                return redirect('/users/' . $id . '/edit')->with('pesan', 'Jika ingin mengganti role, maka hapus user ini terlebih dahulu');
            }

            $model = "inventaris";
            $userId = $inventaris->id_inventaris;
            $idName = "id_inventaris";
        } elseif ($request->role === "Kasir") {
            $kasir = Kasir::where('user_id', $id)->first();

            if (!$kasir) {
                return redirect('/users/' . $id . '/edit')->with('pesan', 'Jika ingin mengganti role, maka hapus user ini terlebih dahulu');
            }

            $model = "kasir";
            $userId = $kasir->id_kasir;
            $idName = "id_kasir";
        } else {
            $request->validate(['role' => 'required|filled|max:15']);
        }

        $validateData = $request->validate([
            'email' => 'required|email|max:30|unique:users,email,' . $id . ',id_user',
            'role' => 'required|filled|max:15',
            'nama' => 'required|max:30',
            'nik' => 'required|numeric|max_digits:16|unique:' . $model . ',nik,' . $userId . ',' . $idName,
            'jenis_kelamin' => 'required|filled|max:10',
            'tempat_lahir' => 'required|max:15',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric|max_digits:13|unique:' . $model . ',no_hp,' . $userId . ',' . $idName,
            'alamat' => 'required|max:50'
        ]);

        $user = User::find($id);

        if ($request->password) {
            $validatePassword = $request->validate([
                'password' => 'min:8'
            ]);
            $validatePassword['password'] = Hash::make($request->password);
            $user->password = $validatePassword['password'];
        }

        $user->email = $validateData['email'];
        $user->role = $validateData['role'];
        $user->save();

        if ($validateData['role'] === "Inventaris") {
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

        return redirect('/users')->with('pesan', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user->role === 'Inventaris') {
            $inventaris = Inventaris::where('user_id', $user->id_user)->first();

            OnSupply::where('inventaris_id', $inventaris['id_inventaris'])
                ->update(['inventaris_id' => null]);

            Inventaris::destroy($inventaris['id_inventaris']);
        } elseif ($user->role === 'Kasir') {
            $kasir = Kasir::where('user_id', $user->id_user)->first();

            Transaksi::where('kasir_id', $kasir['id_kasir'])
                ->update(['kasir_id' => null]);

            Kasir::destroy($kasir['id_kasir']);
        } elseif ($user->role === 'Pelanggan') {
            $pelanggan = Pelanggan::where('user_id', $user->id_user)->first();

            Transaksi::where('pelanggan_id', $pelanggan['id_pelanggan'])
                ->update(['pelanggan_id' => null]);

            Pelanggan::destroy($pelanggan['id_pelanggan']);
        }

        User::destroy($id);
        return redirect('/users')->with('pesan', 'Data deleted successfully');
    }
}
