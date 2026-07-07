<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kid;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Traits\UploadImageTrait;
use App\Traits\SharedTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Backend\Kid\StoreKidRequest;
use App\Http\Requests\Backend\Kid\UpdateKidRequest;

class KidController extends Controller
{
   
    use SharedTrait, UploadImageTrait;
    // ========================================================================
    // ====================== index Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function index(Route $route)
    {
        try {
            $kids = Kid::all(); 
            return view('admin.kids.index', compact('kids'));
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
            return view('admin.kids.create');
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
    public function store(StoreKidRequest $request, Route $route)
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
                $upload_location = 'storage/images/kids/';
                $request_data['image'] = $this->saveFile($orginal_image, $upload_location);
            }
           
            DB::transaction(function () use ($request_data) {
               Kid::create($request_data);
            });

            return redirect()->route('super_admin.kids-index')->with('success', 'A New Kid Program has been Added Successfully');
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
            $kid = Kid::find($id);
        if ($kid) {
            return view('admin.kids.show', compact('kid'));
        } else {
            return redirect()->route('super_admin.kid-index')->with('error', 'Kid Program Not Found');
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
            $kid = Kid::find($id);
          
            if ($kid) {
                return view('admin.kids.edit', compact('kid'));
            } else {
                return redirect()->route('super_admin.kids-index')->with('danger', ' The Required Kid Program Not Found');
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
    public function update(UpdateKidRequest $request, $id, Route $route)
    {
        try {
            $kid = Kid::find($id);
     
            if ($kid) {
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
                    $upload_location = 'storage/images/kids/';
                    $update_data['image'] = $this->saveFile($orginal_image, $upload_location);
                }

               
                DB::transaction(function () use ($update_data, $kid) {
                    $kid->update($update_data);
        
                });
                return redirect()->route('super_admin.kids-index')->with('success', 'The Kid Program Has been Updated Successfully');
            } else {
                return redirect()->route('super_admin.kids-index')->with('danger', 'The Kid Program Not Found');
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
            $kid = Kid::find($id);
            if ($kid) {
                DB::transaction(function () use ($kid) {
                    $kid->delete();
                });
                return redirect()->route('super_admin.kids-index')->with('success', 'The Deletion process has been successful');
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
            $kids = new Kid();
            $kids = $kids->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.kids.trashed', compact('kids'));
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
            $kid = Kid::onlyTrashed()->find($id);
            if ($kid) {
                DB::transaction(function () use ($kid) {
                    $kid->restore();
                });
                return redirect()->route('super_admin.kids-showSoftDelete')->with('success', 'Restore Completed Successfully');
            } else {
                return redirect()->back()->with('danger', 'This Kid Program does not exist in the records');
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
            $kid = Kid::find($id);
            if ($kid) {
                if ($kid->status == 'Active') {
                    $kid->status = 2;  // 2 => Inactive
                } elseif ($kid->status == 'Inactive') {
                    $kid->status = 1;  // 1 => Active
                }
                $kid->save();
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
