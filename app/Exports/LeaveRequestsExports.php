<?php

namespace App\Exports;

use App\Leave;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeaveRequestsExports implements FromCollection
{
    public function collection()
    {
        $leaves = Leave::get();
        foreach( $leaves as $leave ){
            $leave['leave_type'] = $leave->leave_type()->first()->name;
            $leave['leave_status'] = $leave->leave_status()->first()->name;
            $leave['requestor'] = $leave->getOwner($leave->id)->fname . ' ' . $leave->getOwner($leave->id)->lname;
            unset($leave['leave_type_id']);
            unset($leave['leave_status_id']);
            unset($leave['created_at']);
            unset($leave['updated_at']);
            unset($leave['id']);
        }
        return new Collection([
            ['Date Applied', 'From', 'To', 'Address', 'Contact', 'Leave Type', 'Status', 'Requestor'],
            $leaves
        ]);

    }
}