<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AuditLogsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AuditLog::with(['user'])->select(sprintf('%s.*', (new AuditLog)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'audit_log_show';
                $crudRoutePart = 'audit-logs';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('subject_id', function ($row) {
                return $row->subject_id ? $row->subject_id : "";
            });
            $table->editColumn('subject_type', function ($row) {
                return $row->subject_type ? $row->subject_type : "";
            });
            $table->editColumn('host', function ($row) {
                return $row->host ? $row->host : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.auditLogs.index');
    }

    public function show(AuditLog $auditLog)
    {
        return view('admin.auditLogs.show', compact('auditLog'));
    }
}
