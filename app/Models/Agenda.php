<?php

namespace Cookiesoft\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model implements TableInterface
{
    protected $table = 'agenda';

    protected $fillable = [
      'titulo',
      'descricao',
      'dt_evento',
      'hr_evento',
      'local'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#','Titulo','Data','Local'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Titulo':
                return $this->titulo;
            case 'Data':
                return $this->dt_evento;
            case 'Local':
                return $this->local;

        }
    }
}
