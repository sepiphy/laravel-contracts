<?php

/*
 * This file is part of the Sepiphy package.
 *
 * (c) Nguyễn Xuân Quỳnh <nguyenxuanquynh2210vghy@gmail.com>
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
     * Destroy a model.
     *
     * @param  Model  $model
     * @return mixed
     */
    public function destroy($model);

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
     * Get a collection of entities.
     *
     * @param  array  $columns
     * @return Collection
     */
    public function get($columns = ['*']);

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
