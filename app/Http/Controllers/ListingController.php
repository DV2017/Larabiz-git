<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
        //show the create listings page
    return view('listings.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    $validated = request()->validate([
      'company' => ['required', 'min:3'],
      'address' => ['required'],
      'website' => ['required'],
      'email' => ['required', 'email'],
      'phone' => ['required'],
      'bio' => 'required'
    ]);

    // $validated = $request->validated();
    // return $validated;
    // return request()->all();
    // return auth()->id();
    // $listing = new Listing();
    // $listing->company = request()->company;
    // $listing->user_id = auth()->id();
    // $listing->company = request()->company;
    // $listing->address = request()->address;
    // $listing->website = request()->website;
    // $listing->email = request()->email;
    // $listing->phone = request()->phone;
    // $listing->bio = request()->bio;
    // $listing->save();

    // Listing::create([
    //   'user_id' => auth()->id(),
    //   'company' => $validated['company'],
    //   'address' => $validated['address'],
    //   'website' => $validated['website'],
    //   'email' => $validated['email'],
    //   'phone' => $validated['phone'],
    //   'bio' => $validated['bio']
    // ]);


    $validated['user_id'] = auth()->id();
    Listing::create($validated);

    //or 
    //Listing::create($validated + ['user_id' => auth()->user()->id] )

    /*
     * Note: handle exception thrown for user_id (hidden property)
     * Exception: Add [user_id] to fillable property to allow mass assignment on [App\Listing].
     * Exception: SQLSTATE[HY000]: General error: 1364 Field 'company' doesn't have a default value (SQL: insert    * into `listings` (`user_id`, `updated_at`, `created_at`) values (1, 2019-01-04 10:09:14, 2019-01-04 10:09:14))
     * Watch video: Laracasts: Cleaner Controllers and Mass Assignment Concerns
     */

    return redirect('/home')->with('success', 'Listing Added.');

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Listing  $listing
   * @return \Illuminate\Http\Response
   */
  public function show(Listing $listing)
  {
        //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Listing  $listing
   * @return \Illuminate\Http\Response
   */
  public function edit(Listing $listing)
  {
    // if ($listing->user_id !== auth()->id()) {
    //   abort(403);
    // }
    abort_if($listing->user_id !== auth()->id(), 403);
    // abort_unless(auth()->user()->owns($listing), 403);
    //abort_if(!auth()->user()->owns($listing), 403);

    return view('listings.edit')->with('listing', $listing);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Listing  $listing
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Listing $listing)
  {
    $validated = request()->validate([
      'company' => ['required', 'min:3'],
      'address' => ['required'],
      'website' => ['required'],
      'email' => ['required', 'email'],
      'phone' => ['required'],
      'bio' => 'required'
    ]);

    $validated['user_id'] = auth()->id();
    $listing->update($validated);
    // $listing->update([
    //   'user_id' => auth()->id(),
    //   'company' => $validated['company'],
    //   'address' => $validated['address'],
    //   'website' => $validated['website'],
    //   'email' => $validated['email'],
    //   'phone' => $validated['phone'],
    //   'bio' => $validated['bio']
    // ]);

    return redirect('/home')->with('success', "Listing updated.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Listing  $listing
   * @return \Illuminate\Http\Response
   */
  public function destroy(Listing $listing)
  {
    $listing->delete();
    return back()->with('success', 'Listing Deleted');
  }
}
