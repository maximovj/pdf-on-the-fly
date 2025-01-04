<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratePDF extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'generates_pdf';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'file_pdf_id',
        'view_form_id',
        'ip',
        'name',
        'description',
        'generated',
        'download',
        'path',
        'fields',
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'fields' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function file_pdf()
    {
        return $this->belongsTo(FilePDF::class, 'file_pdf_id', 'id');
    }

    public function view_form()
    {
        return $this->belongsTo(ViewForm::class, 'view_form_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeCountGenerates($query, int $file_pdf_id )
    {
        return $query
        ->where('ip', '=', request()->ip())
        ->where('file_pdf_id', '=', $file_pdf_id)
        ->where('generated', '=', 1)
        ->count();
    }

    public function scopeCountVersions($query, int $file_pdf_id)
    {
        return $query
        ->where('ip', '=', request()->ip())
        ->where('file_pdf_id', '=', $file_pdf_id)
        ->sum('count');
    }

    public function scopeCountGenerated($query)
    {
        return $query
        ->where('ip', '=', request()->ip())
        ->where('generated', '=', 1)
        ->count();
    }

    public function scopeCountDraft($query)
    {
        return $query
        ->where('ip', '=', request()->ip())
        ->where('generated', '=', 0)
        ->count();
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
