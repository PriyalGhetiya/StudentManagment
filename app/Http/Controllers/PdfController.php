<?php

namespace App\Http\Controllers;

use App\Marks;
use App\Student;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Excel;
use PDF;

class PdfController extends Controller
{
    public function student_pdf($id)
    {
        $user = Student::find($id);
        $marks = Marks::where('student_id',$id)->first();
        $total = $marks->gujarati + $marks->english + $marks->science + $marks->maths;
        $user['total'] = $total;
        $pdf = PDF::loadView('pdf.user_pdf',['data' => $user]);
        return $pdf->stream('user.pdf');
    }

    public function export_excel(){
         return Excel::download(new UsersExport, 'users.xlsx');
    }
}
