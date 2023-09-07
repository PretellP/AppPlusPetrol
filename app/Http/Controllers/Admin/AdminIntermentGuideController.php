<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    IntermentGuide
};
use Auth;
use DataTables;

class AdminIntermentGuideController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if($request->ajax())
        {
            if($request['table'] == 'pending'){
                $pendingGuides = IntermentGuide::where('stat_rejected', 0)
                                                ->where(function($query){
                                                    $query->where('stat_approved', 0)
                                                        ->orWhere('stat_recieved', 0)
                                                        ->orWhere('stat_verified', 0);
                                                })
                                                ->with(['warehouse.lot',
                                                        'warehouse.stage',
                                                        'warehouse.location',
                                                        'warehouse.projectArea',
                                                        'warehouse.company',
                                                        'warehouse.front'
                                                ]);

                $allGuides = DataTables::of($pendingGuides)
                ->editColumn('created_at', function($guide){
                    return $guide->created_at;
                })
                ->addColumn('stat_approved', function($guide){
                    $status = '<span class="info-guide-pending">
                                    Pendiente
                                </span>';
                    if($guide->stat_approved == 1){
                        $status = '<span class="info-guide-checked">
                                    Aprobado
                                </span>';
                    }elseif($guide->stat_rejected == 1){
                        $status = '<span class="info-guide-rejected">
                                        Rechazado
                                    </span>';
                    }
                    return $status;
                })
                ->addColumn('stat_recieved', function($guide){
                    $status = '<span class="info-guide-pending">
                                    Pendiente
                                </span>';
                    if($guide->stat_recieved == 1){
                        $status = '<span class="info-guide-checked">
                                    Recibido
                                </span>';
                    }elseif($guide->stat_rejected == 1){
                        $status = '<span class="info-guide-rejected">
                                        Rechazado
                                    </span>';
                    }
                    return $status;
                })
                ->addColumn('stat_verified', function($guide){
                    $status = '<span class="info-guide-pending">
                                    Pendiente
                                </span>';
                    if($guide->stat_verified == 1){
                        $status = '<span class="info-guide-checked">
                                    Verificado
                                </span>';
                    }elseif($guide->stat_rejected == 1){
                        $status = '<span class="info-guide-rejected">
                                        Rechazado
                                    </span>';
                    }
                    return $status;
                })
                ->addColumn('action', function($guide){
                    $btn = '<a href="'.route('guidesAdminPending.show', $guide).'"
                            data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';
    
                    return $btn;
                })
                ->rawColumns(['stat_approved','stat_recieved','stat_verified','action'])
                ->make(true);
                return $allGuides;
            }
            elseif($request['table'] == 'approved'){
                $allGuidesApproved = IntermentGuide::where('stat_approved', 1)
                                                    ->where('stat_recieved', 1)
                                                    ->where('stat_verified', 1)
                                                    ->with(['warehouse.lot',
                                                            'warehouse.stage',
                                                            'warehouse.location',
                                                            'warehouse.projectArea',
                                                            'warehouse.company',
                                                            'warehouse.front'
                                                ]);

                $allGuides = DataTables::of($allGuidesApproved)
                            ->editColumn('created_at', function($guide){
                                return $guide->created_at;
                            })
                            ->addColumn('stat_approved', function($guide){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($guide->stat_approved == 1){
                                    $status = '<span class="info-guide-checked">
                                                Aprobado
                                            </span>';
                                }elseif($guide->stat_rejected == 1){
                                    $status = '<span class="info-guide-rejected">
                                                    Rechazado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('stat_recieved', function($guide){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($guide->stat_recieved == 1){
                                    $status = '<span class="info-guide-checked">
                                                Recibido
                                            </span>';
                                }elseif($guide->stat_rejected == 1){
                                    $status = '<span class="info-guide-rejected">
                                                    Rechazado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('stat_verified', function($guide){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($guide->stat_verified == 1){
                                    $status = '<span class="info-guide-checked">
                                                Verificado
                                            </span>';
                                }elseif($guide->stat_rejected == 1){
                                    $status = '<span class="info-guide-rejected">
                                                    Rechazado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('action', function($guide){
                                $btn = '<a href="'.route('guidesAdminApproved.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';

                                return $btn;
                            })  
                            ->addColumn('pdf', function($guide){
                                $btn ='<a href="'.route('generateIntermentGuidePdf.admin', $guide).'" target="BLANK"
                                        data-original-title="show" class="icon-pdf-generate">
                                            <i class="fa-solid fa-file-pdf fa-xl"></i>
                                        </a>';

                                return $btn;
                            })    
                            ->rawColumns(['stat_approved','stat_recieved','stat_verified','action', 'pdf'])
                            ->make(true);
                            
                            return $allGuides;
            }
            elseif($request['table'] == 'rejected'){
                $guidesApplicant = IntermentGuide::where('stat_rejected', 1)
                                                    ->with(['warehouse.lot',
                                                            'warehouse.stage',
                                                            'warehouse.location',
                                                            'warehouse.projectArea',
                                                            'warehouse.company',
                                                            'warehouse.front'
                                                    ]);

                $allGuides = DataTables::of($guidesApplicant)
                            ->editColumn('created_at', function($guide){
                                return $guide->created_at;
                            })
                            ->addColumn('stat_approved', function($guide){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($guide->stat_approved == 1){
                                    $status = '<span class="info-guide-checked">
                                                Aprobado
                                            </span>';
                                }elseif($guide->stat_rejected == 1){
                                    $status = '<span class="info-guide-rejected">
                                                    Rechazado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('stat_recieved', function($guide){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($guide->stat_recieved == 1){
                                    $status = '<span class="info-guide-checked">
                                                Recibido
                                            </span>';
                                }elseif($guide->stat_rejected == 1){
                                    $status = '<span class="info-guide-rejected">
                                                    Rechazado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('stat_verified', function($guide){
                                $status = '<span class="info-guide-pending">
                                                Pendiente
                                            </span>';
                                if($guide->stat_verified == 1){
                                    $status = '<span class="info-guide-checked">
                                                Verificado
                                            </span>';
                                }elseif($guide->stat_rejected == 1){
                                    $status = '<span class="info-guide-rejected">
                                                    Rechazado
                                                </span>';
                                }
                                return $status;
                            })
                            ->addColumn('action', function($guide){
                                $btn = '<a href="'.route('guidesAdminRejected.show', $guide).'"
                                        data-original-title="show" class="me-3 edit btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>';
                
                                return $btn;
                            })
                            ->rawColumns(['stat_approved','stat_recieved','stat_verified','action'])
                            ->make(true);
                            return $allGuides;
                }
            }
    }

    public function approvedGuides()
    {
        return view('principal.viewAdmin.intermentGuides.approved.index');
    }

    public function approvedShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
                            $query->with(['front','company','location','lot','projectArea','stage'])
                        ])
                        ->with('approvant.role')
                        ->with('applicant.role')
                        ->with('reciever.role')
                        ->with('checker.role')
                        ->with(['guideWastes' => fn($query) =>
                            $query->with(['waste.classesWastes', 'package'])    
                        ])
                        ->where('id', $guide->id)->first();

        $totalWeight = $guide->guideWastes->sum(function($waste){
                            return $waste->actual_weight;
                        });

        $totalPackage = $guide->guideWastes->sum(function($waste){
                            return $waste->package_quantity;
                        });

        return view('principal.viewAdmin.intermentGuides.approved.show', [
            "guide" => $guide,
            "totalWeight" => $totalWeight,
            "totalPackage" => $totalPackage
        ]);
    }

    public function pendingGuides()
    {
        return view('principal.viewAdmin.intermentGuides.pending.index');
    }

    public function pendingShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
        $query->with(['front','company','location','lot','projectArea','stage'])
                    ])
                    ->with('approvant.role')
                    ->with('applicant.role')
                    ->with('reciever.role')
                    ->with('checker.role')
                    ->with(['guideWastes' => fn($query) =>
                        $query->with(['waste.classesWastes', 'package'])    
                    ])
                    ->where('id', $guide->id)->first();

                $totalWeight = $guide->guideWastes->sum(function($waste){
                        return $waste->actual_weight;
                    });

                $totalPackage = $guide->guideWastes->sum(function($waste){
                        return $waste->package_quantity;
                    });

        return view('principal.viewAdmin.intermentGuides.pending.show', [
                        "guide" => $guide,
                        "totalWeight" => $totalWeight,
                        "totalPackage" => $totalPackage
                    ]);
    }

    public function rejectedGuides()
    {
        return view('principal.viewAdmin.intermentGuides.rejected.index');
    }

    public function rejectedShow(IntermentGuide $guide)
    {
        $guide = $guide->with(['warehouse' => fn($query) =>
        $query->with(['front','company','location','lot','projectArea','stage'])
                    ])
                    ->with('approvant.role')
                    ->with('applicant.role')
                    ->with('reciever.role')
                    ->with('checker.role')
                    ->with(['guideWastes' => fn($query) =>
                        $query->with(['waste.classesWastes', 'package'])    
                    ])
                    ->where('id', $guide->id)->first();

                $totalWeight = $guide->guideWastes->sum(function($waste){
                        return $waste->actual_weight;
                    });

                $totalPackage = $guide->guideWastes->sum(function($waste){
                        return $waste->package_quantity;
                    });

        return view('principal.viewAdmin.intermentGuides.rejected.show', [
                        "guide" => $guide,
                        "totalWeight" => $totalWeight,
                        "totalPackage" => $totalPackage
                    ]);
    }
}
