<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'tb_data';
    protected $fillable = [
        'id_kabupaten', 'sembuh', 'positif','rawat','meninggal','tgl_data',
    ];
}
