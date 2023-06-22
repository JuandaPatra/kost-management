<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\House;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.house.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.house.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'         =>  'required|string|max:100',
                'address'       =>  'required',
                'pic'           =>  'required',
                'total_kamar'   =>  'required'
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        // proses insert

        DB::beginTransaction();
        try {
            $post = House::create([
                'name'          =>  $request->title,
                'address'       => $request->address,
                'pic'           => $request->pic,
                'total_kamar'   => $request->total_kamar
               
            ]);
            // Alert::success('Tambah Benua', 'Berhasil');
            return redirect()->route('house.index');
        } catch (\throwable $th) {
            DB::rollBack();
            // Alert::error('Tambah Benua', 'error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
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

    public function addRoom($id)
    {
        return view('admin.room.create',[
            'lantais' => $this->statuses(),
            'id'      => $id
        ]);
    }

    public function addRoomItem(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'         =>  'required',
                'price'       =>  'required',
                'lantai'           =>  'required',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        // proses insert

        DB::beginTransaction();
        try {
            $post = Room::create([
                'name'          =>  $request->name,
                'price'         => $request->price,
                'lantai'           => $request->lantai,
                'is_booked'         => 0,
                'house_id'          => $id
               
            ]);
            // Alert::success('Tambah Benua', 'Berhasil');
            // return redirect()->route('room.index');
            return redirect()->route('house.index');
        } catch (\throwable $th) {
            DB::rollBack();
            // Alert::error('Tambah Benua', 'error' . $th->getMessage());
            return $th->getMessage();
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function room(){
        return view('admin.room.index');
    }
    

    public function roomCollection(Request $request)
    {
        if($request->ajax())
        {
            $rooms = Room::with(['house:id,name'])->get();

            return Datatables::of($rooms)
                ->addIndexColumn()
                ->addColumn('rumah', function ($rooms) {
                    return  $rooms->house->name;
                })
                ->addColumn('lantai', function ($rooms) {
                    return 'Lantai '. $rooms->lantai;
                })
                ->addColumn('action', function ($rooms) {


                    return '
                    <a href="'.route('room.rented', $rooms->id).'" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Tambah</a>
                    <a href="" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    
                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';
                })
                ->addColumn('status', function ($rooms) {
                    $status = '';
                    $color = '';
                    if($rooms->is_booked == 0){
                        $status = 'belum terisi';
                        $color = 'primary';
                    }else{
                        $status = 'sudah terisi';
                        $color = 'success';
                    }
                    return '
                    <span class="badge bg-'.$color.'"> '.$status.'</span>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);

        }
    }

    public function rented($id)
    {
        return view('admin.room.add',[
            'id'    =>$id,
            'jobs'  =>$this->jobs()
        ]);
    }

    public function rentedSend(Request $request, $id)
    {
       
        $validator = Validator::make(
            $request->all(),
            [
                'name'              =>  'required',
                'telephone'         =>  'required',
                'NIK'               =>  'required',
                'address'           =>  'required',
                'occupation'        =>  'required',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        // proses insert

        DB::beginTransaction();
        try {
            $post = Customer::create([
                'name'              =>  $request->name,
                'telephone'         =>  $request->telephone,
                'NIK'               =>  $request->NIK,
                'address'           =>  $request->address,
                'occupation'        =>  $request->occupation,
                'status'            => 'penyewa'
               
            ]);

            $room = Room::whereId($id);
            $room->update([
                'is_booked'         => 1
            ]);
            
            $room_house_id= Room::with(['house'])->where('id', '=',$id)->first();

            $customer = Customer::where('name', '=', $request->name)->where('telephone', '=', $request->telephone)->first();
            $booking = Booking::create([
                'customer_id'   => $customer->id,
                'invoiceId'     => time(),
                'house_id'      => $room_house_id->house->id,
                'room_id'       => $request->room_id,
                'status_payment'=> 'belum dibayar',
                'date_start'    => date('Y-m-d', strtotime($request->tgl_masuk)) ,
                'date_end'      => date('Y-m-d', strtotime($request->tgl_keluar)),
                'price'         => $room->first()->price
            ]);
            // Alert::success('Tambah Benua', 'Berhasil');
            // return redirect()->route('room.index');
            return redirect()->route('house.index');
        } catch (\throwable $th) {
            DB::rollBack();
            // Alert::error('Tambah Benua', 'error' . $th->getMessage());
            return $th->getMessage();
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    private function statuses()
    {

        return [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ];
    }

    private function jobs()
    {
        return [
            'pelajar/mahasiswa' => 'pelajar/mahasiswa',
            'karyawan swasta'   => 'karyawan swasta',
            'pns'               => 'pns',
            'wiraswasta'        => 'wiraswasta',
            'tni/polri'         => 'tni/polri',
            'lainnya'           => 'lainnya'
        ];
    }

    public function houseCollections(Request $request)
    {
        if($request->ajax()){
            $houses = House::all();

            return Datatables::of($houses)
                ->addIndexColumn()
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
