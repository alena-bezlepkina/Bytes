<?php

use App\Models\Bytes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BytesOperationApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * @OA\Post(
 *     path="/delete",
 *     operationId="delete",
 *     tags={"Bytes"},
 *     summary="Удаление",
 *     description="Удаление",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/BytesDeleteRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful",
 *         @OA\JsonContent(ref="#/components/schemas/BytesDeleteResponse")
 *     )
 * )
 */
Route::post('/delete', [BytesOperationApiController::class, 'delete']);

/**
 * @OA\Post(
 *     path="/get/{numId}",
 *     operationId="get",
 *     tags={"Bytes"},
 *     summary="Получение числа",
 *     description="Получение числа",
 *     @OA\Parameter(
 *         name="numId",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful",
 *         @OA\JsonContent(ref="#/components/schemas/BytesGetResponse")
 *     )
 * )
 */
Route::post('/get/{numId}', [BytesOperationApiController::class, 'get']);

/**
 * @OA\Post(
 *     path="/change",
 *     operationId="change",
 *     tags={"Bytes"},
 *     summary="Сохранение числа",
 *     description="Сохранение числа",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/BytesSaveRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful",
 *         @OA\JsonContent(ref="#/components/schemas/BytesSaveResponse")
 *     )
 * )
 */
Route::post('/change', [BytesOperationApiController::class, 'change']);

/**
 * @OA\Post(
 *     path="/create",
 *     operationId="create",
 *     tags={"Bytes"},
 *     summary="Изменение числа",
 *     description="Изменение числа",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/BytesCreateRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful",
 *         @OA\JsonContent(ref="#/components/schemas/BytesCreateResponse")
 *     )
 * )
 */
Route::post('/create', [BytesOperationApiController::class, 'create']);

/**
 * @OA\Post(
 *     path="/multy",
 *     summary="Умножение чисел",
 *     description="Умножение чисел",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"decimalNums", "operation"},
 *                 @OA\Property(
 *                     property="decimalNums",
 *                     type="array",
 *                     @OA\Items(
 *                         type="number",
 *                         format="decimal"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="operation",
 *                     type="string",
 *                     enum={"multiply_button"}
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Operation result",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="array",
 *                 @OA\Items(
 *                     type="number",
 *                     format="decimal"
 *                 )
 *             )
 *         )
 *     )
 * )
 */
Route::post('/multy', [BytesOperationApiController::class, 'multy']);
/**
 * @OA\Post(
 *     path="/sum",
 *     summary="Сложение чисел",
 *     description="Сложение чисел",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"decimalNums", "operation"},
 *                 @OA\Property(
 *                     property="decimalNums",
 *                     type="array",
 *                     @OA\Items(
 *                         type="number",
 *                         format="decimal"
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="operation",
 *                     type="string",
 *                     enum={"sum_button"}
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Operation result",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="array",
 *                 @OA\Items(
 *                     type="number",
 *                     format="decimal"
 *                 )
 *             )
 *         )
 *     )
 * )
 */
Route::post('/sum', [BytesOperationApiController::class, 'sum']);

Route::post('importProcess', [BytesOperationApiController::class, 'importProcess'])->name('importProcess');