<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index', compact('videos'));
    }

    public function attachVideo(Request $request, Video $video)
    {

        try {
            // Delete all existing videos
            $existingVideos = Video::all();
            foreach ($existingVideos as $existingVideo) {
                $existingVideo->clearMediaCollection('videos');
                $existingVideo->delete();
            }

            // Create a new video record in the videos table
            $newVideo = Video::create(['name' => $request->file('video')->getClientOriginalName()]);

            // Associate the media with the videos record
            $media = $newVideo->addMediaFromRequest('video')->toMediaCollection('videos');

            return redirect()->route('video')->with('success', 'Video uploaded successfully');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage())->withInput();
        }
    }


    public function detachVideo($id)
    {

        $video = Video::find($id);
        // Delete the associated media
        $video->getMedia('videos')->each(function ($media) {
            $media->delete();
        });

        $videos = Video::all();
        return view('admin.video.index', compact('videos'));
    }

    public function show(Video $video)
    {
        return view('admin.video.show', compact('video'));
    }
}
