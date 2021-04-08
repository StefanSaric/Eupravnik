<?php

namespace App\Http\Controllers\Admin;

use App\Council;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Offer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgramsController extends Controller
{
    public function index () {

        $programs = Maintenance::join('councils', 'councils.id', '=', 'maintenances.council_id')
            ->join('users', 'users.id', '=', 'maintenances.user_id')
            ->where('maintenances.user_id', '=' ,  Auth::user()->id)
            ->where('maintenances.type', '=', 'program')
            ->select('maintenances.id as id',
                    'maintenances.date as date',
                    'maintenances.group_id as group_id',
                    'maintenances.name as name',
                    'maintenances.reported_condition as reported_condition',
                    'maintenances.contractor as contractor',
                    'maintenances.priority as priority',
                    'maintenances.element_date as element_date',
                    'councils.name as council')
            ->get();
        //dd($programs);

        return view('admin.programs.allprograms', ['active' => 'allPrograms', 'programs' => $programs]);
    }

    public function grabOffers($programId) {
        
        $offers = Offer::join('partners', 'partners.id', '=', 'offers.partner_id')
                ->where('program_id', '=', $programId)
                ->select('offers.description as description',
                        'offers.price as price',
                        'offers.date as date',
                        'partners.name as partner_name')
                ->get();
        
        $html = '<div style="margin-left: 30px">';
        
        if (count($offers) > 0) {
            
            foreach ($offers as $offer) {
                $html = $html . __('Partner') . ': ' . $offer->partner_name . ' ' . __('Opis') . ': ' . __($offer->description) . ' ' . __('Datum') . ': ' . $offer->date . ' ' . __('Cena') . ': ' . $offer->price;
                
                $html = $html . '<br>';
            }
        } else {
            $html = $html . __('Nema ponuda') . '<br>';
        }
        $html = $html . '</div>';
        
        return compact('html');
    }

}
