<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    IntermentGuide
};
use Auth;
// use PDF;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function internmentGuidePdf(IntermentGuide $guide)
    {   
        $guide = $guide->where('id', $guide->id)
                        ->with(['warehouse' =>fn($query)=>
                            $query->with(['company', 'front', 'location',
                                            'lot', 'projectArea', 'stage'
                        ]),
                            'guideWastes.waste.classesWastes',
                            'guideWastes.package',
                            'applicant.role',
                            'approvant.role',
                            'reciever.role',
                            'checker.role'
                        ])
                        ->first();

        $total_weight = $guide->guideWastes->sum(function($waste){
                            return $waste->actual_weight;
                        });
        $packages = $guide->guideWastes->sum(function($waste){
                            return $waste->package_quantity;
                        });
                        
        $pdf = PDF::loadView('principal.common.pdf.intermentGuide', [
            "guide" => $guide,
            "weight" => round($total_weight,2),
            "packages" => $packages
        ]);

        return $pdf->stream('guía-internamiento-'.$guide->code.'.pdf');
    }
}
