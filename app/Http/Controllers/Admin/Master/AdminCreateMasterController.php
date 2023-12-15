<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\User;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Transter\TransferLog;

class AdminCreateMasterController extends Controller
{
     public function index()
    {
        $masterId = auth()->id(); // ID of the Admin
        $master = User::findOrFail($masterId);
        $users = $master->createdAgents;
        return view('admin.real_master.master_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.real_master.master_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|min:3|unique:users,name',
    'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone'],
    'password' => 'required|min:6|confirmed',
]);
        $this->authorize('createMaster', User::class);

        $user = User::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'password'=> Hash::make( $request->password ),
            //'role' => "Agent",
            'agent_id' => Auth::user()->id,
        ]);
        //$user->roles()->sync('3');
        $agentRole = Role::where('title', 'Master')->first();
        $user->roles()->sync($agentRole->id);
        return redirect(route('admin.real-live-master-list'))->with('success','Master has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_detail = User::find($id);
        return view('admin.real_master.master_show', compact('user_detail'));
    }

    public function transfer(string $id)
    {
        $transfer_user = User::find($id);
        return view('admin.real_master.master_transfer', compact('transfer_user'));
    }
    
    public function transferCashOut(string $id)
{
    // Assuming $id is the user ID
    $transfer_user = User::findOrFail($id);

    // Assuming you want to find transfer logs related to the user
    $transfer_logs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->get();
        $logs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->orderBy('created_at', 'desc')->first();

    return view('admin.real_master.master_cash_out', compact('transfer_user', 'transfer_logs', 'logs'));
}
public function MastertransferStore(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
        'cash_in' => 'required|numeric',
    ]);

    // Create a new TransferLog record
    $transfer_master = new TransferLog();
    $transfer_master->name = $request->name;
    $transfer_master->phone = $request->phone;
    $transfer_master->cash_in = $request->cash_in;
    $transfer_master->cash_balance = 0;
    $transfer_master->from_user_id = $request->from_user_id;
    $transfer_master->to_user_id = $request->to_user_id;
    $transfer_master->note = $request->note;
    $transfer_master->save();

    // Update user balance
    $user = User::find($request->to_user_id);
    $user->balance += $request->cash_in;
    $user->save();

    // Update cash_balance in TransferLog with the new user balance
    $transfer_master->cash_balance = $user->balance;
    $transfer_master->save();

    return redirect()->back()->with('success', 'Money fill request submitted successfully!');
}
//     public function MastertransferStore(Request $request)
// {
//     $request->validate([
//         'name' => 'required|min:3',
//         'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
//         'cash_in' => 'required|numeric',
//     ]);

//     // Create a new TransferLog record
//     $transfer_master = new TransferLog();
//     $transfer_master->name = $request->name;
//     $transfer_master->phone = $request->phone;
//     $transfer_master->cash_in = $request->cash_in;
//     $transfer_master->cash_balance = 0;
//     $transfer_master->from_user_id = $request->from_user_id;
//     $transfer_master->to_user_id = $request->to_user_id;
//     $transfer_master->note = $request->note;
//     $transfer_master->save();

//     $user = User::find($request->to_user_id);
//         $user->balance += $request->cash_in;
//         $user->save();
//     $master = TransferLog::find($request->to_user_id);
//     if ($master) {
//         $master->update(['cash_balance' => $master->cash_balance + $request->cash_in]);
        
//         return redirect()->back()->with('success', 'Money fill request submitted successfully!');
//     } else {
//         return redirect()->back()->with('error', 'TransferLog record not found.');
//     }
// }

    public function MasterCashOutStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'cash_out' => 'required|numeric',
        ]);
        // subtract from cash_in to cash_out
        $cash_in_data = $request->cash_in;
        $cash_out_data = $request->cash_out;
        $cash_out = $cash_in_data - $cash_out_data;
        $cash_out_master = new TransferLog();
        $cash_out_master->name = $request->name;
        $cash_out_master->phone = $request->phone;
        $cash_out_master->cash_out = $cash_out;
        $cash_out_master->from_user_id = $request->from_user_id;
        $cash_out_master->to_user_id = $request->to_user_id;
        $cash_out_master->note = $request->note;
        $cash_out_master->save();
        // user balance update
        $admin = User::find($request->from_user_id);
        $admin->balance += $request->cash_out;
        $admin->save();
        $master = User::find($request->to_user_id);
        $master->balance -= $request->cash_out;
        $master->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Money fill request submitted successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.real_master.master_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
    'name' => 'required|min:3|unique:users,name,'.$id,
    'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone,'.$id],
    'password' => 'nullable|min:6|confirmed',
]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        if($request->password){
            $user->password = Hash::make( $request->password );
        }
        $user->agent_id = Auth::user()->id;
        //$user->roles()->sync('3');
        $agentRole = Role::where('title', 'Master')->first();
        $user->roles()->sync($agentRole->id);
        $user->save();
        return redirect(route('admin.agent-list'))->with('success','Master has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.real-live-master-list'))->with('success','Master has been deleted successfully.');
    }
}