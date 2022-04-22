<?php declare(strict_types=1);

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Update Developer request",
 *      description="Update developer request body data",
 *      type="object",
 *      required={"id","name","lastName","graduate"}
 * )
 */
class UpdateDeveloperRequestDto
{
    /**
     * @OA\Property(
     *      title="DeveloperId",
     *      description="developer Id",
     *      example="b2ccc9dc-34c3-47b3-b040-2c06bcebba0c"
     * )
     *
     * @var string
     */
    public string $id;
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
