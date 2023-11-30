<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return '<h1> User Management </h1>';
    }
    public function detail($id)
    {
        return '<h1> Detail ' . $id . '</h1> ';
    }
}
