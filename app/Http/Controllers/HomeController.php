<?php

namespace App\Http\Controllers;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //para verificar el OTP
    public function verificar(Request $request)
    {
        $this->validate($request, [
            'otp' => 'required|numeric',
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        if ($user->otp == $request->otp) {
            $user->verificado = true;
            $user->save();
            return redirect('/home');
        } else {
            return back()->with('error', 'El codigo OTP incorrecto');
        }
    }

    //para reenviar el OTP
    public function reenviar()
    {
        $paraOtp = rand(100000, 999999);
        $user = User::where('id', auth()->user()->id)->first();
        $user->otp = $paraOtp;
        $user->save();


        //enviamos el SMS con el OTP
        $sid = env("TWILIO_SID");
        $token = env("TWILIO_TOKEN");
        $from = env("TWILIO_FROM");

        try{
            $client = new Client($sid, $token);

            $client->messages->create($user->telefono, [
                'from' => $from,
                'body' => "tu codigo OTP es: " . $paraOtp . ". No lo compartas con nadie."
            ]);
            return redirect('/home')->with('info', 'SMS enviado');
        } catch (\Throwable $th) {
            return back()->with('error', 'No se pudo enviar el SMS');
        }
    }
}
