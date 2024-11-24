<?php

namespace App\Service;

use App\Repository\AbstractRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class AbstractService
{
    protected AbstractRepository $repository;

    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Validate input data against rules.
     *
     * @param array $data
     * @param array $rules
     * @throws ValidationException
     */
    protected function validate(array $data, array $rules): void
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * Create a new record with validations.
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException
     */
    public function create(array $data)
    {
        $this->validate($data, $this->getCreateValidationRules());

        return $this->repository->create($data);
    }

    /**
     * Update a record by ID with validations.
     *
     * @param int $id
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function update(int $id, array $data): bool
    {
        $this->validate($data, $this->getUpdateValidationRules());

        return $this->repository->update($id, $data);
    }

    public function find(int $id): Model
    {
        $data = $this->repository->find($id);
        if (empty($data)) {
            throw new NotFoundHttpException("Register not found:" . $id);
        }
        return $data;
    }

    /**
     * Delete a record by ID with validations.
     *
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        $record = $this->find($id);

        if (empty($record)) {
            throw new BadRequestException("Record not found:" . $id);
        }
        $this->validate(["id" => $id], $this->getDeleteValidationRules());
        return $this->repository->delete($id);
    }
    /**
     * Provide rules for creating a record.
     * Override in the concrete service.
     */
    protected function getCreateValidationRules(): array
    {
        return [];
    }

    /**
     * Provide rules for updating a record.
     * Override in the concrete service.
     */
    protected function getUpdateValidationRules(): array
    {
        return [];
    }

    protected function getDeleteValidationRules(): array
    {
        return [];
    }
}
