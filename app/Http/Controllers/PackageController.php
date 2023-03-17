<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\HttpResource;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the package.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $page = 1;
        if (request('page') != null) {
            $page = request('page');
        }

        $data = Package::paginate(10, ['*'], 'page', $page);

        $response = [
            'status' => true,
            'message' => 'success',
            'data' => $data,
        ];

        return new HttpResource($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StorePackageRequest $request)
    {
        $response = [
            'status' => true,
            'message' => 'success store package',
            'data' => [],
        ];

        $package = Package::create($request->all());
        $response['data'] = $package;

        if (!$package) {
            $response['status'] = false;
            $response['message'] = 'failed to store package';
        }

        return new HttpResource($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $response = [
            'status' => true,
            'message' => 'success',
            'data' => [],
        ];

        $package = Package::find($id);
        if ($package == null) {
            $response['status'] = false;
            $response['message'] = 'failed to get package';
            return new HttpResource($response);
        }

        $response['data'] = $package->first();

        return new HttpResource($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, string $id)
    {
        $response = [
            'status' => true,
            'message' => 'success update package',
            'data' => [],
        ];

        $category = Package::find($id);
        if ($category == null) {
            $response['status'] = false;
            $response['message'] = 'package id not found';
        }

        $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $response = [
            'status' => true,
            'message' => 'success delete package',
            'data' => [],
        ];

        $package = Package::find($id);
        if ($package == null) {
            $response['status'] = false;
            $response['message'] = 'package not found';
            
            return new HttpResource($response);
        }

        $package->delete();

        if (!$package) {
            $response['status'] = false;
            $response['message'] = 'failed to delete package';
        }

        return new HttpResource($response);
    }
}
