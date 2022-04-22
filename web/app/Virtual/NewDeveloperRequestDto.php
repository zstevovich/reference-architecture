<?php declare(strict_types=1);

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="New Developer request",
 *      description="Store developer request body data",
 *      type="object",
 *      required={"name","lastName","graduate"}
 * )
 */
class NewDeveloperRequestDto
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new developer",
     *      example="Name"
     * )
     *
     * @var string
     */
    public string $name;

    /**
     * @OA\Property(
     *      title="lastName",
     *      description="Last name of the new developer",
     *      example="Last Name"
     * )
     *
     * @var string
     */
    public string $lastName;

    /**
     * @OA\Property(
     *      title="graduate",
     *      description="Graduate",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public int $graduate;
}
