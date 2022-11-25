<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Contact;
use App\Models\Information;
use App\Models\Media;
use App\Models\Settings;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use View;

class AdminController extends Controller
{

    public function __construct()
    {
    $this->middleware('admin');
    }

    public function index()
    {
        $accounts = User::all()->count();
        return view('ap.home', [
            'accounts' => $accounts
        ]);
    }

    public function settings()
    {
        $config_settings = Settings::first();

        return view('ap.settings', [
            'config_settings' => $config_settings
        ]);
    }

    public function do_settings(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'web_name' => 'required',
            'web_image' => 'required|image',
            'email' => 'required|email',
            'logo' => 'required|image',
            'footer' => 'required|image',

        ]);

        $logoPath = $request->logo->storeAs('uploads', 'logo.png', "public");
        $logo = Image::make(public_path("storage/{$logoPath}"))->fit(220, 100);
        $logo->save();

        $footerPath = $request->footer->storeAs('uploads', 'footer_logo.png', "public");
        $footer = Image::make(public_path("storage/{$footerPath}"))->fit(130, 59);
        $footer->save();

        $webPath = $request->web_image->storeAs('uploads', 'fullweb.png', "public");
        $web = Image::make(public_path("storage/{$webPath}"))->fit(1920, 3538);
        $web->save();

        Settings::updateOrCreate([
            'id' => '1'
        ],
            [
                'title' => $request->title,
                'web_name' => $request->web_name,
                'web_image' => $webPath,
                'email' => $request->email,
                'logo' => $logoPath,
                'footer' => $footerPath,
            ]);

        return redirect()->back()->withSuccess('You have changed this settings successfully!');
    }

    public function team()
    {

        return view('ap.team');
    }

    public function do_team(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'picture' => 'required|image',

        ]);

        $imagePath = $request->picture->store('uploads', "public");
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(293, 309);
        $image->save();


        Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'picture' => $imagePath,
            ]);

        return redirect()->back()->withSuccess('You have added this person in team successfully!');
    }

    public function delete_team(Request $request)
    {
        $imagePaths = Team::where('name', $request->name)->pluck('picture');

        foreach ($imagePaths as $value)
        {
            $imagePath = public_path("/storage/".$value);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        Team::where('name', $request->name)->delete();
        return redirect()->back()->withSuccess('You have deleted this person successfully!');
    }

    public function addinfo()
    {
        $config_information = Information::first();

        return view('ap.information', [
            'config_information' => $config_information
        ]);
    }

    public function do_addinfo(Request $request)
    {

        $this->validate($request, [
            'information' => 'required',
        ]);


        Information::updateOrCreate([
            'id' => '1'
        ],
            [
                'information' => $request->information,
            ]);

        return redirect()->back()->withSuccess('You have added this information successfully!');
    }

    public function media()
    {

        return view('ap.media');
    }

    public function do_media(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:35',
            'description' => 'required|max:255',
            'image' => 'required|image',

        ]);

        $imagePath = $request->image->store('uploads', "public");
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 2200);
        $image->save();


        Media::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->back()->withSuccess('You have added this media successfully!');
    }

    public function delete_media(Request $request)
    {
        $imagePaths = Media::where('title', $request->title)->pluck('image');

        foreach ($imagePaths as $value)
        {
            $imagePath = public_path("/storage/".$value);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        Media::where('title', $request->title)->delete();
        return redirect()->back()->withSuccess('You have deleted this media successfully!');
    }

    public function inbox()
    {
        $contact = Contact::paginate(5);
        return view('ap.inbox', ['contact' => $contact]);
    }
    public function mail($id)
    {
        $mail = Contact::findOrFail($id);
        return view('ap.mail', ['mail' => $mail]);
    }
}
