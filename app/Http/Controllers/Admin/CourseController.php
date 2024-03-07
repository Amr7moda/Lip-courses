<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Topic;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        try {

            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|string|max:255',
                'description' => 'required|string',
                'instructor_name' => 'required|string|max:255',
                'instructor_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'instructor_cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
                'topic_names' => 'required|array',
                'topic_names.*' => 'string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'video' => 'required|mimes:mp4,webm,ogg|max:20480',
            ]);

            // Create the instructor
            $instructor = Instructor::create([
                'name' => $validatedData['instructor_name'],
            ]);

            // Create the course
            $course = Course::create([
                'name' => $validatedData['name'],
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
                'instructor_id' => $instructor->id,
            ]);

            // Attach topics to the course
            $topics = [];
            foreach ($validatedData['topic_names'] as $topicName) {
                $topic = Topic::firstOrCreate(['name' => $topicName]);
                $topics[] = $topic->id;
            }
            $course->topics()->sync($topics);

            // Store image and video using Spatie Media Library
            $course->addMediaFromRequest('image')->toMediaCollection('images');
            $course->addMediaFromRequest('video')->toMediaCollection('videos');

            // Store instructor image using Spatie Media Library
            $instructor->addMediaFromRequest('instructor_image')->toMediaCollection('image');
            $instructor->addMediaFromRequest('instructor_cv')->toMediaCollection('cv');

            return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage())->withInput();
        }
    }


    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function destroy(Course $course)
    {
        // Delete related topics
        $course->topics()->detach();

        // Delete related instructor
        $instructor = $course->instructor;
        if ($instructor) {
            // Delete related instructor images
            $instructor->clearMediaCollection('image');

            // Delete related instructor CV file
            $instructor->clearMediaCollection('cv');

            // Delete related instructor
            $instructor->delete();
        }

        // Delete related images and videos
        $course->clearMediaCollection('images');
        $course->clearMediaCollection('videos');

        // Delete the course
        $course->delete();

        $courses = Course::all();
        return view('admin.courses.index', compact('courses'))->with('success', 'Course deleted successfully!');
    }
}
