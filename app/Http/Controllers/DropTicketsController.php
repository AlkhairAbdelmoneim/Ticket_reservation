<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travels;
use App\Models\Passenger;

// كود إلغاء التذكره
class DropTicketsController extends Controller
{
    public function index($passeng ,$travel)
    {
        $passenger =  Passenger::with('modelBus')->find($passeng);
        $travel = Travels::find($travel);

         $ticketsNo = $travel['tickets_no'];
         $chairCount = $passenger['chair_count'];

        $tickets = $ticketsNo + $chairCount;

        $travel->update([
            'tickets_no' => $tickets,
        ]);

        $passenger =  Passenger::with('modelBus')->find($passeng)->delete();

        session()->flash('success','تم إلغاء التذكره بنجاح');
   
        return redirect()->route('home');
    }
}
