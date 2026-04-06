<?php
namespace App\Models;

use App\Models\Scopes\SimpleSoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, SimpleSoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // protected static function booted()
    // {
    //     static::addGlobalScope(new SimpleSoftDeleletingScope);
    // }
    public function scopeAllowedSorts(Builder $query, string $column)
    {
        return $query->orderBy($column);
    }

    public function scopeAllowedFilters(Builder $query, string $key)
    {
        if ($companyId = request()->query($key)) {
            $query->where($key, $companyId);
        }
        return $query;

    }

    public function scopeAllowedSearch(Builder $query, array $keys)
    {
        if ($search = request()->query('search')) {
            foreach ($keys as $index => $key) {
                $method = $index === 0 ? 'where' : 'orWhere';
                $query->{$method}($key, "LIKE", "%{$search}%");
            }
        }
        return $query;
    }
}
