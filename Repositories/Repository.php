<?php declare(strict_types=1);

/*
 * This file is part of the Sepiphy package.
 *
 * (c) Quynh Xuan Nguyen <seriquynh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sepiphy\Laravel\Contracts\Repositories;

use ArrayAccess;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface Repository
{
    /**
     * Store a new model with the given attributes.
     *
     * @param  array|ArrayAccess  $attributes
     * @return Model
     */
    public function store($attributes);

    /**
     * Update a model with the given atttributes.
     *
     * @param  Model  $model
     * @param  array|ArrayAccess  $attributes
     * @return Model
     */
    public function update($model, $attributes);

    /**
     * Delete a model.
     *
     * @param  Model  $model
     * @return bool|null
     */
    public function delete($model);

    /**
     * Destroy one or many models.
     *
     * @param  \Illuminate\Support\Collection|array|int  $ids
     * @return int
     */
    public function destroy($ids);

    /**
     * Get all models from the database.
     *
     * @param  array|mixed  $columns
     * @return Collection|static[]
     */
    public function all($columns = ['*']);

    /**
     * Find the first model from the database.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|object|static|null
     */
    public function first($columns = ['*']);

    /**
     * Find the first model from the database or raise an Exception.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|object|static|null
     *
     * @throws ModelNotFoundException
     */
    public function firstOrFail($columns = ['*']);

    /**
     * Find a specified model by the given id.
     *
     * @param  int|string  $id
     * @param  array  $columns
     * @return Model|null
     */
    public function find($id, $columns = ['*']);

    /**
     * Find a model or raise an Exception if not found.
     *
     * @param  int|string  $id
     * @param  array  $columns
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id, $columns = ['*']);

    /**
     * Paginate resources.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int  $page
     * @return LengthAwarePaginator
     *
     * @throws InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);
}
