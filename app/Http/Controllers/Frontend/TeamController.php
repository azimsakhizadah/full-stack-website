<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TeamController extends Controller
{

    public function TeamPage() {
        return view('home.team.team');
    }
      // to show all reviews
    public function AllTeam()
    {
        $team_members = Team::all();
        return view('admin.backend.team.all_team', compact('team_members'));
    }
    // End method

    // to add the review
    public function AddTeamForm()
    {
        return view('admin.backend.team.add_team');
    }
    // End method


    public function AddTeam(Request $request)
    {
        // Validate required fields including svg
       $validated = $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'bio' => 'required|string',
        'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
        'linkedin' => 'nullable|url',
        'github' => 'nullable|url',
        'instagram' => 'nullable|url',
    ]);

        $save_url = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $name_gen = hexdec(uniqid()) . '.' . $extension;

            // If the image is an SVG → move without processing
            if ($extension === 'svg') {
                $image->move(public_path('upload/team_members/'), $name_gen);
            } else {
                // Process normal images (jpg, png, webp, etc.)
                $manager = new ImageManager(new Driver());
                $img = $manager->read($image);
                $img->resize(306, 397)->save(public_path('upload/team_members/') . $name_gen);
            }

            $save_url = 'upload/team_members/' . $name_gen;
        }

        // Insert into DB
        Team::create([
            'name'        => $request->name,
            'position'  => $request->position,
            'bio' => $request->bio,
            'image'        => $save_url,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'instagram' => $request->instagram
        ]);

        return redirect()->route('all.team')->with([
            'message' => 'Team member added successfully',
            'alert'   => 'success'
        ]);
    }

    public function UpdateTeam(Request $request, $id)
    {
        $team_members = Team::findOrFail($id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $ext = strtolower($image->getClientOriginalExtension());

            // If SVG → just move file (no resize)
            if ($ext === 'svg') {
                $name_gen = hexdec(uniqid()) . '.svg';
                $image->move(public_path('upload/team_members/'), $name_gen);

                $team_members->image = 'upload/team_members/' . $name_gen;
            } else {
                // Normal image → resize with Intervention
                $manager = new ImageManager(new Driver());
                $name_gen = hexdec(uniqid()) . '.' . $ext;
                $img = $manager->read($image)->resize(306, 397);
                $img->save(public_path('upload/team_members/' . $name_gen));

                $team_members->image = 'upload/team_members/' . $name_gen;
            }
        }

        $team_members->name = $request->name;
        $team_members->position = $request->position;
        $team_members->bio = $request->bio;
        $team_members->image = $request->image;
        $team_members->linkedin = $request->linkedin;
        $team_members->github = $request->github;
        $team_members->instagram = $request->instagram;
        $team_members->save();

        return redirect()->route('all.team')->with([
            'message' => 'Team member updated successfully',
            'alert' => 'success'
        ]);
    }
    public function EditTeam($id)
    {
        $team_members = Team::find($id);
        return view('admin.backend.team.edit_team', compact('team_members'));
    }
    // end method

    public function DeleteTeam($id)
    {
        $team_members = Team::findOrFail($id);

        // Delete file safely
        $path = public_path('upload/team_members/' . $team_members->image);

        if ($team_members->image && file_exists($path)) {
            unlink($path);
        }

        $team_members->delete();

        return redirect()->back()->with('message', 'Team_members Deleted Successfully');
    }

    // team profile

    public function TeamProfile($id) {
        $team_profile = Team::FindOrFail($id);
        return view('home.team.team_profile', compact('team_profile'));
    }
}
