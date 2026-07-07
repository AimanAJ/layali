<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Routing\Route;
use App\Traits\UploadImageTrait;
use App\Traits\SharedTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Backend\Slider\StoreSliderRequest;
use App\Http\Requests\Backend\Slider\updateSliderRequest;


class SliderController extends Controller
{
    use SharedTrait, UploadImageTrait;

    // ========================================================================
    // ====================== index Function ==================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function index(Route $route)
    {
        try {

            $slides = Slider::all();
            return view('admin.slider.index', compact('slides'));
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
            return view('admin.slider.create');
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
    public function store(StoreSliderRequest $request, Route $route)
    {
        try {
            $request_data = [
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'status' => $request->status,
            ];

            if (isset($request->image)) {
                $orginal_image = $request->file('image');
                $upload_location = 'storage/images/slider/';
                $request_data['image'] = $this->saveFile($orginal_image, $upload_location);
            }

            DB::transaction(function () use ($request_data) {
                Slider::create($request_data);
            });

            return redirect()->route('super_admin.slider-index')->with('success', 'A new Slide Has Been Added Successfully');
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
    // ========================= show Function ================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function show(Route $route, $id)
    {
        try {

            try {
                $slide = Slider::find($id);
                if ($slide) {
                    return view('admin.slider.show', compact('slide'));
                } else {
                    return redirect()->route('super_admin.slide-index')->with('error', 'Required Slide Not Found');
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
    // ======================== edit Function =================================
    // ==================== Created By Raghad ALKarasneh ========================
    // ========================================================================
    public function edit($id, Route $route)
    {

        try {
            $slide = Slider::find($id);
            if ($slide) {
                return view('admin.slider.edit', compact('slide'));
            } else {
                return redirect()->route('super_admin.slider-index')->with('danger', ' Required Slide Not Found');
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
    public function update(UpdateSliderRequest $request, $id, Route $route)
    {
        try {
            $slide = Slider::find($id);
            if ($slide) {
                $update_data = [
                    'name_en' => $request->name_en,
                    'name_ar' => $request->name_ar,
                    'status' => $request->status,
                ];


                if (isset($request->image)) {
                    $orginal_image = $request->file('image');
                    $upload_location = 'storage/images/slider/';
                    $update_data['image'] = $this->saveFile($orginal_image, $upload_location);
                }




                DB::transaction(function () use ($update_data, $slide) {
                    $slide->update($update_data);
                });
                return redirect()->route('super_admin.slider-index')->with('success', 'The Slide Has Benn Updated Successfully');
            } else {
                return redirect()->route('super_admin.slider-index')->with('danger', ' Required Slide Not Found');
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
    // ========================= Soft Delete Function =========================
    // ======================= Created By :Raghad ALKarasneh =======================
    // ========================================================================
    public function softDelete($id, Route $route)
    {
        try {
            $slide = Slider::find($id);
            if ($slide) {
                DB::transaction(function () use ($slide) {
                    $slide->delete();
                });
                return redirect()->route('super_admin.slider-index')->with('success', 'The Deletion process has been successful');
            } else {
                return redirect()->back()->with('danger', 'This slide is not in the records');
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
    // ==================== Created By : Raghad ALKarasneh ======================
    // ========================================================================
    public function showSoftDelete(Request $request, Route $route)
    {
        try {
            $slides = new Slider();
            $slides = $slides->onlyTrashed()->select('*')->orderBy('created_at', 'asc')->get();
            return view('admin.slider.trashed', compact('slides'));
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
            $slide = Slider::onlyTrashed()->find($id);
            if ($slide) {
                DB::transaction(function () use ($slide) {
                    $slide->restore();
                });
                return redirect()->route('super_admin.slider-showSoftDelete')->with('success', 'Restore Completed Successfully');
            } else {
                return redirect()->back()->with('danger', 'This Slide does not exist in the records');
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
            $slide = Slider::find($id);
            if ($slide) {
                if ($slide->status == 'Active') {
                    $slide->status = 2;  // 2 => Inactive
                } elseif ($slide->status == 'Inactive') {
                    $slide->status = 1;  // 1 => Active
                }
                $slide->save();
                return redirect()->back()->with('success', 'The process has been done successfully');
            } else {
                return redirect()->back()->with('danger', 'This slide is not in the records');
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
