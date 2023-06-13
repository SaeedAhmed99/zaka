<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FatwaRequest;
use App\Http\Requests;
use App\Models\WebmasterSection;
use Redirect;
use Auth;
class FatwaController extends Controller
{


      public function __construct()
    {
        $this->middleware('auth');
        if (!@Auth::user()->permissionsGroup->fatwa_request_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        //List of Fatwas
        
            $Fatwas = FatwaRequest::paginate(10);
       // dd($Fatwas);

        return view("dashboard.fatwas.list", compact("GeneralWebmasterSections", "Fatwas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Check Permissions
        if (!@Auth::user()->permissionsGroup->settings_status) {
            return redirect()->route('NoPermission');
        }
        
            $fatwa = FatwaRequest::find($id);
            $fatwa->delete();
            return Redirect::action('Dashboard\FatwaController@index')->with('doneMessage', __('backend.deleteDone'));
        }
}
