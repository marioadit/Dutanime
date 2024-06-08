<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    // setiap berhubungan dengan data panggil model
    public function home()
    {
        return view('home', ["key" => "Home"]);
    }
    public function masterData()
    {
        return view('masterData', ["key" => "Master Data"]);
    }
    public function about()
    {
        return view('about', ["key" => "About"]);
    }
    public function faq()
    {
        return view('faq', ["key" => "FAQ"]);
    }
    public function animes()
    {
        $animes = Animes::orderBy('id', 'desc')->get();
        return view('animes', ["key" => "Animes", "an" => $animes]);
    }
    public function addformanimes()
    {
        return view('add-form', ["key" => "Form-Add"]);
    }

    public function saveanimes(Request $request)
    {
        $file_name = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
        $path = $request->file('thumbnail')->storeAs('thumbnail', $file_name, "public");

        Animes::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'year' => $request->year,
            'thumbnail' => $path
        ]);

        return redirect('/animes')->with('alert', 'Data Storaged Successfully');

        // return $file_name;
        // return view('saveanimes',["key" => "Save"]);        
    }
    public function editformanimes($id)
    {
        $animes = Animes::find($id); //<--ORM object related mapping
        return view('edit-form', ["key" => "Form-Edit", "ani" => $animes]);
    }
    public function updateanimes($id, Request $request)
    {
        $animes = Animes::find($id); //<--ORM object related mapping

        $animes->title = $request->title;
        $animes->genre = $request->genre;
        $animes->year = $request->year;

        if ($request->thumbnail) {
            if ($animes->thumbnail) {
                Storage::disk('public')->delete($animes->thumbnail);
            }
            $file_name = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs('thumbnail', $file_name, "public");
            $animes->thumbnail = $path;
        }
        $animes->save();

        return redirect('/animes')->with('alert', 'Data Updated Successfully');
    }
    public function deleteanimes($id)
    {
        $animes = Animes::find($id); //<--ORM object related mapping

        if ($animes->thumbnail) {
            Storage::disk('public')->delete($animes->thumbnail);
        }

        $animes->delete();
        return redirect('/animes')->with('alert', 'Data Deleted Successfully');
    }

    public function login()
    {
        return view('login', ["key" => "Login"]);
    }

    public function edituserform()
    {
        return view("edituserform", ["key" => ""]);
    }
    public function updateuser(Request $request)
    {
        $user = Auth::user();

        // Memeriksa apakah password lama yang dimasukkan cocok dengan yang disimpan dalam database
        if (Hash::check($request->password_lama, $user->password)) {
            // Memastikan bahwa password baru dan konfirmasi password baru cocok
            if ($request->password_baru == $request->konfirmasi_password_baru) {
                // Memperbarui password pengguna
                $user->password = bcrypt($request->password_baru);
                $user->save();
                return redirect("/user")->with("alert", "Password Berhasil Diubah");
            } else {
                return redirect("/user")->with("alert", "Konfirmasi Password Baru Tidak Cocok");
            }
        } else {
            return redirect("/user")->with("alert", "Password Lama Salah");
        }
    }

}
