<?php declare(strict_types=1);

namespace Architecture\ApplicationServices;
use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\NewDeveloperResponseDto;
use Architecture\Api\Contracts\ServiceInterfaces\DeveloperServiceInterface;
use Architecture\Api\Contracts\Dtos\Mappers\DeveloperMapper;
use Architecture\BuildingBlocks\UnitOfWorkRepositoryInterface;
use Architecture\Domain\Services\SendMailServiceInterface;
use Exception;

class DeveloperService implements DeveloperServiceInterface
{
    private ?string $error = null;
    public function __construct(
        public UnitOfWorkRepositoryInterface $unitOfWork,
        public SendMailServiceInterface $sendMailService
    ) {}

    public function addNewDeveloper(NewDeveloperRequestDto $newDeveloperDto): NewDeveloperResponseDto
    {
        $developer = DeveloperMapper::toEntity($newDeveloperDto);
        $this->unitOfWork->beginTransaction();
        try {
            $this->unitOfWork->developerRepository()->create($developer);
            $this->unitOfWork->saveChanges();
            $this->unitOfWork->commitTransaction();
        }catch (Exception $e){
            $this->unitOfWork->rollbackTransaction();
            $this->error = $e->getMessage();
        }
        $newDeveloperResponseDto = new NewDeveloperResponseDto(
            $developer->getId(),$developer->getName(),$developer->getLastName(),$developer->getGraduate(), $this->error
        );
        $this->sendMailService->sendEmail("example@example.com","example","example text");
        return $newDeveloperResponseDto;

    }
}