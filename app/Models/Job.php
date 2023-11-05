<?php

namespace App\Models;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use illuminate\Database\Eloquent\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $expirience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Applies filters to the query for job search.
     *
     * @param Builder|QueryBuilder $query - The original query to which filters will be applied.
     * @param array $filters - An array of filters, including search, minimum and maximum salary, experience, and category.
     * @return Builder|QueryBuilder - The query with applied filters.
     */
    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                // Applying a filter for searching in job titles, or descriptions, or company names.
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', '%' . $search . '%');
                    });
            });
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            // Applying a filter for the minimum salary.
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            // Applying a filter for the maximum salary.
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['expirience'] ?? null, function ($query, $expirience) {
            // Applying a filter for the required experience.
            $query->where('expirience', $expirience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            // Applying a filter for the job category.
            $query->where('category', $category);
        });
    }
}
