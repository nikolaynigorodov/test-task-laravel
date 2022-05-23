<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\User;
use App\Rules\PhoneNumber;
use App\Services\ServicesImageResizeAndSave;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var ServicesImageResizeAndSave
     */
    private $imageResizeAndSave;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ServicesImageResizeAndSave $imageResizeAndSave)
    {
        $this->middleware('guest');
        $this->imageResizeAndSave = $imageResizeAndSave;
    }

    public function showRegistrationForm()
    {
        $position = Position::pluck('name', 'id');
        return view('auth.register', compact('position'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2', 'max:60'],
            'phone' => ['required', 'string', new PhoneNumber],
            'position_id' => ['required', 'exists:positions,id'],
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:5120'],
            'email' => ['required', 'string', 'email', 'min:2', 'max:100', 'unique:users'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position_id' => $data['position_id'],
            'photo' => $this->imageResizeAndSave->resizeSave($data['photo']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('main')
            ->with('success','User successfully registered!');
    }
}
