<?php

namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Document;
use App\Firm;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Mail\AnnouncementsMail;
use App\Partner;
use App\Steward;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Council;
use App\CouncilAddress;
use App\Maintenance;
use App\Meeting;
use App\Announcement;
use App\Bill;
use App\Transaction;
use App\Space;
use Illuminate\Support\Facades\Validator;
use Auth;

class CouncilsController extends Controller
{
    /**
     * Shows table with all roles.
     *
     * @return view(admin/roles/allcouncils)
     */
    public function index()
    {
        if(Auth::user()->hasRole('Super Admin'))
            $councils = Council::join('users', 'councils.user_id', '=', 'users.id')
                        ->select(
                            'councils.id as id', 'councils.name as name', 'councils.city as city',
                            'councils.account as account', 'councils.maticni as maticni',
                            'councils.latitude as latitude', 'councils.longitude as longitude',
                            'councils.pib as pib', 'councils.phone as phone', 'users.name as user_name')
                        ->get();
        elseif(Auth::user()->hasRole('Firma'))
            $councils = Council::join('users as u1', 'councils.user_id', '=', 'u1.id')
                        ->leftjoin('users as u2', 'councils.reserve_id', '=', 'u2.id')
                        ->where('firm_id', '=', Auth::user()->id)
                        ->select(
                            'councils.id as id', 'councils.name as name', 'councils.city as city',
                            'councils.account as account', 'councils.maticni as maticni',
                            'councils.latitude as latitude', 'councils.longitude as longitude',
                            'councils.pib as pib', 'councils.phone as phone', 'u1.name as user_name',
                            'u2.name as reserve_name')
                        ->get();
        else
            $councils = Council::where('user_id', '=', Auth::user()->id)
                        ->orWhere('reserve_id', '=', Auth::user()->id)
                        ->join('users as u1', 'councils.user_id', '=', 'u1.id')
                        ->leftjoin('users as u2', 'councils.reserve_id', '=', 'u2.id')
                        ->select(
                            'councils.id as id', 'councils.name as name', 'councils.city as city',
                            'councils.account as account', 'councils.maticni as maticni',
                            'councils.latitude as latitude', 'councils.longitude as longitude',
                            'councils.pib as pib', 'councils.phone as phone', 'u1.name as user_name',
                            'u2.name as reserve_name')
                        ->get();

        return view('admin.councils.allcouncils', ['active' => 'allCouncils', 'councils' => $councils]);
    }

    public function show($id)
    {
        $council = Council::find($id);
        $addresses = CouncilAddress::where('council_id', '=', $id)->get();
        $contracts = Contract::where('council_id', '=', $id)
                     ->join('partners', 'partners.id', '=', 'contracts.partner_id' )
                     ->select('contracts.id as id',
                        'partners.name as partner',
                        'contracts.description as description',
                        'contracts.date_from as date_from',
                        'contracts.date_to as date_to',
                        'contracts.price as price',
                        'contracts.real_price as real_price',
                        'contracts.group as group'
                        )
                     ->get();
        $assignments = Maintenance::where('council_id', '=', $id)
                ->whereIn('type', ['assignment', 'intervention'])
                ->get();
        $meetings = Meeting::where('council_id', '=', $id)->get();
        $announcements = Announcement::where('council_id', '=', $id)->get();
        $bills = Bill::where('council_id', '=', $id)->get();
        $transactions = Transaction::where('council_id', '=', $id)->get();
        $spaces = Space::where('council_id', '=', $id)->get();
        $documents = Document::all();

        if(Session::has('acttab')){
            $acttab = Session::get('acttab');
            //dd($acttab);
        }
        else{
            $acttab = 'addresses';
        }

        return view('admin.councils.show', ['active' => 'allCouncils', 'acttab' => $acttab, 'council' => $council, 'addresses' => $addresses, 'contracts' => $contracts,'assignments' => $assignments,
            'meetings' => $meetings, 'announcements' => $announcements, 'bills' => $bills, 'transactions' => $transactions, 'spaces' => $spaces, 'documents' => $documents]);
    }

    /**
     * Shows form for inserting new council.
     *
     * @return view(admin/councils/create) w form(admin/forms/councils)
     */
    public function create ()
    {
        $stewards = Steward::where('firm_id', '=' ,Auth::user()->id)->get();

        return view('admin.councils.create', ['active' => 'addCouncil', 'stewards' => $stewards]);
    }

    /**
     * Stores data from councils form
     *
     * @param Request $request
     * @return redirect(admin/councils)
     */
    public function store(Request $request)
    {
        $council = Council::create([
            'firm_id' => Auth::user()->id, 'user_id' => $request->user_id, 'reserve_id' => $request->reserve_id,
            'name' => $request->name, 'short_name' => $request->short_name, 'city' => $request->city, 'area' => $request->area,
            'account' => $request->account, 'maticni' => $request->maticni, 'latitude' => $request->latitude,
            'longitude' => $request->longitude, 'pib' => $request->pib, 'phone' => $request->phone
        ]);
        $council->save();
        $address = CouncilAddress::create(['council_id' => $council->id,'address' => $request->ca_address, 'protection_status' => $request->protection_status,
            'area_size' => $request->area_size, 'built_year' => $request->built_year, 'short_name' => $request->ca_short_name, 'floors_number' => $request->floors_number,
            'elevators_number' => $request->elevators_number, 'roof_type' => $request->roof_type, 'lightning_rod' => $request->lightning_rod,
            'district_heating' => $request->district_heating, 'cellar' => $request->cellar, 'attic' => $request->attic, 'shelter' => $request->shelter,
            'energy_passport' => $request->energy_passport]);

        Session::flash('message', 'success_'.__('Skupština je dodata!'));

        return redirect('admin/councils');
    }

    /**
     * Shows form for editing council.
     *
     * @param int $council_id
     * @return view(admin/councils/edit) w form(admin/forms/councils)
     */
    public function edit($id)
    {
        $council = Council::find($id);

        $stewards = Steward::where('firm_id', '=' ,Auth::user()->id)->get();



        return view ('admin.councils.edit', ['active' => 'addCouncil', 'council' => $council, 'stewards' => $stewards]);
    }

    /**
     * Stores data from councils form
     *
     * @param Request $request
     * @return redirect(admin/councils)
     */
    public function update(Request $request)
    {
        $id = $request->council_id;
        $council = Council::find($id);
        $council->update($request->all());

        Session::flash('message', 'success_'.__('Skupština je uređena!'));

        return redirect('admin/councils');

    }

    /**
     * Deletes role =!!!! INACTIVE FUNCTION !!!!=
     *
     * @param int $council_id
     * @return redirect(admin/roles)
     */
    public function delete($id)
    {
        $council = Council::find($id);
        $council->delete();

        Session::flash('message', 'info_'.__('Skupština je obrisana!'));

        return redirect('admin/councils');
    }


    //----- ADDRESSES - ADRESE -----------------------------------------------//

    public function addAddress($id)
    {
        $council = Council::find($id);

        return view('admin.councils.addAddress', ['active' => 'allCouncils', 'council' => $council]);
    }

    public function storeAddress(Request $request)
    {
        $address = CouncilAddress::create($request->all());

        Session::flash('acttab', 'addresses');
        Session::flash('message', 'info_'.__('Adresa je dodata!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editAddress($id)
    {
        $address = CouncilAddress::find($id);
        $council = Council::find($address->council_id);

        return view('admin.councils.editAddress', ['active' => 'allCouncils', 'council' => $council, 'address' => $address]);
    }

    public function updateAddress(Request $request)
    {
        $address = CouncilAddress::find($request->council_address_id);
        $address->update($request->all());

        Session::flash('acttab', 'addresses');
        Session::flash('message', 'info_'.__('Adresa je uredjena!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteAddress($id)
    {
        $address = CouncilAddress::find($id);
        $council_id = $address->council_id;
        $alladdresses = CouncilAddress::where('council_id', '=', $address->council_id)->get();
        if(count($alladdresses) > 1){
            $address->delete();
            Session::flash('acttab', 'addresses');
            Session::flash('message', 'info_'.__('Adresa je obrisana!'));
        }
        else{
            Session::flash('acttab', 'addresses');
            Session::flash('message', 'info_'.__('Brisanje nije dozvoljeno, mora postojati bar jedna adresa!'));
        }

        return redirect('admin/councils/show/'.$council_id);
    }


    //----- MEETINGS - SEDNICE -----------------------------------------------//

    public function addMeeting($id)
    {
        $council = Council::find($id);

        return view('admin.councils.addMeeting', ['active' => 'allCouncils', 'council' => $council]);
    }

    public function storeMeeting(Request $request)
    {
        //dd($request);
        if($request->type == "0"){
            $is_announced = 0;
            $email_sent = 0;
            $type = 0;
        }
        else if($request->type == '1'){
            $is_announced = 1;
            $email_sent = 0;
            $type = 1;
        }
        else{
            $is_announced = 1;
            $email_sent = 1;
            $type = 2;
        }

        $meeting = Meeting::create([
            'council_id' => $request->council_id,
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'time' => $request->time,
            'is_announced' => $is_announced,
            'email_sent' => $email_sent
            ]);

        if($type > 0){
            $announce = Announcement::create([
                'council_id' => $request->council_id,
                'user_id' => Auth::user()->id,
                'date' => $request->date,
                'name' => 'Sednica skupštine '.date('d.m.Y.', strtotime($request->date)),
                'greeting' => 'Poštovane komšije,',
                'content' => 'dana '.date('d.m.Y.', strtotime($request->date)).' u '.$request->time.' će biti održana sednica skupštine stanara',
                'signature' => "Upravnik zgrade,\n".Auth::user()->name,
                'email_sent' => $email_sent
            ]);
        }
        if($type = 2) {
            $data = array(
                'name' => 'Sednica skupštine '.date('d.m.Y.', strtotime($request->date)),
                'date' => date('Y-m-d'),
                'greeting' => 'Poštovane komšije,',
                'content' => 'dana '.date('d.m.Y.', strtotime($request->date)).' u '.$request->time.' će biti održana sednica skupštine stanara',
                'signature' => "Upravnik zgrade,\n".Auth::user()->name,
            );

            $space = Space::where('council_id', '=', $request->council_id)->first();
            Mail::to($space->email)->send(new AnnouncementsMail($data));
        }

        Session::flash('acttab', 'meetings');
        Session::flash('message', 'info_'.__('Sastanak je dodat!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editMeeting($id)
    {
        $meeting = Meeting::find($id);
        $council = Council::find($meeting->council_id);

        return view('admin.councils.editMeeting', ['active' => 'allCouncils', 'council' => $council, 'meeting' => $meeting]);
    }

    public function updateMeeting(Request $request)
    {
        //dd($request);
        $meeting = Meeting::find($request->meeting_id);
        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->save();

        Session::flash('acttab', 'meetings');
        Session::flash('message', 'info_'.__('Sastanak je uredjen!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteMeeting($id)
    {
        $meeting = Meeting::find($id);
        $council_id = $meeting->council_id;
        $meeting->delete();
        Session::flash('acttab', 'meetings');
        Session::flash('message', 'info_'.__('Sastanak je obrisan!'));

        return redirect('admin/councils/show/'.$council_id);
    }


    //----- ANNOUNCEMENTS - OBAVESTENJA --------------------------------------//

    public function addAnnouncement($id)
    {
        $council = Council::find($id);

        return view('admin.councils.addAnnouncement', ['active' => 'allCouncils', 'council' => $council]);
    }

    public function storeAnnouncement(Request $request)
    {
        //dd($request);
        $announcement = Announcement::create([
            'council_id' => $request->council_id,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'date' => $request->date,
            'greeting' => $request->greeting,
            'content' => $request->content,
            'signature' => $request->signature,
            'email_sent' => 0
        ]);
        $data = array(
            'name' => $request->name,
            'date' => $request->date,
            'greeting' => $request->greeting,
            'content' => $request->content,
            'signature' => $request->signature,
        );

        $space = Space::where('council_id', '=', $request->council_id)->first();
        Mail::to($space->email)->send(new AnnouncementsMail($data));

        Session::flash('acttab', 'announcements');
        Session::flash('message', 'info_'.__('Obavestenje je dodato!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editAnnouncement($id)
    {
        $announcement = Announcement::find($id);
        $council = Council::find($announcement->council_id);

        return view('admin.councils.editAnnouncement', ['active' => 'allCouncils', 'council' => $council, 'announcement' => $announcement]);
    }

    public function updateAnnouncement(Request $request)
    {
        $announcement = Announcement::find($request->announcement_id);
        $announcement->update($request->all());

        Session::flash('acttab', 'announcements');
        Session::flash('message', 'info_'.__('Obavestenje je uredjeno!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::find($id);
        $council_id = $announcement->council_id;


        $documents = Document::where('type_id', '=' , $announcement->id)->get();

        if($documents != null) {
            foreach ($documents as $document) {
                File::delete(public_path('documents/' . $document->name));
                $document->delete();
            }
        }

        $announcement->delete();

        Session::flash('acttab', 'announcements');
        Session::flash('message', 'info_'.__('Obavestenje je obrisano!'));

        return redirect('admin/councils/show/'.$council_id);
    }

    public function announcementToPDF($id)
    {
        $announcement = Announcement::find($id);
        $compiled = view('admin/councils/announcementPDF')->with(['announcement'=> $announcement])->render();
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'orientation' => 'P',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 15,
            'margin_bottom' => 8,
            'margin_header' => 0,
            'margin_footer' => 0
        ]);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->WriteHTML($compiled);
        $mpdf->Output();
    }

    //----- BILLS - FAKTURISANJE ---------------------------------------------//

    public function addBill($id)
    {
        $council = Council::find($id);
        $partners = Partner::all();
        $spaces = Space::where('council_id', '=', $id)->get();

        return view('admin.councils.addBill', ['active' => 'allCouncils', 'council' => $council, 'partners' => $partners, 'spaces' => $spaces]);
    }

    public function storeBill(Request $request)
    {
        $bill = Bill::create([
            'council_id' => $request->council_id,
            'date' => $request->date,
            'owner' => $request->owner,
            'partner' => $request->partner,
            'amount' => $request->amount,
            'type' => $request->type,
            'state' => 'unpaied',
            'realised' => 0,
            'rest' => $request->amount
        ]);

        Session::flash('acttab', 'bills');
        Session::flash('message', 'info_'.__('Racun je dodat!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editBill($id)
    {
        $bill = Bill::find($id);
        $council = Council::find($bill->council_id);
        $partners = Partner::all();
        $spaces = Space::where('council_id','=',$bill->council_id)->get();

        return view('admin.councils.editBill', ['active' => 'allCouncils', 'council' => $council, 'bill' => $bill, 'partners' => $partners, 'spaces' => $spaces]);
    }

    public function updateBill(Request $request)
    {
        $bill = Bill::find($request->bill_id);
        $bill->update($request->all());

        Session::flash('acttab', 'meetings');
        Session::flash('message', 'info_'.__('Racun je uredjen!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteBill($id)
    {
        $bill = Bill::find($id);
        $council_id = $bill->council_id;
        $bill->delete();
        Session::flash('acttab', 'bills');
        Session::flash('message', 'info_'.__('Racun je obrisan!'));

        return redirect('admin/councils/show/'.$council_id);
    }

    public function oneBill($id)
    {
        $bill = Bill::find($id);

        return view('admin.councils.showBill', ['active' => 'allCouncils', 'bill' => $bill]);
    }

    public function monthlyBill ()
    {
        $date = Carbon::now();

        // uzimanje za koje skupstine su kreirani ugovori
        $councils = DB::table('contracts')->groupBy('council_id')->get('council_id');
        $partners = DB::table('contracts')->groupBy('partner_id')->get('partner_id');

        // svi ugovori toga meseca po skupstinama
        foreach($councils as $council) {
            $contracts = DB::table('contracts')
                ->where('contracts.council_id', '=', $council->council_id)
                ->join('partners', 'partners.id', '=', 'contracts.partner_id')
                ->where('date_from', '<=', Carbon::now()->subHour())
                ->where('date_to', '>=', Carbon::now()->subMonth())
                ->select('contracts.id as id',
                    'partners.name as partner',
                    'contracts.description as description',
                    'contracts.date_from as date_from',
                    'contracts.date_to as date_to',
                    'contracts.real_price as real_price',
                    'contracts.group as group'
                )
                ->get();

            $partner = "";
            $amount = 0;

            // ukupan iznos za sve ugovore svih stanara toga meseca
            foreach($contracts as $contract) {
                $partner .= $contract->partner.", \n";

                //računanje koliko meseci traje ugovor
                $to = Carbon::createFromFormat('Y-m-d', $contract->date_from);
                $from = Carbon::createFromFormat('Y-m-d',  $contract->date_to);
                $difference = $to->diffInMonths($from);
                if($difference == 0) {
                    $difference = 1;
                }
                $amount += $contract->real_price/$difference;
            }

            // svi stanari te skupstine
            $spaces = Space::where('council_id', '=', $council->council_id)->get();

            // za svakog stanara generisanje računa
            foreach($spaces as $space)
            $bill = Bill::create([
                'council_id' => $council->council_id,
                'owner' => $space->representative,
                'date' => $date,
                'partner' => $partner,
                'amount' => $amount/count($spaces),
                'type' => "mesečni",
                'state' => 'unpaied',
                'realised' => 0,
                'rest' => $amount/count($spaces),
            ]);
        }

        return redirect ('admin/councils');
    }

    //----- TRANSACTIONS - TRANSAKCIJE ---------------------------------------//

    public function addTransaction($id)
    {
        $council = Council::find($id);

        return view('admin.councils.addTransaction', ['active' => 'allCouncils', 'council' => $council]);
    }

    public function storeTransaction(Request $request)
    {
        $transaction = Transaction::create($request->all());

        Session::flash('acttab', 'transactions');
        Session::flash('message', 'info_'.__('Transfer je dodat!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editTransaction($id)
    {
        $transaction = Transaction::find($id);
        $council = Council::find($transaction->council_id);

        return view('admin.councils.editTransaction', ['active' => 'allCouncils', 'council' => $council, 'transaction' => $transaction]);
    }

    public function updateTransaction(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        $transaction->update($request->all());

        Session::flash('acttab', 'transactions');
        Session::flash('message', 'info_'.__('Transfer je uredjen!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteTransaction($id)
    {
        $transaction = Transaction::find($id);
        $council_id = $transaction->council_id;
        $transaction->delete();
        Session::flash('acttab', 'transactions');
        Session::flash('message', 'info_'.__('Transfer je obrisan!'));

        return redirect('admin/councils/show/'.$council_id);
    }


    //----- SPACES - PROSTORI ------------------------------------------------//

    public function addSpace($id)
    {
        $council = Council::find($id);
        $councilAddresses = CouncilAddress::where('council_id', '=', $id)->get();

        return view('admin.councils.addSpace', ['active' => 'allCouncils', 'council' => $council, 'council_addresses' => $councilAddresses]);
    }

    public function storeSpace(Request $request)
    {
        $space = Space::create([
            'council_address_id' => $request->council_address_id,
            'council_id' => $request->council_id,
            'representative' => $request->representative,
            'phone' => $request->phone,
            'email' => $request->email,
            'floor_number' => $request->floor_number,
            'apartment_number' => $request->apartment_number,
            'household_members_number' => $request->household_members_number,
            'reported_area_size' => $request->reported_area_size,
            'on_site_area_size' => $request->on_site_area_size,
            'type' => $request->type,
            'status' => $request->status
        ]);

        Session::flash('acttab', 'units');
        Session::flash('message', 'info_'.__('Prostor je dodat!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editSpace($id)
    {
        $space = Space::find($id);
        $council = Council::find($space->council_id);
        $councilAddresses = CouncilAddress::where('council_id', '=', $council->id)->get();

        return view('admin.councils.editSpace', ['active' => 'allCouncils', 'council' => $council, 'space' => $space, 'council_addresses' => $councilAddresses]);
    }

    public function updateSpace(Request $request)
    {
        $space = Space::find($request->space_id);
        $space->update($request->all());

        Session::flash('acttab', 'units');
        Session::flash('message', 'info_'.__('Prostor je uredjen!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteSpace($id)
    {
        $space = Space::find($id);
        $councilAddress = CouncilAddress::find($space->council_address_id);
        $council_id = $councilAddress->council_id;
        $space->delete();
        Session::flash('acttab', 'units');
        Session::flash('message', 'info_'.__('Prostor je obrisan!'));

        return redirect('admin/councils/show/'.$council_id);
    }

    public function oneSpace($id)
    {
        $space = Space::find($id);
        $council_address = CouncilAddress::find($space->council_address_id);
        //dd($council_address);

        return view('admin.councils.showSpace', ['active' => 'allCouncils', 'space' => $space, 'council_address' => $council_address]);
    }


    //----- CONTRACTS - UGOVORI ------------------------------------------------//


    public function addContract ($id) {

        $council = Council::find($id);
        $partners = Partner::all();


        return view('admin.councils.addContract', ['active' => 'allCouncils', 'council' => $council, 'partners' => $partners ]);
    }

    public function storeContract (Request $request) {

        $contract = Contract::create([
            'user_id' => Auth::user()->id,
            'council_id' => $request->council_id,
            'partner_id' => $request->partner_id,
            'description' => $request->description,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'price' => $request->price,
            'real_price' => $request->real_price,
            'group' => $request->group
        ]);

        Session::flash('message', 'info_'.__('Ugovor je dodat!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function editContract ($id) {

        $contract = Contract::find($id);
        $council = Council::find($contract->council_id);
        $partners = Partner::all();

        return view('admin.councils.editContract', ['active' => 'allCouncils', 'contract' => $contract, 'council' => $council, 'partners' => $partners]);
    }

    public function updateContract (Request $request) {

        $contract = Contract::find($request->contract_id);
        $contract->update($request->all());

        Session::flash('message', 'info_'.__('Ugovor je izmenjen!'));

        return redirect('admin/councils/show/'.$request->council_id);
    }

    public function deleteContract ($id) {

        $contract = Contract::find($id);
        $council_id = $contract->council_id;
        $contract->delete();

        Session::flash('message', 'info_'.__('Ugovor je obrisan!'));

        return redirect('admin/councils/show/'.$council_id);
    }

    public function getRealPrice ($council_id, $price)
    {
        $council = Council::find($council_id);
        $firm = Firm::where('user_id','=', $council->firm_id)->first();

        $real_price = $price*(1 + $firm->percentage/100);

        return $real_price;
    }
}
