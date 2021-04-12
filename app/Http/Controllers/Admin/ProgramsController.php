<?php

namespace App\Http\Controllers\Admin;

use App\Council;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Offer;
use App\User;
use App\Document;
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
                        'offers.id as id',
                        'partners.name as partner_name')
                ->get();
        
        $html = '<div style="margin-left: 30px; margin-right: 30px">';

        if (count($offers) > 0) {

            $html = $html . '<table id="datatable" class="display table-responsive nowrap striped">
                                <thead>
                                    <tr>
                                        <th>&nbsp;&nbsp;&nbsp;' . __("Ponude") . '</th>
                                        <th>' . __("Partner") . '</th>
                                        <th>' . __("Opis") . '</th>
                                        <th>' . __("Datum") . '</th>
                                        <th>' . __("Dokumenti") . '</th>
                                        <th>' . __("Cena") . '</th>
                                        <th>' . __("Akcije") . '</th>
                                    </tr>
                                </thead>
                                <tbody>';

            foreach ($offers as $num => $offer) {
                
                $documents = Document::where('offer_id', '=', $offer->id)->get();
                $num += 1;
                $html = $html . '<tr id="' . $offer->id . '" class="gradeX">
                                    <td>&nbsp;&nbsp;&nbsp;' . $num . '</td>
                                    <td>' . $offer->partner_name . '</td>
                                    <td>' . $offer->description . '</td>
                                    <td>' . date("d.m.Y", strtotime($offer->date)) . '</td>
                                    <td>';
                
                if($documents != null){
                    foreach ($documents as $num => $document){
                        $num += 1;
                        $html = $html . ' <a href="' . url($document->url) . '" target="_blank">&nbsp;'. $document->name .'&nbsp;</a>';
                    }
                }
                                    
                $html = $html    . '</td>
                                    <td>' . $offer->price . '</td>
                                    <td>
                                        <a href="' . url('/admin/offers/' . $offer->id . '/edit') . '" class="tooltipped waves-effect waves-light" data-position="top" data-tooltip="' . __('Izmeni ponudu') . '">
                                            <i class="material-icons">create</i></a>
                                        <a href="' . url('/admin/offers/' . $offer->id . '/delete') . '" class="tooltipped waves-effect waves-light" data-position="top" data-tooltip="' . __('Obriši ponudu') . '">
                                            <i class="material-icons">delete</i></a>
                                    </td>    
                                </tr>
                                <tr>
                                    <td colspan="7" class="odd"><div class="alert alert-dark" role="alert"></div>
                                    </td>
                                </tr>';
            }
            $html = $html . '</tbody></table><br>';
                  
        } else {
            //$html = $html . __('Nema ponuda') . '<br>';
            $html = $html . '<table id="datatable" class="display table-responsive nowrap striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center">' . __('Nema ponuda') . '</td>
                                    </tr>
                                </tbody>
                            </table><br>';
        }
        $html = $html . '</div>';
        
        return compact('html');
    }

}
//foreach ($offers as $offer) {
//                $html = $html . "<i class='material-icons prefix'>contacts</i>" . __('Partner') . ': ' . $offer->partner_name . ' ' 
//                                . "<i class='material-icons prefix'>event_note</i>" . __('Opis') . ': ' . $offer->description . ' ' 
//                                . "<i class='material-icons prefix'>event</i>" . __('Datum') . ': ' . $offer->date . ' ' 
//                                . "<i class='material-icons prefix'>attach_money</i>" . __('Cena') . ': ' . $offer->price;
//                
//                $html = $html . '<br>';
//            }