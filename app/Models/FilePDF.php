<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class FilePDF extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'files_pdf';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'file_name',
        'file_extension',
        'file_storage',
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

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

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

    public function setFileStorageAttribute($value)
    {
        // Usar el disco de almacén, definido en config/filesystems.php
        //$disk = config('backpack.base.root_disk_name');
        $disk = 'public';
        $destination_path = 'files_pdf';
        $field_file = 'file_storage';

        // Recuperar el archivo de la consulta
        $file = request()->file($field_file);

        // Verificar si se sube un archivo
        if($file){
            $extension_file = request()->file($field_file)->getClientOriginalExtension();
            $tipo_archivo = request()->file($field_file)->getClientMimeType();

            // Verificar si el archivo es un PDF
            $allow_files_extensions = ['pdf'];
            if ($file && $extension_file &&
            in_array(strtolower($extension_file), $allow_files_extensions) &&
            mime_content_type($file->getRealPath()) === $tipo_archivo ) {
                // Crear la carpeta para almacenar los archivos
                $ip = Str::slug(request()->ip());
                $url_storage =  $destination_path . '/' . $field_file . '/IP-' . $ip;
                Storage::makeDirectory($url_storage);

                // Generar el nombre del archivo
                $filename = $this->attributes['id'].'-'.Str::slug($this->attributes['file_name']).'-'.time().'.'. $extension_file;

                // Salvar la ruta del archivo en el campo `file_storage` de la tabla
                $this->attributes[$field_file] = $url_storage.'/'.$filename;
                Storage::disk($disk)->putFileAs($url_storage, $file, $filename);
            }
        }

    }

    public function getFileStorageAttribute()
    {
        $field_file = 'file_storage';
        return $this->getRawOriginal($field_file);
    }


}
