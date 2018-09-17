<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class Courses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get post request data for title and article
        $data = $request->only(["title", "description", "price", "difficulty", "rating", "score"]);

        // create article with data and store in DB
        $course = Course::create($data);

        // return the article along with a 201 status code
        return response($course, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find the current article
        $course = Course::find($id);

        // get the request data
        $data = $request->only(["title", "description", "price", "difficulty", "rating", "score"]);

        // update the article
        $course->fill($data)->save();

        // return the updated version
        return $course;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

    // use a 204 code as there is no content in the response
    return response(null, 204);

    }
}
