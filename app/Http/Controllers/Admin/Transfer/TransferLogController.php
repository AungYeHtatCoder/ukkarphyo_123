<?php

namespace App\Http\Controllers\Admin\Transfer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Transter\TransferLog;

class TransferLogController extends Controller
{
    public function AdminToMasterTransferLog()
    {
        // authorize 
        $this->authorize('viewAdminTransferLog', User::class);
        // Get all TransferLog records
        $id = auth()->id(); // ID of the Admin
        $transfer_user = User::findOrFail($id);

        $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->get();

        return view('admin.trans_log.admin_transfer_log', compact('transferLogs'));
        //return response()->json($transferLogs);
    }


    public function MasterToAgentTransferLog()
    {
        // authorize 
        $this->authorize('viewMasterTransferLog', User::class);
        // Get all TransferLog records
        $id = auth()->id(); // ID of the Admin
        $transfer_user = User::findOrFail($id);

        $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->get();

        return view('admin.trans_log.master_transfer_log', compact('transferLogs'));
        //return response()->json($transferLogs);
    }
    public function AgentToUserTransferLog()
    {
        // authorize 
        $this->authorize('viewAgentTransferLog', User::class);
        // Get all TransferLog records
        $id = auth()->id(); // ID of the Admin
        $transfer_user = User::findOrFail($id);

        $transferLogs = TransferLog::where('from_user_id', $id)
        ->orWhere('to_user_id', $id)
        ->get();

        return view('admin.trans_log.agent_transfer_log', compact('transferLogs'));
        //return response()->json($transferLogs);
    }
}