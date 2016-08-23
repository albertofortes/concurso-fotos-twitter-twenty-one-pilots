<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Excel;
use Input;
use Redirect;
use Session;
use Validator;
use View;

class ContestantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');

        if( $filter) {
            $contestants = DB::table('contestants')->where('status', '=', $filter)->paginate(25);
        } else {
            //$contestants = Contestant::all();
            $contestants = DB::table('contestants')->paginate(25);
        }

        return View::make('contestants.index', array('contestants' => $contestants));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contestant = Contestant::find($id);

        $aStatus = [];
        if ( $contestant->status  == 'Preseleccionado' ) {
            $aStatus = array('box' => 'box-warning', 'label' => 'bg-yellow');
        } elseif ( $contestant->status  == 'Finalista' ) {
            $aStatus = array('box' => 'box-success', 'label' => 'bg-green');
        } else {
            $aStatus = array('box' => 'box-primary', 'label' => 'bg-primary');
        }

        return View::make('contestants.show', array('contestant' => $contestant, 'status' => $aStatus));
    }

    /**
     * Display a listing of all contest_image.
     *
     * @return \Illuminate\Http\Response
     */
    public function photos()
    {
        //$photos = DB::table('contestants')->select('id', 'contest_image')->get();
        $photos = DB::table('contestants')->select('id', 'contest_image')->paginate(15);

        return View::make('contestants.photos', array('photos' => $photos));
    }

    /**
     * Display a listing of preselected.
     *
     * @return \Illuminate\Http\Response
     */
    public function preselected()
    {
        //$photos = DB::table('contestants')->where('status', '=', 'Preseleccionado')->select('id', 'contest_image')->get();
        $photos = DB::table('contestants')->where('status', '=', 'Preseleccionado')->select('id', 'contest_image')->paginate(15);

        return View::make('contestants.preselected', array('photos' => $photos));
    }

    /**
     * Display a listing of finalists.
     *
     * @return \Illuminate\Http\Response
     */
    public function finalists()
    {
        //$photos = DB::table('contestants')->where('status', '=', 'Finalista')->select('id', 'contest_image')->get();
        $photos = DB::table('contestants')->where('status', '=', 'Finalista')->select('id', 'contest_image')->paginate(15);

        return View::make('contestants.finalists', array('photos' => $photos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('contestants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $messages = [
            'required'                  => 'El :attribute es obligatorio.',
            'email.valid'               => 'El campo email no es correcto.',
            'name.required'             => 'El nombre es obligatorio.',
            'surname.required'          => 'Los apellidos son obligatorios.',
            'phone.required'            => 'El teléfono es obligatorio.',
            'twitter_user.required'     => 'El usuario de twitter es obligatorio.',
            'ticket_image.required'     => 'La imagen con el ticket de compra es obligatoria.',
            'ticket_image.mimes'        => 'La imagen del ticket de compra sólo puede ser de tipo: jpg, jpeg, bmp, png o gif.',
            'contest_image.required'    => 'La imagen con el disco es obligatoria.',
            'contest_image.mimes'       => 'La imagen para el concurso sólo puede ser de tipo: jpg, jpeg, bmp, png o gif.',
        ];
        $rules = array(
            'name'              => 'required',
            'surname'           => 'required',
            'email'             => 'required|email',
            'phone'             => 'required',
            'twitter_user'      => 'required',
            'ticket_image'      => 'required|mimes:jpg,jpeg,bmp,png,gif,pdf',
            'contest_image'     => 'required|mimes:jpg,jpeg,bmp,png,gif',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/contestants/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $contestant = new Contestant;
            $contestant->name           = Input::get('name');
            $contestant->surname        = Input::get('surname');
            $contestant->email          = Input::get('email');
            $contestant->phone          = Input::get('phone');
            $contestant->twitter_user   = Input::get('twitter_user');
            $contestant->contest_image  = Input::get('contest_image');

            // upload images:
            $ticketImagePath = 'uploads/ticket/';
            $ticketImageExt = Input::file('ticket_image')->getClientOriginalExtension();
            $ticketImageFileName = rand(111,999) . '-' . Input::file('ticket_image')->getClientOriginalName();
            Input::file('ticket_image')->move($ticketImagePath, $ticketImageFileName);
            $contestant->ticket_image  = $ticketImagePath . $ticketImageFileName;

            $contestImagePath = 'uploads/ticket/';
            $contestImageExt = Input::file('contest_image')->getClientOriginalExtension();
            $contestImageFileName = rand(111,999) . '-' . Input::file('contest_image')->getClientOriginalName();
            Input::file('contest_image')->move($contestImagePath, $contestImageFileName);
            $contestant->contest_image  = $contestImagePath . $contestImageFileName;

            $contestant->save();

            // redirect
            Session::flash('message', 'Concursante creado correctamente!');
            return Redirect::to('admin/contestants/');
        }

    }

    /**
     * Change status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id, $status)
    {
        $contestant = Contestant::find($id);

        if( $status == 1 ) {
            $contestant->status = 'Preseleccionado';
        } elseif( $status == 2 ) {
            $contestant->status = 'Finalista';
        } else {
            $contestant->status = 'Sin determinar';
        }

        $contestant->save();

        // redirect
        Session::flash( 'message', 'El status del concursante ha sido actualizado.' );
        return Redirect::to('admin/contestants');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contestant = Contestant::find($id);

        return View::make( 'contestants.edit', array('contestant' => $contestant) );
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $messages = [
            'required'    => 'El :attribute es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.valid' => 'El campo email no es correcto.',
        ];
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/contestants/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $contestant = Contestant::find($id);
            $contestant->name           = Input::get('name');
            $contestant->surname        = Input::get('surname');
            $contestant->phone          = Input::get('phone');
            $contestant->twitter_user   = Input::get('twitter_user');
            $contestant->email          = Input::get('email');
            $contestant->status         = Input::get('status');

            $contestant->save();

            // redirect
            Session::flash( 'message', 'Concursante actualizado.' );
            return Redirect::to('admin/contestants/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contestant = Contestant::find($id);
        $contestant->delete();

        // redirect
        Session::flash('message', 'Concursante eliminado.');
        return Redirect::to('admin/contestants');
    }

    /**
     * Export all contestant table like CSV
     *
     * http://www.maatwebsite.nl/laravel-excel/docs/export
     * @return \Illuminate\Http\Response
     */
    public function exportcsv()
    {

        $database = DB::table('contestants')->select('name', 'surname', 'email', 'phone', 'twitter_user', 'created_at')->get();

        $database = json_decode(json_encode($database), true);

        Excel::create('export-21pilots', function ($excel) use ($database) {
            $excel->sheet('Contestants', function ($sheet) use ($database) {
                //$sheet->fromArray($database);
                // Won't auto generate heading columns:
                $sheet->fromArray($database, null, 'A1', false, false);
                // Add before first row:
                $sheet->prependRow(1, array(
                    'First Name', 'Last Name', 'Email Address', 'Phone Number', 'Twitter Handle', 'Date Subscribed'
                ));
            });
        })->export('csv');

        // redirect
        Session::flash('message', 'Los concursantes se han exportado con éxito.');
        return Redirect::to('admin/contestants');
    }
}
