<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="API de Empresas",
 *     version="1.0.0",
 *     description="Documentación Swagger generada para la gestión de empresas"
 * )
 */

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use Illuminate\Database\QueryException;
use Exception;

class EmpresaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/empresas",
     *     summary="Obtener todas las empresas",
     *     tags={"Empresas"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de empresas"
     *     )
     * )
     */

    public function index()
    {
        try {
            $empresas = Empresa::all();
            return response()->json($empresas);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error inesperado: '.$e->getMessage()], 500);
        }
    }
    
    /**
     * @OA\Post(
     *     path="/api/empresas",
     *     summary="Crear una nueva empresa",
     *     tags={"Empresas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nit", "nombre", "direccion", "telefono"},
     *             @OA\Property(property="nit", type="string", example="1234567890"),
     *             @OA\Property(property="nombre", type="string", example="Mi Empresa S.A."),
     *             @OA\Property(property="direccion", type="string", example="Calle 123"),
     *             @OA\Property(property="telefono", type="string", example="3001234567")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Empresa creada exitosamente"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error de validación o duplicado"
     *     )
     * )
     */

    public function store(StoreEmpresaRequest $request)
    {
        try {
            $data = $request->validated();
            $data['estado'] = 'Activo';
            $empresa = Empresa::create($data);
            return response()->json($empresa, 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error en base de datos: '.$e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error inesperado: '.$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/empresas/{nit}",
     *     summary="Actualizar una empresa existente",
     *     tags={"Empresas"},
     *     @OA\Parameter(
     *         name="nit",
     *         in="path",
     *         required=true,
     *         description="NIT de la empresa a actualizar",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nombre", type="string", example="Empresa Actualizada"),
     *             @OA\Property(property="direccion", type="string", example="Carrera 45 #10-15"),
     *             @OA\Property(property="telefono", type="string", example="3019876543"),
     *             @OA\Property(property="estado", type="string", enum={"Activo", "Inactivo"}, example="Activo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Empresa actualizada exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Empresa no encontrada"
     *     )
     * )
     */


    public function update(UpdateEmpresaRequest $request, $nit)
    {
        try {
            $empresa = Empresa::findOrFail($nit);
            $empresa->update($request->validated());
            return response()->json($empresa);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Empresa no encontrada'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error en base de datos: '.$e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error inesperado: '.$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/empresas/{nit}",
     *     summary="Obtener una empresa por NIT",
     *     tags={"Empresas"},
     *     @OA\Parameter(
     *         name="nit",
     *         in="path",
     *         required=true,
     *         description="NIT de la empresa",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Datos de la empresa"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Empresa no encontrada"
     *     )
     * )
     */


    public function show($nit)
    {
        try {
            $empresa = Empresa::findOrFail($nit);
            return response()->json($empresa);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Empresa no encontrada'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error inesperado: '.$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/empresas/inactivos",
     *     summary="Eliminar todas las empresas con estado 'Inactivo'",
     *     tags={"Empresas"},
     *     @OA\Response(
     *         response=200,
     *         description="Cantidad de empresas eliminadas",
     *         @OA\JsonContent(
     *             @OA\Property(property="deleted", type="integer", example=3)
     *         )
     *     )
     * )
     */

    public function deleteInactivos()
    {
        try {
            $deleted = Empresa::where('estado', 'Inactivo')->delete();
            return response()->json(['deleted' => $deleted]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error inesperado: '.$e->getMessage()], 500);
        }
    }
}
