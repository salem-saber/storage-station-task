<?php

namespace App\Repositories;

use App\Models\ShippingAwb;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ShippingAWBRepository
{


    public $query;


    public function getShippingAWB(): static
    {
        $this->query = ShippingAwb::query();
        return $this;
    }


    public function applyFilters($filters): static
    {
        foreach ($filters as $filter) {
            $filterName = $filter['filter_name'];
            $operator = $filter['props']['operators'][0]; // Assuming the first operator is used
            $value = request()->input($filterName);

            if (!$value && $value !== '0') {
                return $this;
            }

            switch ($filter['type']) {
                case 'date':
                    if ($filter['props']['is_from']) {
                        $this->query->where($filter['group_src'], '>=', date('Y-m-d', $value / 1000));
                    } else {
                        $this->query->where($filter['group_src'], '<=', date('Y-m-d', $value / 1000));
                    }
                    break;

                case 'select':
                    if ($value != 'all') {
                        $this->query->where($filterName, $operator, $value);
                    }
                    break;

                case 'number':
                    $this->query->where($filterName, $operator, $value);
                    break;

                case 'text':
                    if ($operator == 'like') {
                        $this->query->where($filterName, $operator, '%' . $value . '%');
                    } else {
                        $this->query->where($filterName, $operator, $value);
                    }
                    break;

                case 'boolean':
                    if ($value != 'all') {
                        $this->query->where($filterName, $operator, (bool)$value);
                    }
                    break;

                case 'null':
                    if ($value != 'all') {
                        if ($value == '0') {
                            $this->query->whereNull($filter['props']['data_src']);
                        } else {
                            $this->query->whereNotNull($filter['props']['data_src']);
                        }
                    }
                    break;
            }
        }

        return $this;
    }

    public function applyPagination(array $pagination = []): LengthAwarePaginator
    {
        $current_page = $pagination['current_page'] ?? 1;
        $per_page = $pagination['per_page'] ?? 15;
        return $this->query->paginate($per_page, ['*'], 'page', $current_page);
    }
}
