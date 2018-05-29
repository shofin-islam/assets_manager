<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Http\Requests\AssetRequest;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AssetsManager');
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

    public function getAllAssets()
    {
        return Asset::orderBy('Signature','ASC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetRequest $request)
    {
       // return $request->all();
        $asset = new Asset;
        $asset->Signature = $request->Signature;
        $asset->CategoryID = $request->CategoryID;
        $asset->BrandName = $request->BrandName;
        $asset->Purpose = $request->Purpose;
        $asset->CarriedBy = $request->CarriedBy;
        $asset->save();
        return $asset;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(AssetRequest $request)
    {
        $AssetById = Asset::find($request->id);
        $AssetById->Signature= $request->Signature;
        $AssetById->CategoryID= $request->CategoryID;
        $AssetById->BrandName= $request->BrandName;
        $AssetById->Purpose= $request->Purpose;
        $AssetById->CarriedBy= $request->CarriedBy;
        $AssetById->save();
        return $AssetById;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Asset::where('id',$id)->delete();
    }
}
