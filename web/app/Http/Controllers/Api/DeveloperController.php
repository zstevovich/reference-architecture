<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\ServiceInterfaces\DeveloperServiceInterface;
use Architecture\Domain\Entities\Enums\Graduate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Deveoper Api"
 * )
 * @OA\PathItem(path="/api")
 */
class DeveloperController extends Controller
{

    public function __construct(
        public DeveloperServiceInterface $developerService
    )
    {}

    /**
     * @OA\Post(
     *      path="/api/developer/create",
     *      operationId="createDeveloper",
     *      tags={"Developer"},
     *      summary="Store new developer",
     *      description="Returns developer data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/NewDeveloperRequestDto")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *
     * )
     */
    public function addNewDeveloper(Request $request) : JsonResponse
    {
        $name = $request->get('name');
        $lastname = $request->get('lastName');
        $graduate = Graduate::tryFrom((int)$request->get('graduate'));
        $newDeveloperDto = new NewDeveloperRequestDto($name,$lastname,$graduate);
        return response()->json($this->developerService->addNewDeveloper($newDeveloperDto),201);
    }

    /**
     * @OA\Put(
     *      path="/api/developer/update",
     *      operationId="updateDeveloper",
     *      tags={"Developer"},
     *      summary="Store new developer",
     *      description="Returns developer data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateDeveloperRequestDto")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *
     * )
     */
    public function updateDeveloper(Request $request) : JsonResponse
    {
        $name = $request->get('name');
        $lastname = $request->get('lastName');
        $graduate = Graduate::tryFrom((int)$request->get('graduate'));
        $id = $request->get('id');
        $newDeveloperDto = new NewDeveloperRequestDto($name,$lastname,$graduate,$id);
        return response()->json($this->developerService->updateDeveloper($newDeveloperDto));
    }
    /**
     * @OA\Get(
     *      path="/api/developer/get/{developerId}",
     *      operationId="getDeveloperId",
     *      tags={"Developer"},
     *      summary="Get Developer information",
     *      description="Returns developer data",
     *      @OA\Parameter(
     *          name="developerId",
     *          description="Developer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     * )
     */
    public function getDeveloper(string $developerId): JsonResponse
    {
        return response()->json($this->developerService->getDeveloper($developerId));
    }

    /**
     * @OA\Delete(
     *      path="/api/developer/delete/{developerId}",
     *      operationId="deleteDeveloperId",
     *      tags={"Developer"},
     *      summary="Delete existing developer",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="developerId",
     *          description="Developer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function deleteDeveloper(string $developerId): JsonResponse
    {
        return response()->json($this->developerService->deleteDeveloper($developerId),204);
    }

    /**
     * @OA\Get(
     *      path="/api/developer/all",
     *
     *      tags={"Developer"},
     *      summary="Get Developers",
     *      description="Returns developers data",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *       ),
     * )
     */
    public function getAll(): JsonResponse
    {
        return response()->json($this->developerService->getAll());
    }
    /**
     * @OA\Get(
     *      path="/api/developer/find/{name}",
     *      operationId="findDeveloperId",
     *      tags={"Developer"},
     *      summary="Get Developers",
     *      description="Returns developers data",
     *      @OA\Parameter(
     *          name="name",
     *          description="Developer name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *       ),
     * )
     */
    public function findByName(string $name): JsonResponse
    {
        return response()->json($this->developerService->findByName($name));
    }
}
