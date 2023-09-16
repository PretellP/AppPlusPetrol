<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    IntermentGuide
};
use Auth;
use PDF;

use Image;

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

    public function hamapdf()
    {
        $original_image = file_get_contents('https://hamabuckettest.s3.amazonaws.com/imagenes/firmas/42325092.png');

        $mask = Image::make($original_image)
                            ->greyscale() 
                            ->contrast(100) 
                            ->trim('top-left', null, 40)
                            ->invert();

        $new_image = Image::canvas($mask->width(), $mask->height(), '#000000')
                            ->mask($mask)
                            ->encode('png', 100);

        $pdf = PDF::loadView('principal.common.pdf.hamapdf', compact('new_image'))->setPaper('a4', 'landscape');

        return $pdf->stream('hamapdf.pdf');

    }
}
