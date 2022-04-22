<?php declare(strict_types=1);

namespace Architecture\ApplicationServices;
use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\DeveloperResponseDto;
use Architecture\Api\Contracts\ServiceInterfaces\DeveloperServiceInterface;
use Architecture\Api\Contracts\Dtos\Mappers\DeveloperMapper;
use Architecture\BuildingBlocks\UnitOfWorkRepositoryInterface;
use Architecture\Domain\Entities\Developer;
use Architecture\Domain\Services\SendMailServiceInterface;
use Exception;

class DeveloperService implements DeveloperServiceInterface
{
    private ?string $error = null;
    public function __construct(
        public UnitOfWorkRepositoryInterface $unitOfWork,
        public SendMailServiceInterface $sendMailService
    ) {}

    public function addNewDeveloper(NewDeveloperRequestDto $newDeveloperDto): DeveloperResponseDto
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
        $developerResponse = new DeveloperResponseDto(DeveloperMapper::toDto($developer),$this->error);
        $this->sendMailService->sendEmail("example@example.com","example","example text");
        return $developerResponse;

    }

    public function updateDeveloper(NewDeveloperRequestDto $newDeveloperDto): DeveloperResponseDto
    {
        $developer = DeveloperMapper::toEntity($newDeveloperDto);
        $this->unitOfWork->beginTransaction();
        try {
            $this->unitOfWork->developerRepository()->update($developer);
            $this->unitOfWork->saveChanges();
            $this->unitOfWork->commitTransaction();
            $this->error = null;
        }catch (Exception $e){
            $this->unitOfWork->rollbackTransaction();
            $this->error = $e->getMessage();
        }
        $developerResponse = new DeveloperResponseDto(DeveloperMapper::toDto($developer),$this->error,"Developer has been updated");
        $this->sendMailService->sendEmail("example@example.com","example","example text");
        return $developerResponse;
    }

    public function getDeveloper(string $developerId): DeveloperResponseDto
    {
        try {
            /** @var Developer $developer */
            $id = UuidFromString($developerId);
            $developer = $this->unitOfWork->developerRepository()->getById($id);
            return new DeveloperResponseDto(DeveloperMapper::toDto($developer));
        }catch (Exception $e){
            return new DeveloperResponseDto(null,$e->getMessage());
        }


    }

    public function deleteDeveloper(string $developerId): bool
    {
        /** @var Developer $developer */
        try {
            $id = UuidFromString($developerId);
            $developer = $this->unitOfWork->developerRepository()->getById($id);
            $this->unitOfWork->developerRepository()->delete($developer);
            $this->unitOfWork->saveChanges();
            return true;
        }catch (Exception){
            return false;
        }
    }

    public function getAll(): DeveloperResponseDto
    {
        $developers = DeveloperMapper::toDeveloperDtoStream($this->unitOfWork->developerRepository()->getAll());
        $response = new DeveloperResponseDto();
        $response->setDevelopers($developers);
        return $response;
    }

}