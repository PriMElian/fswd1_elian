<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Resources\KaryawanResource;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return KaryawanResource::collection($karyawan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_induk' => 'required|unique:karyawans',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'tanggal_bergabung' => 'required|date',
        ]);

        $karyawan = Karyawan::create($data);
        return new KaryawanResource($karyawan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return new KaryawanResource($karyawan);
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
        $karyawan = Karyawan::findOrFail($id);

        $data = $request->validate([
            'nomor_induk' => 'required|unique:karyawans,nomor_induk,'.$karyawan->id,
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'tanggal_bergabung' => 'required|date',
        ]);

        $karyawan->update($data);
        return new KaryawanResource($karyawan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return response()->json(['message' => 'Karyawan deleted successfully']);
    }

    public function firstJoinedEmployees() {
        $firstJoined = Karyawan::orderBy('tanggal_bergabung')->take(3)->get();
        return KaryawanResource::collection($firstJoined);
    }

    public function karyawanWithCuti() {
        $karyawanWithCuti = Karyawan::has('cuti')->get();
        return KaryawanResource::collection($karyawanWithCuti);
    }

    public function remainingCuti() {
        $karyawan = Karyawan::with('cuti')->get();

        $karyawanData = [];
        foreach ($karyawan as $karyawanItem) {
            $takenDays = $karyawanItem->cuti->sum('lama_cuti');
            $remainingDays = 12 - $takenDays; // Assuming the quota is 12 days/year

            $karyawanData[] = [
                'nomor_induk' => $karyawanItem->nomor_induk,
                'nama' => $karyawanItem->nama,
                'sisa_cuti' => $remainingDays,
            ];
        }

        return response()->json(['data' => $karyawanData]);
    }
}
