<?php

namespace App\Http\Controllers;

use App\Customer;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function loginRegsitration(){
        return view('/front.customer.login-registration');
    }

    public function customerRegistration(Request $request){
        $this->validate($request, [
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'user_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|max:10|min:6',
        ]);
        $customer = new Customer();
        $customer->full_name = $request->full_name;
        $customer->user_name = $request->user_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->full_name);

        return redirect('/');
    }

    public function customerLogin(Request $request){
        $customer = Customer::where('email', $request->email)->first();
        if($customer){
            if(password_verify($request->password, $customer->password)){
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->full_name);
                return redirect('/');
            }else{
                return redirect('login-registration')->with('message', 'Invalid Password');
            }
        }else{
            return redirect('login-registration')->with('message', 'Invalid Email');
        }
    }
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }
}
