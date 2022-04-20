<?php declare(strict_types=1);

namespace Architecture\ApplicationServices;
use Architecture\Api\Contracts\Dtos\InputDtos\NewDeveloperRequestDto;
use Architecture\Api\Contracts\Dtos\OutputDtos\NewDeveloperResponseDto;
use Architecture\Api\Contracts\ServiceInterfaces\DeveloperServiceInterface;
use Architecture\Api\Contracts\Dtos\Mappers\DeveloperMapper;
use Architecture\Domain\Repositories\DeveloperRepositoryInterface;
use Architecture\Domain\Services\SendMailServiceInterface;

class DeveloperService implements DeveloperServiceInterface
{

    public function __construct(
        public DeveloperRepositoryInterface $developerRepository,
        public SendMailServiceInterface $sendMailService
    ) {}

    public function addNewDeveloper(NewDeveloperRequestDto $newDeveloperDto): NewDeveloperResponseDto
    {
        $developer = DeveloperMapper::toEntity($newDeveloperDto);
        $newDeveloper = $this->developerRepository->create($developer);
        $newDeveloperResponseDto = new NewDeveloperResponseDto($newDeveloper->getId(),$newDeveloper->getName(),$newDeveloper->getLastName(),$newDeveloper->getGraduate());
        $this->sendMailService->sendEmail("example@example.com","example","example text");
        return $newDeveloperResponseDto;

    }
}