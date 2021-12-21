<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\comment;

class AdminhomeController extends Controller
{
    private $order;
    private $user;
    private $comments;
    public function __construct( order $order, User $user,comment $comment)
    {
        $this->order = $order;
        $this->comments=$comment;
        $this->user = $user;
    }
    public function index()
    {
       $getorder= $this->order->count();
       $order=$this->order->where('status','Đã hoàn thành')->count();
       $user =$this->user->count();
       $comment=$this->comments->get();
       $money=order::where('status','=','Đã hoàn thành')->sum('total');
   
       return view('Home' , compact('getorder','order','user','money','comment'));
    }
}
