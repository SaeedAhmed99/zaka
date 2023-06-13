<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ZakatDeclaration;
use App\Http\Requests;
use App\Models\WebmasterSection;
use Redirect;
use Auth;
class ZakatDeclarationController extends Controller
{


      public function __construct()
    {
        $this->middleware('auth');
        if (!@Auth::user()->permissionsGroup->present_project_status) {
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
        //List of Projects
        
            $zakatDeclaration = ZakatDeclaration::paginate(10);
       
        return view("dashboard.zakat_declaration.list", compact("GeneralWebmasterSections", "zakatDeclaration"));
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
        
            $zakat_declaration = ZakatDeclaration::find($id);
            $zakat_declaration->delete();
            return Redirect::action('Dashboard\ZakatDeclarationController@index')->with('doneMessage', __('backend.deleteDone'));
        }


}
