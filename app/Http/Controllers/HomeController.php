<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\FormSubmission;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $video = Video::get()->last();
        $courses = Course::all();

        return view('index', compact('video', 'courses'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function courses()
    {
        $courses = Course::all();

        return view('courses', compact('courses'));
    }

    public function courseShow($id)
    {
        $course = Course::find($id);
        return view('course-details', compact('course'));
    }

    public function apply()
    {
        return view('apply');
    }

    public function formSubmit(Request $request)
    {
        $formType = $request->has('country') ? 'student' : 'instructor';

        if ($formType == 'student') {
            $rules = [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'universty' => 'required|string',
                'country' => 'required|string',
                'faculty' => 'required|string',
                'materials_names' => 'required|array|min:1',
                'courseType' => 'required|in:on',
                'materialType' => 'required|in:on',
                'year' => 'required|string',
                'age' => 'required|integer',
                'nationalty' => 'required|string',
                'gender' => 'required|in:on',
                'whats' => 'required|string',
                'telegram' => 'required|string',
            ];

            $messages = [
                'courseType.in' => 'The course type must be selected.',
                'materialType.in' => 'The material type must be selected.',
            ];

            // Validate the form data
            $validator = Validator::make($request->all(), $rules, $messages);
            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } elseif ($formType == 'instructor') {
            $rules = [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
            ];

            // Validate the form data
            $validator = Validator::make($request->all(), $rules);

            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        // Validate the form data
        $validatedData = $request->validate($rules);

        // Send email
        try {
            Mail::to('amr.hamouda99@gmail.com')->send(new FormSubmission($validatedData, $formType));
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            // Handle the exception, log it, or return an error response
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contactSubmit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Get the form data
        $formData = $request->only(['name', 'email', 'subject', 'message']);

        // Send email
        Mail::to('your@example.com')->send(new ContactMail($formData));

        // Optionally, you can add a success message here
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
