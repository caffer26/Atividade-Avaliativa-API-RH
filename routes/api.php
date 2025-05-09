<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Departamento;
use App\Models\Funcionario;

Route::post('/funcionario', function (Request $request) {
    $funcionario = new Funcionario();
    $funcionario->name = $request->input('nome');
    $funcionario->email = $request->input('email');
    $funcionario->id_departamento = $request->input('id_departamento');
    $funcionario->save();
    return response()->json($funcionario);
});

Route::get('/funcionarios', function () {
    return response()->json(Funcionario::all());
});

Route::get('/funcionarios/{id}', function ($id) {
    return response()->json(Funcionario::findOrFail($id));
});

Route::patch('/funcionarios/{id}', function (Request $request, $id) {
    $funcionario = Funcionario::findOrFail($id);
    $funcionario->update($request->all());
    return response()->json($funcionario);
});

Route::delete('/funcionarios/{id}', function ($id) {
    Funcionario::destroy($id);
    return response()->json(null, 204);
});


Route::post('/departamento', function (Request $request) {
    $departamento = new Departamento();
    $departamento->name = $request->input('nome');
    $departamento->save();
    return response()->json($departamento, 201);
});


Route::get('/departamentos', function () {
    return response()->json(Departamento::all());
});


Route::get('/departamentos/{id}', function ($id) {
    return response()->json(Departamento::findOrFail($id));
});


Route::patch('/departamentos/{id}', function (Request $request, $id) {
    $department = Departamento::findOrFail($id);
    $department->update($request->all());
    return response()->json($department);
});


Route::delete('/departamentos/{id}', function ($id) {
    Departamento::destroy($id);
    return response()->json(null, 204);
});



Route::get('/funcionarios-departamento', function () {
    return response()->json(Funcionario::with('departamento')->get());
});



Route::get('/departamento-funcionarios', function () {
    return response()->json(Departamento::with('funcionarios')->get());
});



Route::get('/funcionarios/{id}/departamento', function ($id) {
    $funcionario = Funcionario::with('departamento')->findOrFail($id);
    return response()->json($funcionario->departamento);
});



Route::get('/departamentos/{id}/funcionarios', function ($id) {
    $departamento = Departamento::with('funcionarios')->findOrFail($id);
    return response()->json($departamento->funcionarios);
});
