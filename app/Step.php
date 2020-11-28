<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class step
 * @package App
 *
 * @OA\Tag(
 *   name="step",
 *   description="Lead Operations"
 *
 * )
 * @OA\Schema(
 *     title="Step",
 *     description="step model",
 *     required={"id", "key", "value"},
 *     @OA\Xml(
 *         name="Lead"
 *     )
 * )
 */

class Step extends Model
{
public $timestamps = false;
protected $fillable = ["key","value"];
/**
     * @OA\Property(
     *     property="id",
     *     title="step ID",
     *     description="Lead Identity",
     *     type="int",
     *     example=1
     * )
     *
     * @OA\Property(
     *     property="key",
     *     title="step phone",
     *     description="Phone numbers Lead",
     *     type="int",
     *     example="1234567890"
     * )
     *
     * @OA\Property(
     *     property="value",
     *     title="message",
     *     description="message description",
     *     type="string",
     *     example="Lead calificado"
     * )
     *
     */
}