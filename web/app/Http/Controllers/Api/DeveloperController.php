<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\ServiceInterfaces\DeveloperServiceInterface;
use Architecture\Domain\Entities\Enums\Graduate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    public function __construct(
        public DeveloperServiceInterface $developerService
    )
    {}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addNewDeveloper(Request $request) : JsonResponse
    {
        $name = $request->get('name');
        $lastname = $request->get('lastName');
        $graduate = Graduate::tryFrom((int)$request->get('graduate'));
        $newDeveloperDto = new NewDeveloperRequestDto($name,$lastname,$graduate);
        return response()->json($this->developerService->AddNewDeveloper($newDeveloperDto));
    }
}
