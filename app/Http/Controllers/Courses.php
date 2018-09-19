<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseListResource;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseCompleteRequest;
use App\Http\Requests\CourseToUserRequest;

use Illuminate\Support\Facades\Auth;

class Courses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CourseListResource::collection(Course::all());
    }

    public function indexFromUser()
    {
        if(Auth::check()){
            $user = Auth::user();
            return CourseListResource::collection($user->courses);  
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        // get post request data for title and article
        $data = $request->only(["title", "description", "price", "difficulty", "rating", "score"]);

        // create article with data and store in DB
        $course = Course::create($data);

        return new CourseResource($course);

    }

    public function storeToUser(CourseToUserRequest $request, Course $course)
    {
        
        // user model add the relationsip
        // course model add the relationship
        // user model add method to attach / save course
        // setCourse
        // $this->courses()->attach($course['id']);
        // get user instance from Auth
        // call the setCourse method, passing in the course instance / id
        // $user->courses
        if(Auth::check()){
            $user = Auth::user();
            $user->setCourse($course);
        }

        return new CourseResource($course);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {

        // get the request data
        $data = $request->only(["title", "description", "price", "difficulty", "rating", "score"]);

        // update the article
        $course->fill($data)->save();

        // return the updated version
        return new CourseResource($course);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function markComplete(CourseCompleteRequest $request, Course $course)
    {
        // get the request data
        $data = $request->only(["complete"]);

        // update the article
        $course->fill($data)->save();

        // return the updated version
        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

    // use a 204 code as there is no content in the response
    return response(null, 204);

    }
}
