<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Value;
use App\Models\Slider;
use App\Models\Expert;
use App\Models\Service;
use App\Models\Customer;

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
        $users = User::all();
        $values = Value::all();
        $sliders = Slider::all();
        $experts = Expert::all();
        $services = Service::all();
        $customers = Customer::all();
        return view('admin.dashboard',Compact('users','values','sliders','experts','services', 'customers'));
    }
}
