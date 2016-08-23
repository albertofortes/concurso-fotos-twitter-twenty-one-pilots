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

class HomeController extends Controller
{
  /**
   * Display home
   *
   * @return \Illuminate\Http\Response
   */
  public function index($image = null)
  {
    return View::make('home', array('image' => $image));
  }

  /**
   * Create
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //dd($request);

    // validate
    // read more on validation at http://laravel.com/docs/validation
    $messages = [
        'required'                  => 'El :attribute es obligatorio.',
        'email.valid'               => 'El campo email no es correcto.',
        'accept.required'           => 'Debes aceptar las bases legales.',
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
        'accept'            => 'required',
        'name'              => 'required',
        'surname'           => 'required',
        'email'             => 'required|email',
        'phone'             => 'required',
        'twitter_user'      => 'required',
        'ticket_image'      => 'required|mimes:jpg,jpeg,bmp,png,gif,pdf',
        'contest_image'     => 'required|mimes:jpg,jpeg,bmp,png,gif',
    );
    $validator = Validator::make(Input::all(), $rules, $messages);


    if ($validator->fails()) {

      return Redirect::to('/#participa')->withErrors($validator)->withInput();

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
      // Twitter: https://dev.twitter.com/web/tweet-button
      Session::flash('message', '¡Concursante creado correctamente!');
      return View::make('home', array('image' => $contestant->contest_image));

    }

  }

}
