<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class lead
 * @package App
 *
 * @OA\Tag(
 *   name="Lead",
 *   description="Lead Operations"
 *
 * )
 * @OA\Schema(
 *     title="Lead",
 *     description="Lead model",
 *     required={"name","email", "phone","message", "step_id"},
 *     @OA\Xml(
 *         name="Lead"
 *     )
 * )
 */
class Lead extends Model
{
protected $fillable = ["name","email","phone","message","step_id" ];
/**
     * @OA\Property(
     *     property="id",
     *     title="Lead ID",
     *     description="Lead Identity",
     *     type="int",
     *     example=1
     * )
     *
     * @OA\Property(
     *     property="phone",
     *     title="Lead phone",
     *     description="Phone numbers Lead",
     *     type="int",
     *     example="1234567890"
     * )
     *
     * @OA\Property(
     *     property="message",
     *     title="message",
     *     description="message description",
     *     type="string",
     *     example="Lead calificado"
     * )
     *
     * @OA\Property(
     *     property="step_id",
     *     title="step_id",
     *     description="Leads status",
     *     type="int",
     *     example="1"
     * )
     *
     * @OA\Property(
     *     property="email",
     *     title="email",
     *     description="Lead email",
     *     type="string",
     *     example="adm@gmail.com"
     * )
     */
}
