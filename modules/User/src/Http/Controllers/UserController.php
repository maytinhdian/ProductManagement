<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user::lists');
    }
    public function detail($id)
    {
        return view('user::detail',compact('id'));
    }
    public function create(){
        $user = new User();
        $user->name = 'Le Thanh Nha';
        $user->email = 'tnhalk@maytinhdian.com';
        $user->save();
    }
}
