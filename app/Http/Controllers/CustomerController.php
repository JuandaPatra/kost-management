<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $houses = Customer::with(['booking', 'booking.house:id,name', 'booking.room:id,name,lantai'])->where('status', '=', 'penyewa')->get();
        // return $houses;
        return view('admin.customer.index');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function customerCollection(Request $request)
    {
        if($request->ajax()){
            // $houses = Customer::with(['booking', 'booking.house:id,name', 'booking.room:id,name'])->where('status', '=', 'penyewa')->get();
            // $houses = Customer::with(['booking'])->where('status', '=', 'penyewa')->get();
            $houses = Customer::where('status', '=', 'penyewa')->get();

            return Datatables::of($houses)
                ->addIndexColumn()
                ->addColumn('rumah', function ($houses) {
                    return $houses->booking[0]->house->name;
                })
                ->addColumn('lantai', function ($houses) {
                    return $houses->booking[0]->room->lantai;
                })
                ->addColumn('kamar', function ($houses) {
                    return $houses->booking[0]->room->name;
                })
                ->addColumn('bulan', function ($houses) {
                    $dateFrom = date("F Y",strtotime($houses->booking[0]->date_start));
                    $dateTo = date("F Y",strtotime($houses->booking[0]->date_end));
                    return $dateFrom.' - ' .$dateTo ;
                })
                ->addColumn('action', function ($houses) {
                    return '
                    <a href="'.route('house.addRoom', $houses->id).'" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Tambah</a>
                    <a href="" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    
                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';
                })
                ->make(true);
        }
    }
}
