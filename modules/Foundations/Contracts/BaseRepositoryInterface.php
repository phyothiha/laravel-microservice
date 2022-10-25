<?php

namespace Meraki\Foundations\Contracts;

interface BaseRepositoryInterface
{
    public function newQuery();

    /**
     * Retrieve rows with limit and offset
     *
     * @return
     */
    public function selectAll($limit = 10);

    /**
     * Insert a row with given attributes.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function insert(array $attributes);

    /**
     * Select a row that corresponds to the ID.
     *
     * @param  int|string  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function selectById(int|string $id);

    /**
     * Update a row that corresponds to the ID with given attributes.
     *
     * @param  int|string  $id
     * @param  array       $attributes
     * @return bool
     */
    public function updateById(int|string $id, array $attributes);

    /**
     * Delete a row that corresponds to the ID.
     *
     * @param  int|string $id
     * @return bool
     */
    public function deleteById(int|string $id);
}
