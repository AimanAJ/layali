<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Traits\UploadImageTrait;
use App\Traits\SharedTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Backend\Series\StoreSeriesRequest;
use App\Http\Requests\Backend\Series\UpdateSeriesRequest;

class SeriesController extends Controller
{
    use SharedTrait, UploadImageTrait;
    // ========================================================================
    // ====================== index Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function index(Route $route)
    {
        try {
            $series = Series::all(); 
            return view('admin.series.index', compact('series'));
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ========================================================================
    // ====================== create Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function create(Route $route)
    {
        try {
            return view('admin.series.create');
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ========================================================================
    // ====================== store Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function store(StoreSeriesRequest $request, Route $route)
    {
        try {
            $request_data = [
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'url'=> $request->url,
                'playlist_id'=>$request->playlist_id,
                'duration'=> $request->duration,
                'status' => $request->status,
            ];
            
            if (isset($request->image)) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/images/series/';
                $request_data['image'] = $this->saveFile($orginal_image, $upload_location);
            }
           
            DB::transaction(function () use ($request_data) {
               Series::create($request_data);
            });

            return redirect()->route('super_admin.series-index')->with('success', 'A New Series has been Added Successfully');
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ========================================================================
    // ====================== show Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function show(Route $route, $id)
    {
        try {
            $series = Series::find($id);
        if ($series) {
            return view('admin.series.show', compact('series'));
        } else {
            return redirect()->route('super_admin.series-index')->with('error', 'Series Not Found');
      }
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }
    // ========================================================================
    // ====================== edit Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function edit($id, Route $route)
    {
        try {
            $series = Series::find($id);
          
            if ($series) {
                return view('admin.series.edit', compact('series'));
            } else {
                return redirect()->route('super_admin.Seriess-index')->with('danger', ' The Required Series Not Found');
            }
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ========================================================================
    // ====================== update Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function update(UpdateSeriesRequest $request, $id, Route $route)
    {
        try {
            $series = Series::find($id);
     
            if ($series) {
                $update_data = [
                    'title_en' => $request->title_en,
                    'title_ar' => $request->title_ar,
                    'description_en' => $request->description_en,
                    'description_ar' => $request->description_ar,
                    'url'=> $request->url,
                    'playlist_id'=>$request->playlist_id,
                    'duration'=> $request->duration,
                    'status' => $request->status,
                ];
                if (isset($request->image)) {
                    $orginal_image = $request->file('image');
                    $upload_location = 'storage/images/seriess/';
                    $update_data['image'] = $this->saveFile($orginal_image, $upload_location);
                }

               
                DB::transaction(function () use ($update_data, $series) {
                    $series->update($update_data);
        
                });
                return redirect()->route('super_admin.series-index')->with('success', 'The Series Has been Updated Successfully');
            } else {
                return redirect()->route('super_admin.series-index')->with('danger', 'The Series Not Found');
            }
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }



    // ========================================================================
    // ======================== Soft Delete Function ==========================
    // ==================== Created By :Raghad ALKarasneh ======================
    // ========================================================================
    public function softDelete($id, Route $route)
    {
        try {
            $series = Series::find($id);
            if ($series) {
                DB::transaction(function () use ($series) {
                    $series->delete();
                });
                return redirect()->route('super_admin.series-index')->with('success', 'The Deletion process has been successful');
            } else {
                return redirect()->back()->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ========================================================================
    // ====================== Show Soft Delete Function =======================
    // ==================== Created By :Raghad ALKarasneh ======================
    // ========================================================================
    public function showSoftDelete(Request $request, Route $route)
    {
        try {
            $series = new Series();
            $series = $series->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.series.trashed', compact('series'));
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ========================================================================
    // ==================== Soft Delete Restore Function ======================
    // ==================== Created By : Layth Al-Dwairy ======================
    // ========================================================================
    public function softDeleteRestore($id, Route $route)
    {
        try {
            $series = Series::onlyTrashed()->find($id);
            if ($series) {
                DB::transaction(function () use ($series) {
                    $series->restore();
                });
                return redirect()->route('super_admin.series-showSoftDelete')->with('success', 'Restore Completed Successfully');
            } else {
                return redirect()->back()->with('danger', 'This Series does not exist in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    // ================================================================
    // ================== Active/Inactive Single ======================
    // ================================================================
    public function activeInactiveSingle($id, Route $route)
    {
        try {
            $series = Series::find($id);
            if ($series) {
                if ($series->status == 'Active') {
                    $series->status = 2;  // 2 => Inactive
                } elseif ($series->status == 'Inactive') {
                    $series->status = 1;  // 1 => Active
                }
                $series->save();
                return redirect()->back()->with('success', 'The process has successfully');
            } else {
                return redirect()->back()->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name =  $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' =>  $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }
}
