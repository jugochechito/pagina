<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'file_type'];

    public function getSimpleTypeAttribute()
    {
        switch ($this->file_type) {
            case 'application/pdf':
                return 'PDF';
            case 'application/msword':
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                return 'Word';
            case 'application/vnd.ms-excel':
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                return 'Excel';
            default:
                return 'Otro';
        }
    }
}
